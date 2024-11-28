 <?php
session_start();
include_once 'inc/conn.php';
include_once 'inc/function_users.php';
include_once '../model/Users.php';

$email = $_POST['email'];
$password = $_POST['password'];

$user = Check_Login($pdo,$email,$password);
if($user !== null){
    if($user->Get_Role() === 'admin'){
        $_SESSION['session_id'] = $user->get_ID();
        Header("Location: ../view/admin.php");
        exit; 
    } else {
        // Dieu huong cho user
        $_SESSION['session_id'] = $user->get_ID();
        Header("Location: ../view/index.php");
        }
}else if($user !== 'failed'){
        $_SESSION['error'] = "Email hoặc mật khẩu không chính xác.";
        Header("Location: ../view/sign_in.php");
}else {
    $_SESSION['error'] = "lỗi đăng nhập";
    Header("Location: ../view/sign_in.php");
}

?>