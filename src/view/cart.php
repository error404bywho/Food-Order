<?php session_start();?>
<?php
include_once '../model/Product.php';
include_once '../model/Category.php';
include_once '../model/Bill.php';
include_once '../controller/inc/function_products.php';
include_once '../controller/inc/function_cart.php';
include_once '../controller/inc/conn.php';
?>

<?php
 /*---------------------------EDIT THIS-------------------------------------- */
 $category  = new Category("5","chicken","assets/images/chicken/chicken.png",1);
    
 $product_1 = new product("1","Chicken wings","assets/img/product/chicken/chicken_wings.png","3000",1132005,2,5,
 "A delicious and crispy fried chicken served with special dipping sauces, perfect for a quick meal.",$category,);

 $products = [$product_1,$product_1]; //trong giỏ hàng có 2 sản phẩm, mỗi sản phẩm có số lượng là 2
 $VoucherCode = 0;       // giảm 10% (voucher t tự cho)
 $VoucherId = Get_voucher_id_by_code($VoucherCode);//lấy ra id voucher từ code voucher
 $discount = Get_voucher_discount_by_Code($VoucherCode);//lấy ra discount từ code voucher
 $_SESSION['VoucherId'] = $VoucherId;
 $products_in_cart = $products;  //dùng tạm biến $products_in_cart danh sách sp được thêm vào giỏ hàng 
/*---------------------------EDIT THIS-------------------------------------- */
$total = 0;

for($i = 0;$i<count($products_in_cart);$i++){
    $total += $products_in_cart[$i]->Get_Price() * $products_in_cart[$i]->get_Quantity() ;
}
if(isset($_GET['id'])) $order_id =$_GET['id']; else  $order_id =000000;//id cart 
$totalAmount = $total;                   $_SESSION['totalAmount'] = $totalAmount;
$content = "bill";
$discountAmount = $total*$discount;      $_SESSION['discountAmount'] = $discountAmount;
$FinalAmount = $total - $total*$discount;$_SESSION['FinalAmount'] = $FinalAmount;
$Email = $_SESSION['email'];
$Address = '';
$Phone = '';
$idUser = $_SESSION['session_id'];
$idVoucher = $VoucherId;
$bill = new Bill($order_id,$Email,$Address,$Phone,$content,$totalAmount,$discountAmount,$FinalAmount,$idUser,$idVoucher,null,null);
$blabla = Create_Bill_with_QR($bill);
if(isset($_GET['buy'])){
    $Address_new = $_GET['Address'];
    $Phone_new = $_GET['Phone'];
    $bill->Set_Address($Address_new);
    $bill->Set_Phone($Phone_new);
    $check = Create_Bill($bill);
    if($check === 1){
        unset($_GET['buy']);
    // echo $bill->__toString();
    echo "pay successfully";
    }else
    echo "insert bill failed : errror code : " . $check;
    
}
?>
<!-- ================================================================ -->

<!DOCTYPE html>
<html lang="en">
    <head>
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MEATEATER</title>
        <!-- 
         - Favicon
        -->
        <link rel="icon" href="../../assets/images/favicon.ico" type="image/svg+xml">
        <!-- 
         - Custom css link
         -->
         <link rel="stylesheet" href="../../assets/css/main.css">
         <link rel="stylesheet" href="../../assets/css/home.css">
         <link rel="stylesheet" href="../../assets/css/cart.css">
        <!--
         - Google font link 
         -->
         <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&family=Roboto:wght@400;500;700&display=swap"
      rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>
