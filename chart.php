<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="refresh" content="300">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/chartStyle.css">
    <title>Document</title>
</head>
<script src="js/background.js"></script>
<body class="body">
    <!--Menüleiste-->
    <?php
        require_once "header.php";
    ?>
    <!--Grid container-->
    <div class="chart-container">
        <!--Graf-->
        <div class="chart item-chart">
            <canvas id="myChart"></canvas>
            <button class="btn btnChart" id="temp" onclick="hiddenFunction(this.id)">Temperatur</button>
            <button class="btn btnChart" id="luft" onclick="hiddenFunction(this.id)">Luftfeucktigkeit</button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php
        require_once "js/main2.php";
    ?>
</body>
</html>
