<?php
    $conn = new PDO("mysql: host=localhost; dbname=wetterstation;","root", "wetterstation22");

    $stmt_select = "SELECT Temperatur, Luftfeuchtigkeit, Zeitpunkt FROM Daten;";
    $cmd_select = $conn->prepare($stmt_select);

    $cmd_select->execute();
    $temp_arr = array();
    $time_arr = array();
    $i=0;
    while (($record = $cmd_select->fetch()) != FALSE & $i<7) {
        array_push($temp_arr, $record["Temperatur"]);
        array_push($time_arr, $record["Zeitpunkt"]);
        $i++;
    }
?>

<script>
//Funktion damit nur ein Dataset aktiv bleiben darf
function hiddenFunction(clicked_id) {

    if (clicked_id == "temp") {
        data.datasets[0].hidden = false;
        data.datasets[1].hidden = true;
        myChart.update();
    } 
    if (clicked_id == "luft") {
        data.datasets[0].hidden = true;
        data.datasets[1].hidden = false;
        myChart.update();
    }
}

let width, height, gradient;
function getGradientTemp(ctx, chartArea) {
  const chartWidth = chartArea.right - chartArea.left;
  const chartHeight = chartArea.bottom - chartArea.top;
    width = chartWidth;
    height = chartHeight;
    gradient = ctx.createLinearGradient(0, chartArea.bottom, 0, chartArea.top);
    gradient.addColorStop(0, "blue");
    gradient.addColorStop(0.4, "blue"); 
    gradient.addColorStop(0.5, "red");
    gradient.addColorStop(1, "red");

  return gradient;
}

function getGradientLuft(ctx, chartArea) {
  const chartWidth = chartArea.right - chartArea.left;
  const chartHeight = chartArea.bottom - chartArea.top;
    width = chartWidth;
    height = chartHeight;
    gradient = ctx.createLinearGradient(0, chartArea.bottom, 0, chartArea.top);
    gradient.addColorStop(0, "white");  
    gradient.addColorStop(1, "gray");

  return gradient;
}

const labels = [
<?php
    echo '"';
    echo json_encode(print_r(implode('", "',$time_arr)));
    echo '"';
?>
]


const data = {
    labels,
    datasets: [
        {
            label: "Temperatur",
            data: <?php echo json_encode($temp_arr); ?>,
            borderColor: function(context) {
                const chart = context.chart;
                const {ctx, chartArea} = chart;
                if (!chartArea) {
                    return;
                }
                return getGradientTemp(ctx, chartArea);
            },
            pointRadius: "6",
            tension: 0,
            hidden: false,
        },
        {
            label: "Luftfeuchtigkeit",
            data: [10, 56, 12, 94, 19, 10, 49, 20, 22],
            borderColor: function(context) {
                const chart = context.chart;
                const {ctx, chartArea} = chart;
                if (!chartArea) {
                    return;
                }
                return getGradientLuft(ctx, chartArea);
            },
            pointradius: "6",
            tesnion: 0,
            hidden: true,
        }
    ],
};

const config = {
    type: "line",
    data: data,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                grid: {
                    color: "#FFFFFF80",
                    tickColor: "#FFFFFF",
                    borderColor: "#FFFFFF"
                },
                ticks: {
                    color:"#FFFFFF"
                },
                suggestedMin: 20,
                suggestedMax: 25,
            },
            x: {
                grid: {
                    color: "#FFFFFF80",
                    tickColor: "#FFFFFF",
                    borderColor: "#FFFFFF"
                },
                ticks: {
                    color:"#FFFFFF"
                }
            }
        },
        plugins: {
            legend: {
                display:false,
                labels: {
                    color: "#FFFFFF"
                }
            }
        },
        hover: {
            mode:false,
        }
    }
};

const myChart = new Chart(document.getElementById("myChart"), config);
</script>
