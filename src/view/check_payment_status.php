<?php

 /*
 File check_payment_status.php
 File phục vụ cho Ajax POST lấy kết quả trạng thái đơn hàng
 URL ajax post sẽ là https://yourwebsite.tld/check_payment_status.php
 */
 
 // Include file db_connect.php, file chứa toàn bộ kết nối CSDL
 require('../controller/inc/conn.php');
 
 // Chỉ cho phép POST và POST có ID đơn hàng
 if(!$_POST || !isset($_POST['order_id']) || !is_numeric($_POST['order_id']))
    die('access denied');
 
 $order_id = $_POST['order_id'];

 // Kiểm tra đơn hàng có tồn tại không
//  $result = $pdo->query("SELECT payment_status FROM bills where id={$order_id}");
 $query = $pdo->prepare("SELECT payment_status FROM bill where id={$order_id}");
$query->execute();    
$result = $query->fetch(PDO::FETCH_OBJ); // Trả về một đối tượng
 if($result) {
     // Lấy thông tin đơn hàng
    $order_details = $result;
    // Trả về kết quả trạng thái đơn hàng dạng JSON. Ví dụ: {"payment_status":"Unpaid"}
    echo json_encode(['payment_status' => $order_details->payment_status]);
 } else {
     
     // Trả về kết quả không tìm thấy đơn hàng
    echo json_encode(['payment_status' => 'chua co trong db']);

 }
 

?>