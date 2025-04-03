<?php
    get_header('admin');
?>



<div class="edit-product-container">
    <h2 class="edit-product-title">Chỉnh Sửa Sản Phẩm</h2>
    
    <form action="?mod=admin&controller=product&action=editProduct" method="POST" enctype="multipart/form-data">
        <input type="text" name="id" value="<?php echo $product['id']; ?>" hidden>
        <div class="form-group">
            <label for="product_name">Tên Sản Phẩm</label>
            <input type="text" class="form-control" id="product_name" name="product_name" 
                   value="<?php if(!empty($product['name'])) echo $product['name']; ?>" required>
            <?php if(isset($error['product_name'])): ?>
                <div class="error-message"><?php echo $error['product_name']; ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="price">Giá</label>
            <input type="number" class="form-control" id="price" name="price" 
                   value="<?php if(!empty($product['price'])) echo $product['price']; ?>" required>
            <?php if(isset($error['price'])): ?>
                <div class="error-message"><?php echo $error['price']; ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="desc">Mô Tả</label>
            <textarea class="form-control textarea-control" id="desc" name="desc" required><?php if(!empty($product['des'])) echo $product['des']; ?></textarea>
            <?php if(isset($error['desc'])): ?>
                <div class="error-message"><?php echo $error['desc']; ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="regrect">Chi Tiết</label>
            <textarea class="form-control textarea-control" id="regrect" name="regrect" required><?php if(!empty($product['regrect'])) echo $product['regrect']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="parent_id">Danh Mục</label>
            <select class="form-control" id="parent_id" name="parent_id" required>
                
                <?php if(isset($listCategory)): ?>
                    <?php foreach($listCategory as $category): ?>
                        <option value="<?php echo $category['id']; ?>" 
                                <?php echo (isset($product['category_id']) && $product['category_id'] == $category['id']) ? 'selected' : ''; ?>>
                            <?php echo $category['name']; ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <?php if(isset($error['category'])): ?>
                <div class="error-message"><?php echo $error['category']; ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="file">Hình Ảnh Sản Phẩm</label>
            <?php if(isset($product['img'])): ?>
                <img src="<?php if(!empty($img['src'])) echo $img['src']; ?>" alt="Hình ảnh hiện tại" class="image-preview">
            <?php endif; ?>
            <input type="file" class="form-control" id="file" name="file" >
            <?php if(isset($error['image'])): ?>
                <div class="error-message"><?php echo $error['image']; ?></div>
            <?php endif; ?>
        </div>

        <button type="submit" name="btn-submit" class="btn-submit">Cập Nhật</button>
    </form>
</div>

<?php get_footer('admin');?>