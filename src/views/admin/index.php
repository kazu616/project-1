<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>Admin</title>
</head>

<body>
    <?php include_once "views/layouts/sidebar.php" ?>
    <main>
        <?php include_once "views/layouts/header_admin.php" ?>
        <div class="content">
            <?php foreach ($data['total_attributes'] as $attributes) { ?>
                <div class="dashboard-item">
                    <div class="desc">
                        <h3><?= $attributes['total_products'] ?></h3>
                        <p>Products</p>
                    </div>
                    <box-icon type='solid' name='book' size="lg"></box-icon>
                </div>
                <div class="dashboard-item">
                    <div class="desc">
                        <h3><?= $attributes['total_accounts'] ?></h3>
                        <p>Accounts</p>
                    </div>
                    <box-icon name='user-circle' type='solid' size="lg"></box-icon>
                </div>
                <div class=" dashboard-item">
                    <div class="desc">
                        <h3><?= $attributes['total_authors'] ?></h3>
                        <p>Authors</p>
                    </div>
                    <box-icon type='solid' name='user' size="lg"></box-icon>
                </div>
                <div class="dashboard-item">
                    <div class="desc">
                        <h3><?= $attributes['total_genres'] ?></h3>
                        <p>Genres</p>
                    </div>
                    <box-icon name='category' type='solid' size="lg"></box-icon>
                </div>
            <?php } ?>
        </div>
        <div class="chartsBx">
            <div class="chart">
                <canvas id="chart-1"></canvas>
            </div>
            <div class="chart">
                <canvas id="chart-2"></canvas>
            </div>
        </div>

    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

    <script>
        const ctx1 = document.getElementById("chart-1").getContext("2d");
        const myChart = new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                    "October", "November", "December"
                ],
                datasets: [{
                    label: "Total sales",
                    data: [
                        <?php
                        for ($i = 1; $i < 13; $i++) {
                            $found_data = false;
                            foreach ($data['chart'] as $data_chart) {
                                if ($i == $data_chart['month']) {
                                    echo $data_chart['total_sales'] . ",";
                                    $found_data = true;
                                }
                            }
                            if (!$found_data) {
                                echo "0,";
                            }
                        }
                        ?>
                    ],
                    borderColor: "rgba(54, 162, 235, 1)",
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        const ctx2 = document.getElementById("chart-2").getContext("2d");
        const myChart2 = new Chart(ctx2, {
            type: "bar",
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                    "October", "November", "December"
                ],
                datasets: [{
                    label: "Gross sales.",
                    data: [<?php
                            for ($i = 1; $i < 13; $i++) {
                                $found_data = false;
                                foreach ($data['chart'] as $data_chart) {
                                    if ($i == $data_chart['month']) {
                                        echo $data_chart['total_prices'] . ",";
                                        $found_data = true;
                                    }
                                }
                                if (!$found_data) {
                                    echo "0,";
                                }
                            }
                            ?>],
                    backgroundColor: [
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 99, 132, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgb(0, 172, 172)",
                        "rgb(0, 23, 172)",
                        "rgba(255, 159, 64, 1)",
                        "rgba(75, 192, 192, 1)",
                        "rgb(238, 130, 238)",
                        "rgba(30, 144, 255, 1)",
                        "rgba(0, 255, 0, 1)",
                        "rgba(255, 165, 0, 1)",
                        "rgba(128, 128, 128, 1)"
                    ],
                }, ],
            },
            options: {
                responsive: true,
            },
        });
    </script>
</body>

</html>