<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập | Foodie</title>
    <link rel="stylesheet" href="style.css"> <!-- Link tới file CSS riêng -->
</head>
<body>
    <!-- header -->
    <div class="login-form">
        <h2>🍜 Đăng Nhập Foodie 🍕</h2>
        <form action="/login" method="post">
            <div class="input-group">
                <input type="text" name="username" placeholder="Tên người dùng" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Mật khẩu" required>
            </div>
            <div class="button-group">
                <button type="submit">Đăng Nhập</button>
            </div>
        </form>
        <a href="#" class="register-link">Chưa có tài khoản? Đăng ký ngay!</a>
    </div>
<!-- footer -->
</body>
</html>
