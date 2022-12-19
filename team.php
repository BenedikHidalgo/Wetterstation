<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="refresh" content="300">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/teamStyle.css">
    <title>Startseite</title>
</head>
<script src="js/background.js"></script>
<body class="body">
    <?php
        require_once "header.php";
    ?>  
    <div class="text-container">
        <p class="p">
            Unser Team
            <br><br>
            Hier finden Sie eine Kurze Info über unser Team und über
            die Webseite. Unsere Webseite wurde am xx.xx.xx
            veröffentlicht. Unser Name setzt sich zusammen aus unseren 
            Anfangsbuchstaben der Inhaber. AKB, Alex Konstantin Benedik
            sind die Hinhaber der Webseite.
            <br><br>
            Alex Panzer unser derzeitiger CEO und Leiter des Projekts
            <br><br>
            Konstantin Jäger Stellverträtender CEO
            <br><br>
            Benedik Hidalgo ebenfalls Stellverträtender CEO  
        </p>
    </div>
    <?php
        echo "<script>alert(\"TEST\");</script>";
    ?>
</body>
</html>