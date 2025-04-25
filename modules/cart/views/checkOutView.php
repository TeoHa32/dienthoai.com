<?php get_header(); ?>

<style>
    
#main-content-wp.checkout-page {
    padding: 25px 0;
    background: #f7f7f7;
}

.wp-inner {
    width: 1170px;
    margin: 0 auto;
    padding: 0 15px;
}

#breadcrumb-wp .list-item li {
    float: left;
    margin-right: 20px;
    line-height: normal;
}

#breadcrumb-wp .list-item li a {
    display: block;
    color: #676767;
    text-decoration: none;
}

.clearfix:after {
    content: "";
    display: block;
    clear: both;
}
#customer-info-wp {
    float: left;
    width: 47%;
    margin-right: 3%;
}

.section-head {
    margin-bottom: 30px;
    border-bottom: 1px solid #dadada;
    padding-bottom: 10px;
}

.section-head h1.section-title {
    font-size: 20px;
    font-weight: 600;
}

.section-detail .form-row {
    margin-bottom: 15px;
}

.section-detail label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
}

.section-detail input[type="text"],
.section-detail input[type="email"],
.section-detail input[type="tel"],
.section-detail select {
    display: block;
    padding: 10px;
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 4px;
}

#order-review-wp {
    float: right;
    width: 47%;
}

.shop-table {
    width: 100%;
    background: #fff;
    border-radius: 4px;
    padding: 15px;
}

.shop-table thead tr {
    background: #f5f5f5;
}

.shop-table tr td {
    padding: 10px 15px;
    border-bottom: 1px solid #ddd;
}

.shop-table tbody tr:last-child td {
    border-bottom: none;
}

.shop-table tfoot tr td {
    padding: 15px;
    background: #f5f5f5;
    font-weight: 600;
}

.place-order-wp {
    clear: both;
    padding-top: 30px;
    text-align: right;
}

.place-order-wp input[type="submit"] {
    background: #4CAF50;
    color: #fff;
    border: none;
    padding: 12px 25px;
    font-size: 15px;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.place-order-wp input[type="submit"]:hover {
    background: #45a049;
}

/* Responsive styles */
@media (max-width: 991px) {
    .wp-inner {
        width: 100%;
    }
    
    #customer-info-wp,
    #order-review-wp {
        float: none;
        width: 100%;
        margin-right: 0;
        margin-bottom: 30px;
    }
}

</style>
<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?mod=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="customer-info-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin khách hàng</h1>
            </div>
            <div class="section-detail">
                <form method="POST" action="?mod=cart&controller=index&action=order" id="form-checkout">
                    <div class="form-row">
                        <label for="fullname">Họ tên</label>
                        <input type="text" name="fullname" id="fullname" value="<?php if(isset($user['fullname'])) echo $user['fullname']; ?>" required>
                    </div>
                    <input type="text" name="id" id="id" hidden value="<?php if(isset($user['id'])) echo $user['id']; ?>" >
                    <div class="form-row">
                        <label for="address">Địa chỉ giao hàng</label>
                        <input type="text" name="address" id="address" value="<?php if(isset($user['address'])) echo $user['address']; ?>" required>
                    </div>
                    <div class="form-row">
                        <label for="phone">Số điện thoại</label>
                        <input type="tel" name="phone" id="phone" value="<?php if(isset($user['phone'])) echo $user['phone']; ?>" required>
                    </div>
                    <div class="form-row">
                        <label>Hình thức thanh toán</label>
                        <select name="payment">
                            <option value="0">Thanh toán khi nhận hàng (COD)</option>
                            <option value="1">Thanh toán tiền mặt</option>
                        </select>
                    </div>
                    <div class="place-order-wp">
            <input type="submit" name="checkout" value="Đặt hàng" form="form-checkout">
        </div>
                </form>
            </div>
        </div>
        <div class="section" id="order-review-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin đơn hàng</h1>
            </div>
            <div class="section-detail">
                <table class="shop-table">
                    <thead>
                        <tr>
                            <td>Sản phẩm</td>
                            <td>Số lượng</td>
                            <td>Giá</td>
                            <td>Tổng</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($_SESSION['cart'])) {
                            foreach($_SESSION['cart']['buy'] as $item) { ?>
                            <tr>
                                <td><?php echo $item['name']; ?></td>
                                <td><?php echo $item['qty']; ?></td>
                                <td><?php echo currency_format($item['price']); ?></td>
                                <td><?php echo currency_format($item['sub_total']); ?></td>
                            </tr>
                        <?php }} ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"><strong>Tổng đơn hàng:</strong></td>
                            <td><strong><?php if(isset($_SESSION['cart']['info']['total'])) echo currency_format($_SESSION['cart']['info']['total']); ?></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