<body>

     <!-- 
     - #HEADER
     -->

     <?php include 'header-user.php' ?>


    <main>
        <article>

           <!--
           - #SHOPING CART
           -->

           <section class="section shopping-cart">
            <div class="container">
                <h1 class="heading">
                    <ion-icon name="cart-outline"></ion-icon> Shopping Cart
                </h1>

                <div class="section-wrapper">

                <!-- Cart -->

                <div class="cart">

                    <div class="cart-item-box">

                        <h2 class="section-heading">Order Summary</h2>

                        <ul class="product-list">

                            <li class="product-item">

                                <figure class="item-banner">
                                    <img src="" width="80" alt="">
                                </figure>

                                <div class="detail">

                                    <h3 class="item-title">Seafood 1</h4>

                                    <div class="wrapper">

                                        <div class="product-quantity">
                                            <button id="decrease">
                                                <ion-icon name="remove-outline"></ion-icon>
                                            </button>

                                            <span id="quantity">1</span>

                                            <button id="increase">
                                                <ion-icon name="add-outline"></ion-icon>
                                            </button>
                                        </div>

                                        <div class="product-price">
                                            $<span id="price">1.25</span>
                                        </div>
                                    </div>
                                </div>

                                <button class="item-remove-btn">
                                    <ion-icon name="close-outline"></ion-icon>
                                </button>
                            </li>

                            <li class="product-item">

                                <figure class="item-banner">
                                    <img src="../../assets/images/food-menu-1.png" width="80" alt="">
                                </figure>

                                <div class="detail">

                                    <h3 class="item-title">Seafood 1</h4>

                                    <div class="wrapper">

                                        <div class="product-quantity">
                                            <button id="decrease">
                                                <ion-icon name="remove-outline"></ion-icon>
                                            </button>

                                            <span id="quantity">1</span>

                                            <button id="increase">
                                                <ion-icon name="add-outline"></ion-icon>
                                            </button>
                                        </div>

                                        <div class="product-price">
                                            $<span id="price">1.25</span>
                                        </div>
                                    </div>
                                </div>

                                <button class="item-remove-btn">
                                    <ion-icon name="close-outline"></ion-icon>
                                </button>
                            </li>

                            <li class="product-item">

                                <figure class="item-banner">
                                    <img src="../../assets/images/food-menu-1.png" width="80" alt="">
                                </figure>

                                <div class="detail">

                                    <h3 class="item-title">Seafood 1</h4>

                                    <div class="wrapper">

                                        <div class="product-quantity">
                                            <button id="decrease">
                                                <ion-icon name="remove-outline"></ion-icon>
                                            </button>

                                            <span id="quantity">1</span>

                                            <button id="increase">
                                                <ion-icon name="add-outline"></ion-icon>
                                            </button>
                                        </div>

                                        <div class="product-price">
                                            $<span id="price">1.25</span>
                                        </div>
                                    </div>
                                </div>

                                <button class="item-remove-btn">
                                    <ion-icon name="close-outline"></ion-icon>
                                </button>
                            </li>
                        </ul>

                    </div>

                    <div class="total-wrapper">

                        <div class="discount-token">
                             
                            <label for="token" class="label-default">Gift card/Discount
                                code
                            </label>

                            <div class="discount-wrapper">
                                <input type="text" name="discount-token" class="input-field">
                                <button class="btn btn-fill">Apply</button>
                            </div>
                        </div>

                        <div class="amount-wrapper">

                            <div class="amount">
                                <span>Subtotal</span>$<span id="subtotal">2.05</span>
                            </div>

                            <div class="amount">
                                <span>Tax</span>$<span id="tax">0.35</span>
                            </div>

                            <div class="amount">
                                <span>Shipping</span>$<span id="shipping">2.05</span>
                            </div>

                            <div class="amount total">
                                <span>Total</span>$<span id="total">2.05</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Check out -->
    
                <div class="section checkout">

                    <h2 class="section-heading">Payment Details</h2>

                    <div class="payment-form">

                        <div class="payment-method">
                            
                            <button class="method" data-tab-btn="card">
                                <ion-icon name="card"></ion-icon>
                                <span class="span">Credit Card</span>
                                <ion-icon class="checkmark" name="checkmark-circle-outline" data-checkmark-circle></ion-icon>
                            </button>
                            <button class="method" data-tab-btn="qr"> 
                                <ion-icon name="qr-code"></ion-icon>
                                <span class="span">QR Code</span>
                                <ion-icon class="checkmark" name="checkmark-circle-outline" data-checkmark-circle></ion-icon>
                            </button>
                            <button class="method" data-tab-btn="COD">
                                <ion-icon name="wallet"></ion-icon>
                                <span class="span">COD</span>
                                <ion-icon class="checkmark" name="checkmark-circle-outline" data-checkmark-circle></ion-icon>
                            </button>

                        </div>

                        <form class="credit-card payment-tab" action="#" data-payment-tab="card">

                            <div class="cardholder-name">
                                <label for="cardholder-name" class="label-default">Cardholder Name</label>
                                <input type="text" class="input-field" required placeholder="Cardholder Name"
                                 name="cardholder-name">
                            </div>

                            <div class="card-number">
                                <label for="card-number" class="label-default">Card Number</label>
                                <input type="number" class="input-field" required placeholder="Card Number"
                                 name="card-number">
                            </div>

                            <div class="input-wrapper">

                                <div class="expire-date">
                                    <label for="expire-date" class="label-default">Expiration date</label>

                                    <div class="input-flex">

                                        <input type="number" required min="1" name="day" 
                                        max="31" placeholder="31" class="input-field">
                                        /
                                        <input type="number" required min="1" name="month" 
                                        max="12" placeholder="12" class="input-field">

                                    </div>
                                </div>

                                <div class="cvv">
                                    <label for="cvv" class="label-default">CVV</label>
                                    <input type="number" required name="cvv"
                                    class="input-field">
                                </div>
                            </div>

                            <button class="btn btn-fill">
                                <b>Pay</b>$<span class="pay-amount">5.81</span>
                            </button>

                        </form>
