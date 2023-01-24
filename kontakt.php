<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="refresh" content="300">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/kontaktStyle.css">
    <title>Document</title>
</head>
<script src="js/background.js"></script>
<body class="body" style="">
    <!--Menüleiste-->
    <?php
        require_once "header.php";
    ?>
    <?php
        if (isset($_POST["btn"])) {
            if (!empty($_POST["vorname"]) && !empty($_POST["nachname"]) && !empty($_POST["mail"]) && !empty($_POST["feedback"])) {
                $to = "benedik.hidalgo@gmail.com";
                $name = $_POST["vorname"];
                $surname = $_POST["nachname"];
                $from = $_POST["mail"];
                $message = $_POST["feedback"];
                $subject = "Contact Form Details";
                $headers = "From:" . $from;
                $result = mail($to,$subject,$message, $headers);
                
                require 'PHPMailer/src/Exception.php';
                require 'PHPMailer/src/PHPMailer.php';
                require 'PHPMailer/src/SMTP.php';

                $mail = new PHPMailer(true);

                try {
                    //Send using SMTP
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'hidalgo.benedik@gmail.com';                     //SMTP username
                    $mail->Password   = 'iffzrqzsxffuiarv';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                    $message = "Name: ".$name." ".$surname."<br>"."Email: ".$from."<br><br>".$message;

                    //Recipients
                    $mail->setFrom('from@example.com', 'Wetterstation-Feedback');
                    $mail->addAddress('hidalgo.benedik@gmail.com');     //Add a recipient
                
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Here is the subject';
                    $mail->Body    = $message;
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                
                    $mail->send();
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                ?>
                    <div class="confirmation-flex">
                        <img src="img/checkmark.jpg" alt="checkmark" class="confirmation-img">
                        <p class="confirmation-text">Ihre Nachricht wurde versendet</p>
                    </div>
                <?php
            } else {
                ?>
                    <div class="confirmation-flex">
                        <img src="img/x.jpg" alt="x" class="confirmation-img" width="82px" height="80px">
                        <p class="confirmation-text">Etwas ist schief gelaufen</p>
                        <a href="kontakt.php" class="btn confirmation-text">Zum Formular</a>
                    </div>
                <?php
            }
        } else {
            ?>
                <form action="kontakt.php" method="POST">
                    <div class="form-container">
                        <label for="vorname" class="label">Vorname:</label>
                        <input type="text" name="vorname" class="input bg"><br>
                        <label for="nachname" class="label">Nachname:</label>
                        <input type="text" name="nachname" class="input bg"><br>
                        <label for="mail" class="label">E-Mail:</label>
                        <input type="text" name="mail" class="input bg"><br>
                        <label for="feedback"class="label">Feedback:</label>
                        <textarea name="feedback" class="textarea bg" cols="30" rows="10"></textarea><br>
                        <div class="btn-container">
                            <button type="button" class="input-btn back-btn bg" name="btn"><a href="index.php">Zurück</a></button>
                            <button type="submit" class="input-btn send-btn bg" name="btn">Senden!</button>
                        </div>
                    </div>
                </form>
            <?php
        }
    ?>
</body>
</html>