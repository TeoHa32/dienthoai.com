<?php
    get_header();
    get_sidebar();
?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <div class="item">
                        <img src="public/images/slider-01.png" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/slider-02.png" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/slider-03.png" alt="">
                    </div>
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm mới</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                    <?php if(isset($listnew)){ ?>
                        <?php foreach($listnew as $item){ ?>
                        <li>
                            <a href="?mod=product&controller=index&action=redirectDetailProduct&id=<?php echo $item['id']?>" title="" class="thumb">
                                <img src="<?php echo getImgById($item['id'])['src']?>">
                            </a>
                            <a href="?mod=product&controller=index&action=redirectDetailProduct&id=<?php echo $item['id']?>" title="" class="product-name"><?php echo $item['name']?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($item['price'])?></span>
                                <span class="old"><?php echo currency_format($item['price']+1000000)?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart&controller=index&action=add&id=<?php echo $item['id'];?>" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=cart&controller=index&action=addCheckOut&id=<?php echo $item['id'];?>" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php }?>
                        <?php }?>
                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Iphone</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                    <?php if(isset($listIP)){ ?>
                        <?php foreach($listIP as $item){ ?>
                        <li>
                            <a href="?mod=product&controller=index&action=redirectDetailProduct&id=<?php echo $item['id']?>" title="" class="thumb">
                                <img src="<?php echo getImgById($item['id'])['src']?>">
                            </a>
                            <a href="?mod=product&controller=index&action=redirectDetailProduct&id=<?php echo $item['id']?>" title="" class="product-name"><?php echo $item['name']?></a>
                            <div class="price">
                            <span class="new"><?php echo currency_format($item['price'])?></span>
                            <span class="old"><?php echo currency_format($item['price']+1000000)?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart&controller=index&action=add&id=<?php echo $item['id'];?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=cart&controller=index&action=addCheckOut&id=<?php echo $item['id'];?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php }?>
                        <?php }?>
                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sam Sung</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                    <?php if(isset($listSS)){ ?>
                        <?php foreach($listSS as $item){ ?>
                        <li>
                            <a href="?mod=product&controller=index&action=redirectDetailProduct&id=<?php echo $item['id']?>" title="" class="thumb">
                                <img src="<?php echo getImgById($item['id'])['src']?>">
                            </a>
                            <a href="?mod=product&controller=index&action=redirectDetailProduct&id=<?php echo $item['id']?>" title="" class="product-name"><?php echo $item['name']?></a>
                            <div class="price">
                            <span class="new"><?php echo currency_format($item['price'])?></span>
                            <span class="old"><?php echo currency_format($item['price']+1000000)?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart&controller=index&action=add&id=<?php echo $item['id'];?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=cart&controller=index&action=addCheckOut&id=<?php echo $item['id'];?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php }?>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                    <ul class="list-item">
                        <li>
                            <a href="?page=category_product" title="">Điện thoại</a>
                            <ul class="sub-menu">
                            <li>
                                    <a href="?mod=product&controller=index&action=pagination&category=1" title="">Iphone</a>
                                </li>
                                
                                <li>
                                    <a href="?mod=product&controller=index&action=pagination&category=2" title="">Samsung</a>
                                    
                                </li>
                                <li>
                                    <a href="?mod=product&controller=index&action=pagination&category=3" title="">Oppo</a>
                                </li>
                               
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <!-- <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <li class="clearfix">
                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                <img src="public/images/img-pro-13.png" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_product" title="" class="product-name">Laptop Asus A540UP I5</a>
                                <div class="price">
                                    <span class="new">5.190.000đ</span>
                                    <span class="old">7.190.000đ</span>
                                </div>
                                <a href="" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        <li class="clearfix">
                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                <img src="public/images/img-pro-11.png" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                <div class="price">
                                    <span class="new">15.190.000đ</span>
                                    <span class="old">17.190.000đ</span>
                                </div>
                                <a href="" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        <li class="clearfix">
                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                <img src="public/images/img-pro-12.png" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                <div class="price">
                                    <span class="new">15.190.000đ</span>
                                    <span class="old">17.190.000đ</span>
                                </div>
                                <a href="" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        <li class="clearfix">
                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                <img src="public/images/img-pro-05.png" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                <div class="price">
                                    <span class="new">15.190.000đ</span>
                                    <span class="old">17.190.000đ</span>
                                </div>
                                <a href="" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        <li class="clearfix">
                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                <img src="public/images/img-pro-22.png" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                <div class="price">
                                    <span class="new">15.190.000đ</span>
                                    <span class="old">17.190.000đ</span>
                                </div>
                                <a href="" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        <li class="clearfix">
                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                <img src="public/images/img-pro-23.png" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                <div class="price">
                                    <span class="new">15.190.000đ</span>
                                    <span class="old">17.190.000đ</span>
                                </div>
                                <a href="" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        <li class="clearfix">
                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                <img src="public/images/img-pro-18.png" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                <div class="price">
                                    <span class="new">15.190.000đ</span>
                                    <span class="old">17.190.000đ</span>
                                </div>
                                <a href="" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        <li class="clearfix">
                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                <img src="public/images/img-pro-15.png" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                <div class="price">
                                    <span class="new">15.190.000đ</span>
                                    <span class="old">17.190.000đ</span>
                                </div>
                                <a href="" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> -->
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>