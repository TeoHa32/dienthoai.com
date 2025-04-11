<!DOCTYPE html>
<html>
    <head>
        <title>ISMART STORE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="./public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="./public/css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="./public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="./public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
        <link href="./public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="./public/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="./public/css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="./public/css/login.css" rel="stylesheet" type="text/css"/>
        <script src="./public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="./public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
        <script src="./public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="./public/js/carousel/owl.carousel.js" type="text/javascript"></script>
        <script src="./public/js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">
                            <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                            <div id="main-menu-wp" class="fl-right">
                                <ul id="main-menu" class="clearfix">
                                    <li>
                                        <a href="?page=home" title="">Trang chủ</a>
                                    </li>
                                    <li>
                                        <a href="?page=category_product" title="">Sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="?page=blog" title="">Blog</a>
                                    </li>
                                    <li>
                                        <a href="?page=detail_blog" title="">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a href="?page=detail_blog" title="">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner">
                            <a href="?page=home" title="" id="logo" class="fl-left"><img src="public/images/logo.png"/></a>
                            <div id="search-wp" class="fl-left">
                                <form method="POST" action="">
                                    <input type="text" name="s" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                    <button type="submit" id="sm-s">Tìm kiếm</button>
                                </form>
                            </div>
                            <div id="action-wp" class="fl-right">
                                <div id="advisory-wp" class="fl-left">
                                    <?php if(isset($_SESSION['is_login'])){ ?>
                                    <span class="title"><a href="#"><i class="fa-solid fa-user"  aria-hidden="true"></i></i></a></span>
                                    <?php }else{ ?>
                                    <span class="title"><a href="?mod=users&action=index"><i class="fa-solid fa-right-to-bracket"  aria-hidden="true"></i></a></span>
                                    <?php } ?>
                                </div>
                                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                <a href="?mod=cart&controller=index&action=index" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num"><?php if(isset($_SESSION['cart']['info']['num_order'])) echo $_SESSION['cart']['info']['num_order']; else echo 0; ?></span>
                                </a>
                                <div id="cart-wp" class="fl-right" onclick="window.location.href='?mod=cart&controller=index&action=index'">
                                    
                                    <div id="btn-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num"><?php if(isset($_SESSION['cart']['info']['num_order'])) echo $_SESSION['cart']['info']['num_order']; else echo 0; ?></span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>