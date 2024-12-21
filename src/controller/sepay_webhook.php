<?php

/* 
File sepay_webhook.php
File này dùng làm endpoint nhận webhook từ SePay. Mỗi khi có giao dịch SePay sẽ bắn webhook về và chúng ta sẽ lưu thông tin giao dịch vào CSDL. Đồng thời bóc tách ID đơn hàng từ nội dung thanh toán. Sau khi tìm được ID đơn hàng thì cập nhật trạng thái thanh toán của đơn hàng thành đã thanh toán (payment_status=Paid).
Xem hướng dẫn tạo tích hợp Webhook phía SePay tại https://docs.sepay.vn/tich-hop-webhooks.html
Endpoint nhận webhook sẽ là https://yourwebsite.tld/sepay_webhook.php
*/

// Include file db_connect.php, file chứa toàn bộ kết nối CSDL
require('inc/conn.php');

// Lấy dữ liệu từ webhooks, xem các trường dữ liệu tại https://docs.sepay.vn/tich-hop-webhooks.html#du-lieu
$data = json_decode(file_get_contents('php://input'));
if (!is_object($data)) {
    echo json_encode(['success' => false, 'message' => 'No data']);
    die('No data found!');
}

// Khởi tạo các biến
$gateway = $data->gateway ?? null;
$transaction_date = $data->transactionDate ?? null;
$account_number = $data->accountNumber ?? null;
$sub_account = $data->subAccount ?? null;

$transfer_type = $data->transferType ?? null;
$transfer_amount = $data->transferAmount ?? 0;
$accumulated = $data->accumulated ?? 0;

$code = $data->code ?? null;
$transaction_content = $data->content ?? '';
$reference_number = $data->referenceCode ?? null;
$body = $data->description ?? null;

$amount_in = 0;
$amount_out = 0;

// Kiểm tra giao dịch tiền vào hay tiền ra
if ($transfer_type === "in") {
    $amount_in = $transfer_amount;
} elseif ($transfer_type === "out") {
    $amount_out = $transfer_amount;
}

// Lưu giao dịch vào CSDL
try {
    $sql = "INSERT INTO tb_transactions (gateway, transaction_date, account_number, sub_account, amount_in, amount_out, accumulated, code, transaction_content, reference_number, body)
            VALUES (:gateway, :transaction_date, :account_number, :sub_account, :amount_in, :amount_out, :accumulated, :code, :transaction_content, :reference_number, :body)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':gateway' => $gateway,
        ':transaction_date' => $transaction_date,
        ':account_number' => $account_number,
        ':sub_account' => $sub_account,
        ':amount_in' => $amount_in,
        ':amount_out' => $amount_out,
        ':accumulated' => $accumulated,
        ':code' => $code,
        ':transaction_content' => $transaction_content,
        ':reference_number' => $reference_number,
        ':body' => $body
    ]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Failed to insert transaction: ' . $e->getMessage()]);
    die();
}

// Tách mã đơn hàng
$regex = '/DH(\d+)/';
preg_match($regex, $transaction_content, $matches);
$pay_order_id = $matches[1] ?? null;

if (!is_numeric($pay_order_id)) {
    echo json_encode(['success' => false, 'message' => 'Order not found. Order_id ' . $pay_order_id]);
    die();
}

// Kiểm tra đơn hàng
try {
    $stmt = $pdo->prepare("INSERT INTO bill (id, finalAmount, payment_status) VALUES (:id, :finalAmount, :payment_status)");
    $stmt->execute([
        ':id' => $pay_order_id,
        ':finalAmount' => $amount_in,
        ':payment_status' => 'paid'
    ]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo json_encode(['success' => false, 'message' => 'Order not found. Order_id ' . $pay_order_id]);
        die();
    }

    // Cập nhật trạng thái đơn hàng

    echo json_encode(['success' => true, 'message' => 'Payment status updated successfully.']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}

?>
