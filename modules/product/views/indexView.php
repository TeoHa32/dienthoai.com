<?php get_header();?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Điện thoại</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left"><?php if(isset($category)) echo getCategory($category)['name'];?></h3>
                    
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php if(isset($listProduct)){ ?>
                        <?php foreach($listProduct as $item){ ?>
                        <li>
                            <a href="?mod=product&controller=index&action=redirectDetailProduct&id=<?php echo $item['id']?>" title="" class="thumb">
                                <img src="<?php echo getImgById($item['id'])['src']?>">
                            </a>
                            <a href="?page=detail_product" title="" class="product-name"><?php echo $item['name']?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($item['price'])?></span>
                                <span class="old"><?php echo currency_format($item['price']+1000000)?></span>
                            </div>
                            <div class="action clearfix">
                            <a href="?mod=cart&controller=index&action=add&id=<?php echo $item['id'];?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=cart&controller=index&action=addCheckOut&id=<?php echo $item['id'];?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php if(isset($price)) {?>
                            <?php  if($page>1){?>
                        <li>
                        <a href="<?php echo '?mod=product&controller=index&action=pagination&price='.$price.'&category = '.$category .'&page='.$page-1; ?>" title=""><</a>
                        </li>
                        <?php }?>
                        <?php for($i=1;$i<=$num_page;$i++){?>
                        <li>
                           
                            <a href='?mod=product&controller=index&action=pagination&price=<?php echo $price?>&category=<?php echo $category?>&page=<?php echo $i?>' title="" ><span <?php if($page==$i){echo 'class="active"';}?>><?php echo $i?></span></a>
                        </li>
                        <?php }?>
                        <?php if($page<$num_page){?>
                        <li>
                            <a href="<?php echo '?mod=product&controller=index&action=pagination&&price='.$price.'category = '.$category .'&page='.$page+1; ?>" title="">></a>
                        </li>
                        <?php } ?>
                    <?php }else{ if($page>1){?>
                        <li>
                        <a href="<?php echo '?mod=product&controller=index&action=pagination&category = '.$category .'&page='.$page-1; ?>" title=""><</a>
                        </li>
                        <?php }?>
                        <?php for($i=1;$i<=$num_page;$i++){?>
                        <li>
                           
                            <a href='?mod=product&controller=index&action=pagination&category=<?php echo $category?>&page=<?php echo $i?>' title="" ><span <?php if($page==$i){echo 'class="active"';}?>><?php echo $i?></span></a>
                        </li>
                        <?php }?>
                        <?php if($page<$num_page){?>
                        <li>
                            <a href="<?php echo '?mod=product&controller=index&action=pagination&category = '.$category .'&page='.$page+1; ?>" title="">></a>
                        </li>
                        <?php } }?>
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
            <div class="section" id="filter-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Bộ lọc</h3>
                </div>
                <div class="section-detail">
                    <form method="GET">
                        <input type="text" hidden name="mod" value="product">
                        <input type="text" hidden name="controller" value="index">
                        <input type="text" hidden name="action" value="pagination">
                        <input type="text" hidden name="category" value="<?php echo $category?>">
                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Giá</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    
                                    <td><input type="radio" name="r-price" value="1" <?php if(isset($price)) {if($price == 1) echo "checked";} ?>></td>
                                    <td>Dưới 500.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price" value="2" <?php if(isset($price)) {if($price == 2) echo "checked";} ?>></td>
                                    <td>500.000đ - 1.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price" value="3" <?php if(isset($price)) {if($price == 3) echo "checked";} ?>></td>
                                    <td>1.000.000đ - 5.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price" value="4" <?php if(isset($price)) {if($price == 4) echo "checked";} ?>></td>
                                    <td>5.000.000đ - 10.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price" value="5" <?php if(isset($price)) {if($price == 5) echo "checked";} ?>></td>
                                    <td>Trên 10.000.000đ</td>
                                </tr>
                            </tbody>
                        </table>
                            <input type="submit" name="btn-r-price" value="Lọc" id="btn-r-price">
                    </form>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="?page=detail_product" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>
