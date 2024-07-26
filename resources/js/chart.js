import Chart from 'chart.js/auto';

const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
];

const data = {
    labels: labels,
    datasets: [
        {
            label: "My First dataset",
            backgroundColor: "rgb(255, 204, 0)",
            borderColor: "rgb(255, 204, 0)",
            data: [0, 10, 5, 2, 20, 30, 45],
        },
    ],
};

const config = {
    type: 'line',
    data: data,
    options: {}
};

new Chart(
    document.getElementById('myChart'),
    config
);