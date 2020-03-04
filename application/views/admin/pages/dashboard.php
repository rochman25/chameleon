<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chameleon Dashboard Page</title>
    <?php $this->load->view('admin/assets/stylesheets') ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <?php $this->load->view('admin/master/header') ?>
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="card card-statistic-2">
                                <div class="card-stats">
                                    <div class="card-stats-title">Statistik Transaksi
                                    </div>
                                    <div class="card-stats-items">
                                        <div class="card-stats-item">
                                            <div class="card-stats-item-count"><?= $statistik['pending'] ?></div>
                                            <div class="card-stats-item-label">Pending</div>
                                        </div>
                                        <div class="card-stats-item">
<<<<<<< HEAD
=======
                                            <div class="card-stats-item-count"><?= $statistik['validasi'] ?></div>
                                            <div class="card-stats-item-label">Validasi</div>
                                        </div>
                                        <div class="card-stats-item">
                                            <div class="card-stats-item-count"><?= $statistik['proses'] ?></div>
                                            <div class="card-stats-item-label">Proses</div>
                                        </div>
                                        <div class="card-stats-item">
>>>>>>> f641e3f56620d12ee73035d81510aac9787620cc
                                            <div class="card-stats-item-count"><?= $statistik['kirim'] ?></div>
                                            <div class="card-stats-item-label">Kirim</div>
                                        </div>
                                        <div class="card-stats-item">
                                            <div class="card-stats-item-count"><?= $statistik['selesai'] ?></div>
                                            <div class="card-stats-item-label">Selesai</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-icon shadow-primary bg-primary">
                                    <i class="fas fa-archive"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Transaksi</h4>
                                    </div>
                                    <div class="card-body">
                                        <?= count($transaksi) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card card-statistic-2">
                                <div class="card-chart">
                                    <canvas id="balance-charat" height="80"></canvas>
                                </div>
                                <div class="card-icon shadow-primary bg-primary">
                                    <i class="fas fa-money"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Penjualan</h4>
                                    </div>
                                    <div class="card-body">
                                        Rp. <?=number_format($penjualan,2)?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="card card-statistic-2">
                                <div class="card-chart">
                                    <canvas id="sales-chart" height="80"></canvas>
                                </div>
                                <div class="card-icon shadow-primary bg-primary">
                                    <i class="fas fa-shopping-bag"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Produk Terjual</h4>
                                    </div>
                                    <div class="card-body">
                                        <?=$produk?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Statistik Penjualan / Bulan</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart" height="158"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php $this->load->view('admin/master/footer') ?>
        </div>
    </div>
    <?php $this->load->view('admin/assets/javascript') ?>
</body>
<script type="text/javascript">
    $(function() {
        "use strict";
        var data_penjualan = <?php echo json_encode($statistik_penjualan) ?>
        // console.log(data_penjualan)
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                datasets: [{
                    label: 'Penjualan',
                    data: data_penjualan,
                    // data: [3200, 1800, 4305, 3022, 6310, 5120, 1200, 2000, 1000, 6154, 2000, 6154],
                    borderWidth: 2,
                    backgroundColor: 'rgba(63,82,227,.8)',
                    borderWidth: 0,
                    borderColor: 'transparent',
                    pointBorderWidth: 0,
                    pointRadius: 3.5,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            // display: false,
                            drawBorder: false,
                            color: '#f2f2f2',
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 300000,
                            callback: function(value, index, values) {
                                return 'Rp.' + value;
                            }
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false,
                            tickMarkLength: 15,
                        }
                    }]
                },
            }
        });

        var balance_chart = document.getElementById("balance-chart").getContext('2d');

        var balance_chart_bg_color = balance_chart.createLinearGradient(0, 0, 0, 70);
        balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
        balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

        var myChart = new Chart(balance_chart, {
            type: 'line',
            data: {
                labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018', '26-07-2018', '27-07-2018', '28-07-2018', '29-07-2018', '30-07-2018', '31-07-2018'],
                datasets: [{
                    label: 'Balance',
                    data: [50, 61, 80, 50, 72, 52, 60, 41, 30, 45, 70, 40, 93, 63, 50, 62],
                    backgroundColor: balance_chart_bg_color,
                    borderWidth: 3,
                    borderColor: 'rgba(63,82,227,1)',
                    pointBorderWidth: 0,
                    pointBorderColor: 'transparent',
                    pointRadius: 3,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(63,82,227,1)',
                }]
            },
            options: {
                layout: {
                    padding: {
                        bottom: -1,
                        left: -1
                    }
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            beginAtZero: true,
                            display: false
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            drawBorder: false,
                            display: false,
                        },
                        ticks: {
                            display: false
                        }
                    }]
                },
            }
        });

        var sales_chart = document.getElementById("sales-chart").getContext('2d');

        var sales_chart_bg_color = sales_chart.createLinearGradient(0, 0, 0, 80);
        balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
        balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

        var myChart = new Chart(sales_chart, {
            type: 'line',
            data: {
                labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018', '26-07-2018', '27-07-2018', '28-07-2018', '29-07-2018', '30-07-2018', '31-07-2018'],
                datasets: [{
                    label: 'Sales',
                    data: [70, 62, 44, 40, 21, 63, 82, 52, 50, 31, 70, 50, 91, 63, 51, 60],
                    borderWidth: 2,
                    backgroundColor: balance_chart_bg_color,
                    borderWidth: 3,
                    borderColor: 'rgba(63,82,227,1)',
                    pointBorderWidth: 0,
                    pointBorderColor: 'transparent',
                    pointRadius: 3,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(63,82,227,1)',
                }]
            },
            options: {
                layout: {
                    padding: {
                        bottom: -1,
                        left: -1
                    }
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            beginAtZero: true,
                            display: false
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            drawBorder: false,
                            display: false,
                        },
                        ticks: {
                            display: false
                        }
                    }]
                },
            }
        });

        $("#products-carousel").owlCarousel({
            items: 3,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 5000,
            loop: true,
            responsive: {
                0: {
                    items: 2
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });
    })
</script>
<!-- Page Specific JS File -->
<!-- <script src="<?= base_url() ?>assets/admin/js/page/index.js"></script> -->

</html>