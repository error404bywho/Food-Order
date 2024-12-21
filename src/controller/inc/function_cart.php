<?php
include_once 'conn.php';
include_once '../model/Category.php';
include_once '../model/Voucher.php';
include_once '../model/Category.php';

function Get_voucher_discount_by_code($voucherCode){
global $pdo;
$query = $pdo->prepare("SELECT discountValue FROM voucher WHERE code = $voucherCode");
    try{
        $query->execute();    
        $result = $query->fetch();
        $voucher = $result['discountValue'];
        return $voucher;  
    }catch (Exception $e){
        return 0;
    }
}
function Get_voucher_id_by_code($voucherCode){
    global $pdo;
    $query = $pdo->prepare("SELECT id FROM voucher WHERE code = $voucherCode");
        try{
            $query->execute();    
            $result = $query->fetch();
            $voucher = $result['id'];
            return $voucher;  
        }catch (Exception $e){
            return 0;
        }
    }
    function Create_Bill($bill) {
        global $pdo;
        $query = $pdo->prepare("INSERT INTO `bill` (`id`, `email`, `address`, `phone`, `content`, `totalAmount`, `discountAmount`, `finalAmount`, `idUser`, `idVoucher`, `dateCreated`,`payment_status`) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, current_timestamp(),?)");
        try {
            // Thực thi truy vấn với các giá trị từ $bill
            $query->execute([
                $bill->get_ID(),
                $bill->get_Email(),
                $bill->get_Address(),
                $bill->get_Phone(),
                $bill->get_Content(),
                $bill->Get_TotalAmount(),
                $bill->Get_DiscountAmount(),
                $bill->Get_FinalAmount(),
                $bill->Get_IdUser(),
                $bill->Get_IdVoucher(),
                'paid'
            ]);
            /*
            
    INSERT INTO `bill` (`id`, `email`, `address`, `phone`, `content`, `totalAmount`, 
                        `discountAmount`, `finalAmount`, `idUser`, `idVoucher`, `dateCreated`) 
    VALUES ('1', 'connguathanhtroia@gmail.com', 'djknvj', '0764524805', 'dfgbdfb', '10',
             '0.1', '9', '1006', '2', current_timestamp())
            */
            // Trả về ID của bản ghi vừa thêm (nếu cần)
            return 1;
        } catch (Exception $e) {
            // Log lỗi nếu cần thiết
            error_log("Error inserting bill: " . $e->getMessage());
            return $e->getMessage();
        }
    }
    function Create_Bill_with_QR($bill) {
        global $pdo;
        $query = $pdo->prepare("INSERT INTO `bill` (`id`, `email`, `address`, `phone`, `content`, `totalAmount`, `discountAmount`, `finalAmount`, `idUser`, `idVoucher`, `dateCreated`,`payment_status`) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, current_timestamp(),?)");
        try {
            // Thực thi truy vấn với các giá trị từ $bill
            $query->execute([
                $bill->get_ID(),
                $bill->get_Email(),
                $bill->get_Address(),
                $bill->get_Phone(),
                $bill->get_Content(),
                $bill->Get_TotalAmount(),
                $bill->Get_DiscountAmount(),
                $bill->Get_FinalAmount(),
                $bill->Get_IdUser(),
                $bill->Get_IdVoucher(),
                'unpaid'
            ]);
            /*
            
    INSERT INTO `bill` (`id`, `email`, `address`, `phone`, `content`, `totalAmount`, 
                        `discountAmount`, `finalAmount`, `idUser`, `idVoucher`, `dateCreated`) 
    VALUES ('1', 'connguathanhtroia@gmail.com', 'djknvj', '0764524805', 'dfgbdfb', '10',
             '0.1', '9', '1006', '2', current_timestamp())
            */
            // Trả về ID của bản ghi vừa thêm (nếu cần)
            return $pdo->lastInsertId();
        } catch (Exception $e) {
            // Log lỗi nếu cần thiết
            error_log("Error inserting bill: " . $e->getMessage());
            return $e->getCode();
        }
    }
?>