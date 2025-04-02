<?php get_header();?>

<!-- Add Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="register-container">
    <div class="register-box">
        <h2>Đăng ký tài khoản</h2>
        <form action="" method="POST">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Tên đăng nhập" required>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <i class="fas fa-phone"></i>
                <input type="tel" name="phone" placeholder="Số điện thoại" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Mật khẩu" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="re_password" placeholder="Nhập lại mật khẩu" required>
            </div>
            <div class="terms">
                <label>
                    <input type="checkbox" name="terms" required>
                    Tôi đồng ý với <a href="#">điều khoản sử dụng</a>
                </label>
            </div>
            <button type="submit" class="register-btn">Đăng ký</button>
            <div class="login-link">
                Đã có tài khoản? <a href="?mod=users&controller=index&action=login">Đăng nhập</a>
            </div>
        </form>
    </div>
</div>

<style>
    .register-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 50vh;
        background: #f5f5f5;
        padding: 20px 0;
    }
    .register-box {
        background: white;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 400px;
    }
    .register-box h2 {
        text-align: center;
        color: #333;
        margin-bottom: 30px;
    }
    .input-group {
        position: relative;
        margin-bottom: 20px;
    }
    .input-group i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #666;
    }
    .input-group input {
        width: 100%;
        padding: 12px 15px 12px 45px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
        transition: all 0.3s;
    }
    .input-group input:focus {
        border-color: #4CAF50;
        box-shadow: 0 0 5px rgba(76, 175, 80, 0.3);
        outline: none;
    }
    .terms {
        margin-bottom: 20px;
        font-size: 14px;
    }
    .terms a {
        color: #4CAF50;
        text-decoration: none;
    }
    .terms a:hover {
        text-decoration: underline;
    }
    .register-btn {
        width: 100%;
        padding: 12px;
        background: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s;
        margin-bottom: 15px;
    }
    .register-btn:hover {
        background: #45a049;
    }
    .login-link {
        text-align: center;
        font-size: 14px;
    }
    .login-link a {
        color: #4CAF50;
        text-decoration: none;
    }
    .login-link a:hover {
        text-decoration: underline;
    }
</style>

<?php get_footer();?> 