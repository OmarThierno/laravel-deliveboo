import Chart from 'chart.js/auto';

const labels = [
    'Febbraio',
    'Marzo',
    'Aprile',
    'Maggio',
    'Giugno',
    'Luglio',
];

const data = {
    labels: labels,
    datasets: [
        {
            label: "Ordini Semestrali",
            backgroundColor: "rgb(255, 204, 0)",
            borderColor: "rgb(255, 204, 0)",
            data: priceData,
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