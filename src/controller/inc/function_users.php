<?php
include_once 'conn.php';
/* ================================ SELECT USER ================================ */
function Select_User($email){

}
/* ================================ CHECK LOGIN ================================ */
function Check_Login($email,$plain_password){
    global $pdo;
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
        return $user; 
    }
}
function Check_Exist_By_Email($Email){
    global $pdo;
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
function Insert_User($email,$password,$full_Name,$phone,$birthday,$address,$role,$status){
     $statement = '400'; //fail
     global $pdo;
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
function Delete_User($email){
    global $pdo;
    // Prepare SQL query to fetch user details
$query = $pdo->prepare("DELETE FROM `users` WHERE `email`=$email)");

try{
    $query->execute();
    if($query){
         return '200'; // delete success
      
    } else {                // delete failed
        return '404';
    }
} catch(Exception $e){
        $statement = $e->getcode();
        echo $e->getMessage();
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
function caesarEncode($text, $shift) {
    $result = '';
    
    // Duyệt qua từng ký tự trong chuỗi
    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        
        // Kiểm tra xem ký tự có phải là chữ cái in hoa không
        if (ctype_upper($char)) {
            // Mã hóa chữ cái in hoa
            $result .= chr((ord($char) - 65 + $shift) % 26 + 65);
        }
        // Kiểm tra xem ký tự có phải là chữ cái thường không
        elseif (ctype_lower($char)) {
            // Mã hóa chữ cái thường
            $result .= chr((ord($char) - 97 + $shift) % 26 + 97);
        }
        else {
            // Giữ nguyên ký tự không phải chữ cái
            $result .= $char;
        }
    }
    
    return $result;
}
function caesarDecode($text, $shift) {
    return caesarEncode($text, -$shift); // Giải mã bằng cách sử dụng dịch âm
}