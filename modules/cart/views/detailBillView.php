<?php get_header();?>

<style>
.detail-bill {
    padding: 20px;
    margin: 20px 0;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.bill-info, .order-details, .payment-info, .order-status {
    margin-bottom: 30px;
}

.bill-info h3, .order-details h3, .payment-info h3, .order-status h3 {
    color: #333;
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 2px solid #eee;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

.table th, .table td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}

.table th {
    background-color: #f8f9fa;
    color: #333;
}

.table tbody tr:hover {
    background-color: #f5f5f5;
}

.table tfoot tr td {
    background-color: #f8f9fa;
    font-weight: bold;
}

p {
    margin: 10px 0;
    line-height: 1.6;
}

strong {
    color: #444;
}
</style>


<div class="container">
    <div class="detail-bill">
        <h2>Chi tiết đơn hàng</h2>
        <div class="bill-info">
            <?php if(isset($customer)){?>
            <h3>Thông tin đơn hàng : <?php echo $bill['id'];?></h3>
            <p><strong>Ngày đặt:</strong> <?php if(isset($bill['create_at'])) echo $bill['create_at'] ?></p>
            <p><strong>Tên khách hàng:</strong> <?php echo $customer['fullname'];?></p>
            <p><strong>Số điện thoại:</strong> <?php echo $customer['phone']?></p>
            <p><strong>Địa chỉ:</strong><?php if(isset($bill['address'])) echo $bill['address']?></p>
            <p><strong>Email:</strong><?php echo $customer['email']?></p>
            <?php }?>
        </div>
        <div class="order-details">
            <h3>Sản phẩm đã mua</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($listInfoBill)){?>
                    <?php foreach($listInfoBill as $key=>$item){?>
                        
                    <tr>
                        <td><?php echo getProductById($item['product_id'])['name']?></td>
                        <td style="text-align: center;"><?php echo $item['quantity']?> </td>
                        <td><?php echo currency_format(getProductCartById($item['product_id'])['price'])?></td>
                        
                        <td><?php echo currency_format($item['quantity'] * getProductCartById($item['product_id'])['price'])?></td>
                    </tr>
                    <?php }?>   
                    <?php }?>
                    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"><strong>Tổng tiền:</strong></td>
                        <td><strong><?php echo currency_format($bill['total'])?></strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="payment-info">
            <h3>Thông tin thanh toán</h3>
            <p><strong>Phương thức thanh toán:</strong> <?php if($bill['payment_method']==1) echo 'Thanh toán tiền mặt'; else echo 'Chuyển khoản'; ?> </p>
            <p><strong>Trạng thái thanh toán:</strong> Chưa thanh toán</p>
        </div>
        <div class="order-status">
            <h3>Trạng thái đơn hàng</h3>
            <p><strong>Tình trạng:</strong><?php if($bill['status']==0) echo "<div style='color:red;'>Đang chờ xác nhận<div/>"; else if($bill['status']==1) echo "<div style='color:yellow;'>Đã xác nhận<div/>"; else if($bill['status']==2) echo "<div style='color:green;'>Đã giao hàng<div/>";?></p>
        </div>
    </div>
</div>


<?php get_footer();?>