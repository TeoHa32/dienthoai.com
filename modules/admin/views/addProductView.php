<?php get_header('admin'); ?>


<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar('admin'); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="?mod=admin&controller=product&action=addProduct" method="POST" enctype="multipart/form-data">
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="product-name" value="<?php if(isset($data['name']))echo $data['name']?>">
                        
                        <label for="price">Giá sản phẩm</label>
                        <input type="text" name="price" id="price" value="<?php if(isset($data['price']))echo $data['price']?>">
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="desc" id="desc"><?php if(isset($data['des']))echo $data['des']?></textarea>
                        <label for="regrect">Chi tiết</label>
                        <textarea name="regrect" id="regrect" class="ckeditor"><?php if(isset($data['regrect']))echo $data['regrect']?></textarea>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb" value="<?php if(isset($img))echo $img?>">
                            
                            
                        </div>
                        <label>Danh mục sản phẩm</label>
                        <select name="parent_id">
                            
                            <?php foreach($listCategory as $item){?>
                                <option value="<?php echo $item['id']?>" <?php if(isset($data['category_id']) && $data['category_id'] == $item['id'])echo 'selected'?>><?php echo $item['name']?></option>



                                <?php }?>
                            
                            
                        </select>
                        
                        <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer('admin'); ?>
