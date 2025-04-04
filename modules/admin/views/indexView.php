<?php get_header('admin'); ?>

<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
    <?php get_sidebar('admin'); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thống kê</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">
                                    <h4>Tổng số sản phẩm</h4>
                                    <h2>150</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">
                                    <h4>Tổng số đơn hàng</h4>
                                    <h2>89</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">
                                    <h4>Doanh thu</h4>
                                    <h2>45.000.000đ</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">
                                    <h4>Số lượng khách hàng</h4>
                                    <h2>65</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="chart-container mt-4">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .card {
                padding: 20px;
                border-radius: 5px;
                margin-bottom: 20px;
            }
            .card h4 {
                margin: 0;
                font-size: 16px;
            }
            .card h2 {
                margin: 10px 0 0;
                font-size: 24px;
            }
            .bg-primary { background: #007bff; }
            .bg-warning { background: #ffc107; }
            .bg-success { background: #28a745; }
            .bg-danger { background: #dc3545; }
            .chart-container {
                margin-top: 30px;
                padding: 20px;
                background: #fff;
                border-radius: 5px;
            }
            .row {
                display: flex;
                flex-wrap: wrap;
                margin: 0 -15px;
            }
            .col-md-3 {
                flex: 0 0 25%;
                max-width: 25%;
                padding: 0 15px;
            }
        </style>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('revenueChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'],
                    datasets: [{
                        label: 'Doanh thu theo tháng',
                        data: [12000000, 19000000, 15000000, 25000000, 22000000, 30000000, 28000000, 35000000, 32000000, 38000000, 42000000, 45000000],
                        borderColor: '#007bff',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>
</div>
<?php get_footer('admin'); ?>
