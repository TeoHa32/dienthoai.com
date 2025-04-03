<?php get_header();?>

<!-- Add Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="login-container">
    <div class="login-box">
        <h2>Đăng nhập hệ thống</h2>
        <form action="?mod=users&controller=index&action=login" method="POST">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Tên đăng nhập" required value="<?php if(!empty($data['username'])) echo $data['username'] ?>">
                <p class="error-message"><?php if(!empty($error['username'])) echo $error['username'] ?></p>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Mật khẩu" required value="<?php if(!empty($data['password'])) echo $data['password'] ?>">
                <p class="error-message"><?php if(!empty($error['password'])) echo $error['password'] ?></p>
            </div>
            <div class="remember-forgot">
                <label>
                    <input type="checkbox" name="remember" <?php if(!empty($data['remember'])) echo 'checked' ?>> Ghi nhớ đăng nhập
                </label>
                <a href="#">Quên mật khẩu?</a>
            </div>
            <p class="error-message"><?php if(!empty($error['login'])) echo $error['login'] ?></p>
            <button type="submit" class="login-btn" name="login">Đăng nhập</button>
            <div class="register-link">
                Chưa có tài khoản? <a href="?mod=users&controller=index&action=redirectRegister">Đăng ký</a>
            </div>
        </form>
    </div>
</div>



<?php get_footer();?>