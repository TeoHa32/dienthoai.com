<?php get_header();?>

<style>
.user-container {
    display: flex;
    padding: 20px;
    background: #f8f9fa;
    min-height: 500px;
}

.sidebar {
    width: 250px;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    margin-right: 20px;
}

.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar li {
    margin-bottom: 10px;
}

.sidebar a {
    display: block;
    padding: 10px 15px;
    color: #333;
    text-decoration: none;
    border-radius: 4px;
    transition: all 0.3s;
}

.sidebar a:hover,
.sidebar a.active {
    background: #007bff;
    color: #fff;
}

.sidebar i {
    margin-right: 10px;
}

.main-content {
    flex: 1;
    background: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.main-content h2 {
    margin-bottom: 20px;
    color: #333;
}

.order-history {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.order-history th,
.order-history td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #dee2e6;
}

.order-history th {
    background-color: #f8f9fa;
    font-weight: 600;
}

.order-history tr:hover {
    background-color: #f8f9fa;
}

.status-pending {
    color: #ffc107;
}

.status-completed {
    color: #28a745;
}

.status-cancelled {
    color: #dc3545;
}

.btn-view {
    padding: 6px 12px;
    background: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    font-size: 14px;
}

.btn-view:hover {
    background: #0056b3;
}
</style>

<div class="user-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <ul>
            <li>
                <a href="?mod=users&controller=index&action=detailUser">
                    <i class="fa fa-user"></i> Tài khoản của tôi
                </a>
            </li>
            <li>
                <a href="?mod=users&controller=index&action=orderHistory" class="active">
                    <i class="fa fa-history"></i> Lịch sử đơn hàng
                </a>
            </li>
            <li>
                <a href="?mod=users&controller=index&action=logout">
                    <i class="fa fa-sign-out"></i> Đăng xuất
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h2>Lịch sử đơn hàng</h2>
        <div style="max-height: 400px; overflow-y: auto;">
            <table class="order-history">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($listInfo)){?>
                        <?php foreach($listInfo as $value) {?>
                    <tr>
                        <td><?php echo $value['id']?></td>
                        <td><?php echo $value['create_at']?></td>
                        <td><?php echo currency_format($value['total'])?></td>
                        <td><span class="status-completed"><?php if($value['status']==0) echo "<div style='color:red;'>Đang chờ xác nhận<div/>"; else if($value['status']==1) echo "<div style='color:yellow;'>Đã xác nhận<div/>"; else if($value['status']==2) echo "<div style='color:green;'>Đã giao hàng<div/>";?></span></td>
                        <td><a href="?mod=cart&controller=index&action=detailOrder&id=<?php echo $value['id']?>" class="btn-view">Xem chi tiết</a></td>
                    </tr>
                    <?php }?>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>




<?php get_footer();?>
