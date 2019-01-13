(function (angular) {
    'use strict';

    //// JavaScript Code ////
    async function DashboardCtrl($log, DashboardSvc, $timeout, $scope, surveyor, $window, toastr, $loading) {
        var ctx = document.getElementById("pieChart");
        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                datasets: [{
                    data: [await DashboardSvc.getDataByInstansi(3), await DashboardSvc.getDataByInstansi(2), await DashboardSvc.getDataByInstansi(4)],
                    backgroundColor: [
                        '#d34836',
                        '#f4c20d',
                        '#367fa9',
                        '#d34836',
                        '#f4c20d',
                        '#367fa9',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }],

                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: [
                    'Kementrian',
                    'BUMN/BUMD',
                    'Swasta'
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var ctx = document.getElementById("pieChartBidang");
        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                datasets: [{
                    data: [
                        await DashboardSvc.getDataByBidang(28), 
                        await DashboardSvc.getDataByBidang(29), 
                        await DashboardSvc.getDataByBidang(30),
                        await DashboardSvc.getDataByBidang(31),
                        await DashboardSvc.getDataByBidang(32),
                        await DashboardSvc.getDataByBidang(33),
                        await DashboardSvc.getDataByBidang(34)
                    ],
                    backgroundColor: [
                        '#d34836',
                        '#f4c20d',
                        '#367fa9',
                        '#d36863',
                        '#fc402d',
                        '#3fa936',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }],

                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: [
                    'TKDN',
                    'Review Design',
                    'Studi Kelayakan',
                    'Pengawasan',
                    'Survey Kepuasan Pelanggan',
                    'Konsultasi',
                    'Survey'
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var pie1 = document.getElementById("pie1Chart");
        var pie1Chart = new Chart(pie1, {
            type: 'pie',
            data: {
                datasets: [{
                    data: [
                        await DashboardSvc.getDataByStatus(35), 
                        await DashboardSvc.getDataByStatus(36), 
                        await DashboardSvc.getDataByStatus(37),
                        await DashboardSvc.getDataByStatus(38),
                        await DashboardSvc.getDataByStatus(39)
                    ],
                    backgroundColor: [
                        '#d34836',
                        '#f4c20d',
                        '#367fa9',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }],

                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: [
                    'Menang',
                    'Lelang Ulang',
                    'Kalah PQ',
                    'Batal Ikut',
                    'Kalah Penawaran'
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var bar1 = document.getElementById("bar1Chart");
        var bar1Chart = new Chart(bar1, {
            type: 'bar',
            data: {
                "labels": ["January", "February", "March", "April", "May", "June", "July"],
                "datasets": [{
                    "label": "My First Dataset",
                    "data": [65, 59, 80, 81, 56, 55, 40],
                    "fill": false,
                    "backgroundColor": ["#d34836", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", " #f4c20d", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                    "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                    "borderWidth": 1
                }]
            }, 
            options: {
                "scales": {
                    "yAxes": [{
                        "ticks": {
                            "beginAtZero": true
                        }
                    }]
                }
            }
        });
        var bar2 = document.getElementById("bar2Chart");
        var bar2Chart = new Chart(bar2, {
            type: 'bar',
            data: {
                "labels": ["January", "February", "March", "April", "May", "June", "July"],
                "datasets": [{
                    "label": "My First Dataset",
                    "data": [65, 59, 80, 81, 56, 55, 40],
                    "fill": false,
                    "backgroundColor": ["#d34836", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", " #f4c20d", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                    "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                    "borderWidth": 1
                }]
            }, 
            options: {
                "scales": {
                    "yAxes": [{
                        "ticks": {
                            "beginAtZero": true
                        }
                    }]
                }
            }
        });
        var bar3 = document.getElementById("bar3Chart");
        var bar3Chart = new Chart(bar3, {
            type: 'bar',
            data: {
                "labels": ["January", "February", "March", "April", "May", "June", "July"],
                "datasets": [{
                    "label": "My First Dataset",
                    "data": [65, 59, 80, 81, 56, 55, 40],
                    "fill": false,
                    "backgroundColor": ["#d34836", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", " #f4c20d", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                    "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                    "borderWidth": 1
                }]
            }, 
            options: {
                "scales": {
                    "yAxes": [{
                        "ticks": {
                            "beginAtZero": true
                        }
                    }]
                }
            }
        });
    }
    //// Angular Code ////

    app.controller('DashboardCtrl', DashboardCtrl);

})(angular);
