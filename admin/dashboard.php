<?php include 'check_session.php' ?>
<?php
include('../db_con.php');

// Get total count of projects
$total_project = $con->query("SELECT COUNT(*) AS total FROM add_project")->fetch_assoc()['total'];

// Get total count of featured projects (where feature_status = 1)
$total_feature_project = $con->query("SELECT COUNT(*) AS total FROM add_project WHERE feature_status = 1")->fetch_assoc()['total'];

// Get total count of blogs
$total_king_project = $con->query("SELECT COUNT(*) AS total FROM add_project WHERE king_status = 1")->fetch_assoc()['total'];

// Query to get the count of projects by industry
$query = "SELECT im.industry_name, COUNT(ap.id) AS total_projects
          FROM add_industry_master im
          LEFT JOIN add_project ap ON im.industry_name = ap.industry_name
          GROUP BY im.industry_name";

// Execute the query
$result = $con->query($query);

// Store industry project data
$industry_projects = [];
while ($row = $result->fetch_assoc()) {
    $industry_projects[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Auctech Portfolio | Admin Dashboard</title>
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include('header.php'); ?>
    <!-- Content body start -->
    <div class="content-body" style="background:#93938a29">
        <div class="container-fluid">
            <div class="row">
                <!-- Total Project Count -->
                <div class="col-lg-4 col-sm-6">
                    <div class="card shadow-sm">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content d-flex align-items-center">
                                <div class="stat-text d-flex align-items-center">
                                    <img width="20" height="20" src="https://img.icons8.com/external-xnimrodx-lineal-xnimrodx/64/FD7E14/external-banner-infographic-and-chart-xnimrodx-lineal-xnimrodx-2.png" alt="Total Banner" class="mr-2" />
                                    <span>Total Project</span>
                                </div>
                                <div class="stat-digit ml-auto">
                                    <?php echo $total_project; ?>
                                </div>
                            </div>
                            <div class="progress mt-3">
                                <div class="progress-bar progress-bar-warning w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total Feature Project Count -->
                <div class="col-lg-4 col-sm-6">
                    <div class="card shadow-sm">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content d-flex align-items-center">
                                <div class="stat-text d-flex align-items-center">
                                    <img width="20" height="20" src="https://img.icons8.com/sf-black/64/FD7E14/list.png" alt="list" />
                                    <span>Total Feature Project</span>
                                </div>
                                <div class="stat-digit ml-auto">
                                    <?php echo $total_feature_project; ?>
                                </div>
                            </div>
                            <div class="progress mt-3">
                                <div class="progress-bar progress-bar-warning w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total King Project Count -->
                <div class="col-lg-4 col-sm-6">
                    <div class="card shadow-sm">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content d-flex align-items-center">
                                <div class="stat-text d-flex align-items-center">
                                    <img width="20" height="20" src="https://img.icons8.com/external-xnimrodx-lineal-xnimrodx/64/FD7E14/external-banner-infographic-and-chart-xnimrodx-lineal-xnimrodx-2.png" alt="Total Banner" class="mr-2" />
                                    <span>Total King Project</span>
                                </div>
                                <div class="stat-digit ml-auto">
                                    <?php echo $total_king_project; ?>
                                </div>
                            </div>
                            <div class="progress mt-3">
                                <div class="progress-bar progress-bar-warning w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Industry Pie Chart -->
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-xl-12">
                    <div class="card shadow-sm">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content d-flex align-items-center justify-content-center">
                                <div class="stat-digit ml-auto">
                                    <canvas id="industryPieChart" width="250" height="250"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart.js and Data Labels Script -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                var industryData = <?php echo json_encode($industry_projects); ?>;

                var labels = industryData.map(function(industry) {
                    return industry.industry_name;
                });

                var data = industryData.map(function(industry) {
                    return industry.total_projects;
                });

                var colors = [
                    '#FF5733', // Red-Orange
                    '#33FF57', // Green
                    '#3357FF', // Blue
                    '#FF33A8', // Pink
                    '#FFD700', // Gold
                    '#8A2BE2', // BlueViolet
                    '#FF4500', // OrangeRed
                    '#00FA9A' // MediumSpringGreen
                ];

                var ctx = document.getElementById('industryPieChart').getContext('2d');
                var industryPieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Total Projects per Industry',
                            data: data,
                            backgroundColor: colors.slice(0, data.length),
                            hoverOffset: 6,
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            datalabels: {
                                color: '#fff',
                                formatter: function(value, context) {
                                    var total = context.dataset.data.reduce((acc, val) => acc + val, 0);
                                    var percentage = ((value / total) * 100).toFixed(2);
                                    return percentage + '%';
                                },
                                font: {
                                    weight: 'bold',
                                    size: 14,
                                },
                                anchor: 'center',
                                align: 'center',
                            },
                            legend: {
                                position: 'top',
                                labels: {
                                    font: {
                                        size: 14,
                                        weight: 'bold',
                                    },
                                    color: '#333',
                                },
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.7)',
                                titleFont: {
                                    size: 16,
                                    weight: 'bold',
                                },
                                bodyFont: {
                                    size: 14,
                                },
                                callbacks: {
                                    label: function(tooltipItem) {
                                        var total = tooltipItem.dataset.data.reduce((acc, val) => acc + val, 0);
                                        var value = tooltipItem.raw;
                                        var percentage = ((value / total) * 100).toFixed(2);
                                        return tooltipItem.label + ': ' + value + ' projects (' + percentage + '%)';
                                    },
                                }
                            },
                            title: {
                                display: true,
                                text: 'Total Projects per Industry',
                                font: {
                                    size: 20,
                                    weight: 'bold',
                                },
                                color: '#333',
                                padding: {
                                    top: 20,
                                    bottom: 20,
                                },
                                align: 'start' // Align the title to the left
                            }
                        },
                        animation: {
                            animateScale: true,
                            animateRotate: true,
                        },
                    }
                });
            </script>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>

</html>
