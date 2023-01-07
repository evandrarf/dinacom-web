import "./bootstrap";

import Chart from "chart.js/auto";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// let data = [];

// (async function () {
//     data.push({ year: 2938, count: 90 });
//     new Chart(document.getElementById("home-chart"), {
//         type: "doughnut",
//         data: {
//             labels: data.map((row) => row.year),
//             options: {
//                 animation: true,
//                 plugins: {
//                     legend: {
//                         display: false,
//                     },
//                     tooltip: {
//                         enabled: false,
//                     },
//                 },
//             },
//             datasets: [
//                 {
//                     label: "Expense",
//                     data: data.map((row) => row.count),
//                 },
//             ],
//         },
//     });
// })();
