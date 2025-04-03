<?php
    get_header('admin');

?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar('admin'); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                    <a href="?mod=admin&controller=product&action=redirectaddProduct" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(69)</span></a> |</li>
                            <li class="publish"><a href="">Đã đăng <span class="count">(51)</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt<span class="count">(0)</span> |</a></li>
                            <li class="pending"><a href="">Thùng rác<span class="count">(0)</span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Công khai</option>
                                <option value="1">Chờ duyệt</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Giá</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($listProduct)){?>
                                    <?php $i=1; 
                                    
                                    
                                    ?>
                                    <?php foreach($listProduct as $item){?>
                                        <?php 
                                            $img=getImgById($item['img']);
                                            $category=getCategoryById($item['category_id']);
                                            
                                            
                                            ?>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text"><?php echo $i?></h3></span>
                                    
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?php echo $img['src']?>" alt="">
                                        </div>
                                    </td>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo $item['name']?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="?mod=admin&controller=product&action=redirectEditProduct&id=<?php echo $item['id']?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="?mod=admin&controller=product&action=deleteProduct&id=<?php echo $item['id']?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo currency_format($item['price'])?></span></td>
                                    <td><span class="tbody-text"><?php echo $category['name']?></span></td>
                                    
                                </tr>
                                <?php $i++;}}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <ul id="list-paging" class="fl-right">
                        <?php if($page>1){?>
                        <li>
                            <a href="<?php echo '?mod=admin&controller=product&action=pagination&page='.$page-1; ?>" title=""><</a>
                        </li>
                        <?php }?>
                        <?php for($i=1;$i<=$num_page;$i++){?>
                        <li>
                            <a href="?mod=admin&controller=product&action=pagination&page=<?php echo $i?>" title=""><?php echo $i?></a>
                        </li>
                        <?php }?>
                        <?php if($page<$num_page){?>
                        <li>
                            <a href="<?php echo '?mod=admin&controller=product&action=pagination&page='.$page+1; ?>" title="">></a>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer('admin'); ?>