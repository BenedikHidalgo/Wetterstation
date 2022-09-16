let width, height, gradient;
function getGradient(ctx, chartArea) {
  const chartWidth = chartArea.right - chartArea.left;
  const chartHeight = chartArea.bottom - chartArea.top;
    // Create the gradient because this is either the first render
    // or the size of the chart has changed
    width = chartWidth;
    height = chartHeight;
    gradient = ctx.createLinearGradient(0, chartArea.bottom, 0, chartArea.top);
    gradient.addColorStop(0, "blue");
    gradient.addColorStop(0.7, "orange");
    gradient.addColorStop(1, "red");

    console.log(gradient)

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
    datasets: [{
        data: [0, 28, 20, 7, 16, 13, 25, 12, 22],
        label: "Temperature",
        //borderColor: "#FF0000",
        borderColor: function(context) {
            const chart = context.chart;
            const {ctx, chartArea} = chart;
            if (!chartArea) {
                return;
            }
            return getGradient(ctx, chartArea);
        },
        pointRadius: "6",       //Punktgröße
        tension: 0,             //Kurve
    }],
};

const config = {
    type: "line",
    data: data,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            yAxis: {
                grid: {
                    color: "#FFFFFF40",
                    tickColor: "#FFFFFF",
                    borderColor: "#FFFFFF"
                },
                ticks: {
                    color:"#FFFFFF"
                },
            },
            xAxis: {
                grid: {
                    color: "#FFFFFF40",
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