<?php
/* ================================ SELECT USER ================================ */
function Select_User($pdo,$email){

}
/* ================================ CHECK LOGIN ================================ */
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
function Insert_User($pdo,$email,$password,$full_Name,$phone,$birthday,$address,$role,$status){
     $statement = '400'; //fail

    // Prepare SQL query to fetch user details
$query = $pdo->prepare("INSERT INTO `users` (`email`, `password`, `fullname`, `phone`, `birthday`, `address`, `role`, `status`) 
VALUES ( :email, :password, :fullname, :phone, :birthday, :address, :role, :status)");

$query->bindParam(':email', $email);
$query->bindParam(':password',$password );
$query->bindParam(':fullname', $full_Name);
$query->bindParam(':phone',$phone );
$query->bindParam(':birthday', $birthday);
$query->bindParam(':address', $address);
$query->bindParam(':role',$role);
$query->bindParam(':status',$status);
try{
    $query->execute();
    if($query){
        $statement = '200'; // insert success
        $_SESSION['get_id'] = $pdo->lastInsertId();
        
        return $statement;
    } else {                // insert failed
        return $statement;
    }
} catch(Exception $e){
        $statement = $e->getcode();
        echo $e->getMessage();
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