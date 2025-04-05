<?php get_header('admin'); ?>
<div id="main-content-wp" class="info-profile-page">
    <div class="wrap clearfix">
        <?php get_sidebar('admin'); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thông tin cá nhân</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <p class="error">
                        <?php if(isset($error['db'])) echo $error['db']?>
                    </p>
                    <form method="POST" action="?mod=admin&controller=employee&action=editEmployee">
                        <input type="hidden" name="employee_id" value="<?php echo $user['id']; ?>">
                        <label for="fullname">Họ và tên</label>
                        <input type="text" name="fullname" id="fullname" class="form-input" required value="<?php  if(isset($user['fullname'])) echo $user['fullname']; ?>">
                        <p class="error">
                            <?php if(isset($error['fullname'])) echo $error['fullname']?>
                        </p>
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" class="form-input" required value="<?php echo $user['username']; ?>">
                        <p class="error">
                            <?php if(isset($error['username'])) echo $error['username']?>
                        </p>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-input" required value="<?php echo $user['email']; ?>">
                        <p class="error">
                            <?php if(isset($error['email'])) echo $error['email']?>
                        </p>
                        <label for="phone">Số điện thoại</label>
                        <input type="tel" name="phone" id="phone" class="form-input" required value="<?php echo $user['phone']; ?>">
                        <p class="error">
                            <?php if(isset($error['phone'])) echo $error['phone']?>
                        </p>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                    <a href="?mod=admin&controller=profile&action=changePassword" class="change-password-link">Đổi mật khẩu</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer('admin'); ?>
