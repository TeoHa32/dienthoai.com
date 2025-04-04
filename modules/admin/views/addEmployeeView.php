<?php get_header('admin');?>

<div id="main-content-wp" class="add-employee-page">
    <div class="wrap clearfix">
        <?php get_sidebar('admin'); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm nhân viên mới</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <p class="error">
                        <?php if(isset($error['db'])) echo $error['db']?>
                    </p>
                    <form method="POST" action="?mod=admin&controller=employee&action=addEmployee">
                        <label for="fullname">Họ và tên</label>
                        <input type="text" name="fullname" id="fullname" class="form-input" required value="<?php if(isset($data['fullname'])) echo $data['fullname']?>">
                        <p class="error">
                            <?php if(isset($error['fullname'])) echo $error['fullname']?>
                        </p>
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" class="form-input" required value="<?php if(isset($data['username'])) echo $data['username']?>">
                        <p class="error">
                            <?php if(isset($error['username'])) echo $error['username']?>
                        </p>
                        <label for="password">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="form-input" required value="<?php if(isset($data['password'])) echo $data['password']?>">
                        <p class="error">
                            <?php if(isset($error['password'])) echo $error['password']?>
                        </p>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-input" required value="<?php if(isset($data['email'])) echo $data['email']?>">
                        <p class="error">
                            <?php if(isset($error['email'])) echo $error['email']?>
                        </p>
                        <label for="phone">Số điện thoại</label>
                        <input type="tel" name="phone" id="phone" class="form-input" required  value="<?php if(isset($data['phone'])) echo $data['phone']?>">
                        <p class="error">
                            <?php if(isset($error['phone'])) echo $error['phone']?>
                        </p>
                        <button type="submit" name="btn-submit" id="btn-submit">Thêm nhân viên</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>











<?php get_footer('admin');?>
