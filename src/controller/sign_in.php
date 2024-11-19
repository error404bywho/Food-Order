 <?php
session_start();
include_once 'inc/conn.php';
include_once '../model/Users.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Prepare SQL query to fetch user details
$query = $pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password ");
$query->bindParam(':email', $email);
$query->bindParam(':password', $password);
try {
    $query->execute();
$result = $query->fetch();

if($result){
    
    $Id = $result['$id'];
    $Email = $result['$Email'];
    $Password = $result['$Password'];
    $Fullname = $result['$Fullname'];
    $Phone = $result['$Phone'];
    $Birthday = $result['$Birthday'];
    $Address = $result['$Address'];
    $Role = $result['$Role'];
    $Status = $result['$Status'];
    
    $user = new Users($Id,$Email,$Password,$Fullname,$Phone,$Birthday,$Address,$Role,$Status);
    $_SESSION['user_id'] = $Id;
    // Dieu huong cho admin
    if($result['role'] === 'admin') { 
           Header("Location: ../view/admin.html");
           exit; 
    } else {
    // Dieu huong cho user
    Header("Location: ../view/index.html");
    }
} else {
    $_SESSION['error'] = "Email hoặc mật khẩu không chính xác.";
    Header("Location: ../view/sign_in.php");
}
}catch(Exception $e){
    
}
?>