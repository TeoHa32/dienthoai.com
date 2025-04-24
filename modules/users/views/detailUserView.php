<?php get_header();?>



<style>
.user-container {
    display: flex;
    padding: 20px;
    background: #f8f9fa;
    min-height: 500px;
}

.sidebar {
    width: 250px;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    margin-right: 20px;
}

.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar li {
    margin-bottom: 10px;
}

.sidebar a {
    display: block;
    padding: 10px 15px;
    color: #333;
    text-decoration: none;
    border-radius: 4px;
    transition: all 0.3s;
}

.sidebar a:hover,
.sidebar a.active {
    background: #007bff;
    color: #fff;
}

.sidebar i {
    margin-right: 10px;
}

.main-content {
    flex: 1;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.user-form {
    max-width: 600px;
    margin: 0 auto;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
}

.form-group input {
    width: 100%;
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.btn-update {
    background: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background 0.3s;
}

.btn-update:hover {
    background: #0056b3;
}
</style>

<div class="user-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <ul>
            <li>
                <a href="?mod=users&controller=index&action=detailUser" class="active">
                    <i class="fa fa-user"></i> Tài khoản của tôi
                </a>
            </li>
            <li>
                <a href="?mod=users&controller=index&action=orderHistory">
                    <i class="fa fa-history"></i> Lịch sử đơn hàng
                </a>
            </li>
            <li>
                <a href="?mod=users&controller=index&action=logout">
                    <i class="fa fa-sign-out"></i> Đăng xuất
                </a>
            </li>
        </ul>
    </div>
    <!-- Main Content -->
    <div class="main-content">
        <h2>Thông tin tài khoản</h2>
        <form class="user-form" method="POST" action="?mod=users&controller=index&action=updateUser">
            <div class="form-group">
                <label>Tên đăng nhập</label>
                <input type="text" value="<?php echo $user['username']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Họ và tên</label>
                <input type="text" name='fullname' value="<?php echo $user['fullname']; ?>">
            </div>
            <input type="text" hidden name='id' value="<?php echo $user['id']; ?>">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name='email' value="<?php echo $user['email']; ?>">
            </div>
            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="tel" name='phone' value="<?php echo $user['phone']; ?>">
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name='address' value="<?php echo $user['address']; ?>">
            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" name='password'>
            </div>
            <button type="submit" class="btn-update" name ="btn-update">Cập nhật thông tin</button>
        </form>
    </div>
</div>
<?php get_footer();?>
