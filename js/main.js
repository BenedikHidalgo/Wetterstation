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

//Gradient für Temp
let width, height, gradient;
function getGradientTemp(ctx, chartArea) {
  const chartWidth = chartArea.right - chartArea.left;
  const chartHeight = chartArea.bottom - chartArea.top;
    width = chartWidth;
    height = chartHeight;
    gradient = ctx.createLinearGradient(0, chartArea.bottom, 0, chartArea.top);
    gradient.addColorStop(0, "blue");
    gradient.addColorStop(0.4, "blue"); 
    gradient.addColorStop(0.6, "orange");
    gradient.addColorStop(1, "red");

  return gradient;
}

//Gradient für Luft
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
    "Montag",
    "Dienstag",
    "Mittwoch",
    "Donnerstag",
    "Fretiag",
    "Samstag",
    "Sonntag",
    "Montag",
    "Dienstag",
];

const data = {
    labels,
    datasets: [
        {
            label: "Temperatur",
            data: [0, 28, 20, 7, 16, 13, 25, 12, 22],
            //borderColor: "#FF0000",
            borderColor: function(context) {
                const chart = context.chart;
                const {ctx, chartArea} = chart;
                if (!chartArea) {
                    return;
                }
                return getGradientTemp(ctx, chartArea);
            },
            pointRadius: "6",       //Punktgröße
            tension: 0,             //Kurve
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