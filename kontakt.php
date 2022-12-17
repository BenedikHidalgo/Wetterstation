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
