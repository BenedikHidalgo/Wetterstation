<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="refresh" content="300">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/indexStyle.css">
    <title>Startseite</title>
</head>
<script src="js/background.js"></script>
<body class="body">
    <!--Menüleiste-->
    <?php
        require_once "header.php"; 
    ?>
    <!--Grid container-->   
    <div class="grid">
        <div class="grid-container">
            <!--Chart-->
            <div class="chart item-chart">
                <canvas id="myChart" ></canvas>
            </div>
            <div class="item-p">
                <p class="p">
                    Datum: <span class="value">12/10/2022</span><br>
                    Temperatur: <span class="value">27,0°C</span><br>
                    Luftfeuchtigkeit: <span class="value">78%</span><br>
                </p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php
        require_once "js/main2.php";
    ?>
</body>
</html>