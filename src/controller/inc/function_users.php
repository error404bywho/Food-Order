<?php
/* ================================ SELECT USER ================================ */
function Check_Login($pdo,$email,$plain_password){
    
    $password = hashPassword($plain_password);

    // Prepare SQL query to fetch user details
    $query = $pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password ");
    $query->bindParam(':email', $email);
    $query->bindParam(':password',$password);

    try {
    $query->execute();
    $result = $query->fetch();
    
    if($result){
        $Id = $result['id'];
        $Email = $result['Email'];
        $Password = $result['Password'];
        $Fullname = $result['Fullname'];
        $Phone = $result['Phone'];
        $Birthday = $result['Birthday'];
        $Address = $result['Address'];
        $Role = $result['Role'];
        $Status = $result['Status'];
        
        $user = new Users($Id,$Email,$Password,$Fullname,$Phone,$Birthday,$Address,$Role,$Status);
        return $user;
        // Dieu huong cho admin
    } else {
       return null;
    }
    }catch (Exception $e) {
        error_log($e->getMessage()); // Ghi log lỗi vào file log
        $user = 'failed: ' . $e->getMessage();
        return $user; // Trả về chi tiết lỗi (chỉ cho môi trường dev)
    }
}
function Check_Exist_By_Email($pdo,$Email){

    $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    // $query->bindParam(':email', $email);

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
        return $user;
        // Dieu huong cho admin
    } else {
       return null;
    }
    }catch(Exception $e){
        return null;
    }
}
/* ================================ INSERT USER ================================ */
function Insert_User($pdo,$user){
     $statement = '400'; //fail

    // Prepare SQL query to fetch user details
$query = $pdo->prepare("INSERT INTO `users` (`id`,`email`, `password`, `fullname`, `phone`, `birthday`, `address`, `role`, `status`) 
VALUES ( :id ,:email, :password, :fullname, :phone, :birthday, :address, :role, :status)");

$query->bindParam(':id', $user->Get_Id );
$query->bindParam(':email', $user->Get_Email);
$query->bindParam(':password', $user->Get_Password);
$query->bindParam(':fullname', $user->Get_FullName);
$query->bindParam(':phone', $user->Get_Phone);
$query->bindParam(':birthday', $user->Get_Birthday);
$query->bindParam(':address', $user->Get_Address);
$query->bindParam(':role', $user->Get_role);
$query->bindParam(':status',$user->Get_active );
try{
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $_SESSION['test'] = $result['id'];
    if($result){
        $statement = '200'; // insert success
        return $statement;
    } else {                // insert failed
        return $statement;
    }
} catch(Exception $e){
        $statement = $e->getcode();
         return $statement;
    }
}
/* ================================ DELETE USER ================================ */
/* ================================ UPDATE USER ================================ */

/* ================================ RAMDOM PASSWORD ================================ */
function generateRandomPassword($length) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    $charactersLength = strlen($characters);
    $randomPassword = '';
    
    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[random_int(0, $charactersLength - 1)];
    }
    
    return $randomPassword;
}
/* ==================================== RANDOM ID ==================================== */
function hashToElevenDigitId($email){
    // Băm chuỗi bằng hàm hash SHA-256
    $hash = hash('sha256', $email);
    // Chuyển hash thành số nguyên lớn
    $numericHash = base_convert($hash, 16, 10);
    // Lấy 6 chữ số cuối từ số nguyên
    $ElevenDigitId = substr($numericHash, -11);
    return $ElevenDigitId;
}
/* ================================ HASH SHA256 PASSWORD ================================ */
function hashPassword($plain_password){
    // Băm chuỗi bằng hàm hash SHA-256
    $encrypted_password = hash('sha256', $plain_password);
    return $encrypted_password;
}