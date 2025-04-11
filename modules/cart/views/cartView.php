<?php get_header(); ?>



<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Sản phẩm làm đẹp da</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td colspan="2">Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="?mod=cart&controller=index&action=updateCart" method="post">
                        <?php if(isset($_SESSION['cart'])) {?>
                        <?php foreach($_SESSION['cart']['buy'] as $key => $value) {?>
                        <tr>
                            <td><?php echo $value['id']; ?></td>
                            <td>
                                <a href="" title="" class="thumb">
                                    <img src="<?php echo getImgById($value['id'])['src']; ?>" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="" title="" class="name-product"><?php echo $value['name']; ?></a>
                            </td>
                            <td><?php echo currency_format($value['price']); ?></td>
                            <td>
                                <input type="text" name="num-order[<?php echo $value['id']; ?>]" value="<?php echo $value['qty']; ?>" class="num-order">
                            </td>
                            <td><?php echo currency_format($value['price'] * $value['qty']); ?></td>
                            <td>
                                <a href="?mod=cart&controller=index&action=deleteItem&id=<?php echo $value['id']; ?>" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                            </td>   
                        </tr>
                        <?php } ?>
                        <?php } ?>
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá: <span><?php if(isset($_SESSION['cart']['info']['total'])) echo currency_format($_SESSION['cart']['info']['total']); ?></span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <input type="submit" name="update-cart" id="update-cart" value="Cập nhật giỏ hàng">
                                        
                                        <a href="?mod=cart&controller=index&action=checkout" title="" id="checkout-cart">Thanh toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                    </form>
                </table>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                <a href="?mod=home&controller=index&action=index" title="" id="buy-more">Mua tiếp</a><br/>
                <a href="?mod=cart&controller=index&action=delete" title="" id="delete-cart">Xóa giỏ hàng</a>   
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
