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
                                    <h2><?php if(isset($countProduct['total_products']) AND !empty($countProduct['total_products'])) echo $countProduct['total_products'];?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">
                                    <h4>Tổng số đơn hàng</h4>
                                    <h2><?php if(isset($countBill['total_orders']) AND !empty($countBill['total_orders'])) echo $countBill['total_orders'];?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">
                                    <h4>Doanh thu</h4>
                                    <h2><?php if(isset($sumBill['sum_orders']) AND !empty($sumBill['sum_orders'])) echo $sumBill['sum_orders'];?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">
                                    <h4>Số lượng khách hàng</h4>
                                    <h2><?php if(isset($countCustomer['total_customers']) AND !empty($countCustomer['total_customers'])) echo $countCustomer['total_customers'];?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="chart-container">
                    <h3>Thống kê khách hàng mua hàng nhiều nhất</h3>
                    <form method="GET" class="form-filter">
                        <input type="hidden" name="mod" value="admin">
                        <input type="hidden" name="controller" value="index">
                        <input type="hidden" name="action" value="index">
                        <div class="form-group">
                            <label>Từ ngày:</label>
                            <input type="date" name="start_date" value="<?php echo isset($_GET['start_date']) ? $_GET['start_date'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label>Đến ngày:</label>
                            <input type="date" name="end_date" value="<?php echo isset($_GET['end_date']) ? $_GET['end_date'] : ''; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Thống kê</button>
                    </form>

                    <?php if(isset($topCustomers) && !empty($topCustomers)): ?>
                    <div class="table-responsive" style="margin-top: 20px;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên khách hàng</th>
                                    <th>Số đơn hàng</th>
                                    <th>Tổng tiền mua</th>
                                    <th>Chi tiết đơn hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach($topCustomers as $customer): ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $customer['fullname']; ?></td>
                                    <td><?php echo $customer['order_count']; ?></td>
                                    <td><?php echo currency_format($customer['total_amount']); ?></td>
                                    <td>
                                        <a href="?mod=admin&controller=order&action=detail&id=<?php echo $customer['id']; ?>" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i> Xem chi tiết
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                    <div class="alert alert-info" style="margin-top: 20px;">
                        Vui lòng chọn khoảng thời gian để xem thống kê
                    </div>
                    <?php endif; ?>
                </div>

                <style>
                    .form-filter {
                        display: flex;
                        gap: 15px;
                        align-items: flex-end;
                        margin-bottom: 20px;
                    }
                    .form-group {
                        display: flex;
                        flex-direction: column;
                        gap: 5px;
                    }
                    .form-group label {
                        font-weight: bold;
                    }
                    .form-group input {
                        padding: 8px;
                        border: 1px solid #ddd;
                        border-radius: 4px;
                    }
                    .btn-primary {
                        padding: 8px 20px;
                        background: #007bff;
                        color: white;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                        margin-bottom: 22px;
                    }
                    .btn-primary:hover {
                        background: #0056b3;
                    }
                    .table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    .table th, .table td {
                        padding: 12px;
                        border: 1px solid #ddd;
                        text-align: left;
                    }
                    .table th {
                        background: #f8f9fa;
                    }
                    .btn-info {
                        padding: 5px 10px;
                        background: #17a2b8;
                        color: white;
                        text-decoration: none;
                        border-radius: 4px;
                    }
                    .btn-info:hover {
                        background: #138496;
                    }
                    .alert {
                        padding: 15px;
                        border-radius: 4px;
                    }
                    .alert-info {
                        background: #cce5ff;
                        border: 1px solid #b8daff;
                        color: #004085;
                    }
                </style>
                    
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
