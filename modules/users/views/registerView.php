<?php get_header();?>

<!-- Add Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="register-container">
    <div class="register-box">
        <h2>Đăng ký tài khoản</h2>
        <?php if(isset($error['db'])): ?>
            <p class="error-message" style="text-align: center;"><?php echo $error['db']; ?></p>
        <?php endif; ?>
        <form action="?mod=users&controller=index&action=addUser" method="POST">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Tên đăng nhập" required value="<?php if(!empty($data['username'])) echo $data['username'] ?>">
                <p class="error-message"><?php if(!empty($error['username'])) echo $error['username'] ?></p>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="text" name="fullname" placeholder="Fullname" required value="<?php if(!empty($data['fullname'])) echo $data['fullname'] ?>">
                <p class="error-message"><?php if(!empty($error['fullname'])) echo $error['fullname'] ?></p>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required value="<?php if(!empty($data['email'])) echo $data['email'] ?>">
                <p class="error-message"><?php if(!empty($error['email'])) echo $error['email'] ?></p>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="text" name="address" placeholder="Address" required value="<?php if(!empty($data['address'])) echo $data['address'] ?>">
                <p class="error-message"><?php if(!empty($error['address'])) echo $error['address'] ?></p>
            </div>
            <div class="input-group">
                <i class="fas fa-phone"></i>
                <input type="tel" name="phone" placeholder="Số điện thoại" required value="<?php if(!empty($data['phone'])) echo $data['phone'] ?>">
                <p class="error-message"><?php if(!empty($error['phone'])) echo $error['phone'] ?></p>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Mật khẩu" required>
                <p class="error-message"><?php if(!empty($error['password'])) echo $error['password'] ?></p>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="re_password" placeholder="Nhập lại mật khẩu" required>
                <p class="error-message"><?php if(!empty($error['re_password'])) echo $error['re_password'] ?></p>
            </div>
            <button type="submit" class="register-btn" name="register">Đăng ký</button>
            <div class="login-link">
                Đã có tài khoản? <a href="?mod=users&controller=index&action=index">Đăng nhập</a>
            </div>
        </form>
    </div>
</div>


<?php get_footer();?> 