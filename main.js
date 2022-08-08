const chart = document.getElementById("myChart").getContext("2d");

const labels = [
    "Montag",
    "Dienstag",
    "Mittwoch",
    "Donnerstag",
    "Fretiag",
    "Samstag",
    "Sonntag",
];

const data = {
    labels,
    datasets: [{
        data: [0, 5, 10, 15, 20, 25, 30, 35, 40],
        label: "Temperature"
    }]
};

const config = {
    type: "line",
    data: data,
    options: {
        responsive: true,
    },
};

const myChart = new Chart(document.getElementById("myChart"), config);