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
<body class="body">
    <!--Menüleiste-->
    <div class="d-flex flex-row align-items-center">
        <a class="flex-grow-1" href="index.html"><img id="logo" src="img/logo_nacht.jpg" href="index.html" alt="logo" width="150" height="150"></a>
        <a class="btn" href="chart.html">Wetterverlauf</a>
        <a class="btn" href="team.php">Unser Team</a>
        <a class="btn" href="kontakt.html">Kontakt</a>
    </div>
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
                        <input type="text" name="vorname" class="input col-3"><br>
                        <label for="nachname" class="label">Nachname:</label>
                        <input type="text" name="nachname" class="input"><br>
                        <label for="mail" class="label">E-Mail:</label>
                        <input type="text" name="mail" class="input"><br>
                        <label for="feedback"class="label">Feedback:</label>
                        <textarea name="feedback" class="textarea" cols="30" rows="10"></textarea><br>
                        <div class="btn-container">
                            <button type="button" class="input-btn back-btn" name="btn"><a href="index.html">Zurück</a></button>
                            <button type="submit" class="input-btn send-btn" name="btn">Senden!</button>
                        </div>
                    </div>
                </form>
            <?php
        }
    ?>
</body>
</html>