<!-- =====================CHECKOUT_BOX================================ -->
                        <form action="#" class="qr payment-tab" id="checkout-box" data-payment-tab="qr">
                            <figure class="qr-img-wrapper">
                               <?php 
                               echo ' <img src="https://qr.sepay.vn/img?bank=MBBank&acc=0905376235&template=compact&amount='.$FinalAmount.'&des=DH'.$order_id.'" alt="" width="60"';
                               ?>
                               
                                height="60" class="qr-img w-100">
                                <button class="qr-btn btn">
                                    <ion-icon name="download-outline"></ion-icon>
                                        Tải ảnh QR
                                    </button>
                            </figure>

                            <div class="qr-code-content">
                                <span class="section-subtitle">
                               Vui lòng giữ nguyên nội dung chuyển khoản DH<?php echo $order_id; ?> để hệ thống tự động xác nhận thanh toán
                                
                            </span>
                                <ul class="qr-wrapper">

<li class="qr-item">
    <h3 class="qr-title">Chủ tài khoản</h3>
    <h3 class="qr-text">Lê Đình Vũ</h3>
</li>
<hr> <!-- Gạch ngang -->

<li class="qr-item">
    <h3 class="qr-title">Số Tài Khoản</h3>
    <h3 class="qr-text">0905376235</h3>
</li>
<hr> <!-- Gạch ngang -->

<li class="qr-item">
    <h3 class="qr-title">Số tiền</h3>
    <?php echo '<h3 class="qr-text">'.formatNumber($FinalAmount).' VNĐ</h3>'; ?>
</li>
<hr> <!-- Gạch ngang -->

<li class="qr-item">
    <h3 class="qr-title">Nội dung chuyển khoản</h3>
    <?php echo '<h3 class="qr-text">DH'.$order_id.'</h3>'; ?>
</li>
<span class="section-subtitle">
Bạn có thể thanh toán và sau khi thanh toán xong có thể liên hệ mình để nhận lại qua zalo: 0764524805 - Vu Le
Cảm ơn bạn đã sử dụng dịch vụ.
                                
</span>


</ul>

                            </div>
                        </form>
<!-- =====================SUCCESS_PAY_BOX=================================== -->
<!-- <h1 style="color: GREEN; display: none;" id="success_pay_box">SUCCESS PAID! HAVE A GOOD MEAL</h1> -->

<!-- =====================SCRIPT AJAX======================================= -->
      <?php
        // Nếu đang ở giao diện checkout
      if(isset($order_id)) {?>
      <script>
      var pay_status = 'Unpaid';
      
      // Hàm kiểm tra trạng thái đơn hàng
      // Sử dụng Ajax để lấy trạng thái đơn hàng. Nếu thanh toán thành công thì hiển thị Box đã thanh toán thành công, ẩn box checkout
      function check_payment_status() {
          if(pay_status == 'Unpaid') {
               $.ajax({ 
                    type: "POST",
                    data: {order_id: <?= $order_id;?>},
                    url: "https://f494-2a09-bac5-d5cb-e6-00-17-358.ngrok-free.app/HOC_TAP/YEAR_2/DAW/src/view/check_payment_status.php",
                    dataType:"json",
                    success: function(data){
                        if(data.payment_status == "paid") {
                            document.querySelector('[data-payment-tab="qr"]').classList.remove('active');
                            console.log("da hoat dong");
                            document.querySelector('[data-payment-notification]').classList.add('active');
                            // $("#checkout_box").hide();
                            pay_status = 'Paid';
                        }
                    }
                  });
              }
          }
        //Kiểm tra trạng thái đơn hàng 1 giây một lần
        setInterval(check_payment_status, 1000);
      </script>
      <?php } ?>
                        <form action="" class="COD payment-tab" id= id="success_pay_box" data-payment-tab="COD" method="GET">

                            <div class="address">
                                <label for="address" name="address" id="address" class="label-default">Address</label>
                                <input type="text" class="input-field" required placeholder="Address"
                                 name="Address" value="">
                            </div>

                            <div class="phone">
                                <label for="phone" name="phone" class="label-default">Phone Number</label>
                                <input type="number" class="input-field" required placeholder="Phone Number"
                                 name="Phone">
                            </div>
                        
                           
                            <button type="submit" name="buy" class="btn btn-fill">
                                <span class="pay-amount">Submit</span>
                            </button>

                        </form>

                        <form action="" class="qr-success-notification " id="success_pay_box" data-payment-notification>
                            <ion-icon class="qr-success" name="checkmark-circle"></ion-icon>

                            <h2 class="qr-success-title">Thanh toán thành công</h2>

                            <?php echo '<p class="qr-text">mã số đơn hàng của bạn là '.$order_id.'</p>' ?>

                            <p class="qr-text">Cảm ơn bạn đã dùng thử web mình :></p>

                            <button class="btn btn-fill">Tiếp tục mua hàng</button>
                        </form>





                    </div>
                </div>


                </div>

            </div>
           </section>



            <!-- 
            - #FOOTER
            -->

            <?php include 'footer.php' ?>

            <!-- 
            - #BACK TO TOP
            -->

            <a href="#top" class="back-top-btn active" aria-label="Back to top" data-back-top-btn>
                <ion-icon name="chevron-up"></ion-icon>
            </a>


        </article>
    </main>


     <!-- 
     - Custom JS link
     -->
     <script src="../../assets/js/script.js"></script>

     <!--
     - Ionicon Link
     -->
     <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    
    
</body>
</html>