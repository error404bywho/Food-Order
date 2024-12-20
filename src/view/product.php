<?php session_start();?>

<?php
include_once '../model/Product.php';
include_once '../controller/inc/function_products.php';
?>

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
        <!--
         - Google font link 
         -->
         <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&family=Roboto:wght@400;500;700&display=swap"
      rel="stylesheet">
    </head>
<body>

     <!-- 
     - #HEADER
     -->

     <?php include_once 'header.php' ?>
    <main>
        <article>

             <!-- 
             - #FOOD MENU
             -->

             <section class="section food-menu">
                <div class="container">

                    <p class="section-subtitle">Popular Dishes</p>

                    <h2 class="h2 section-title">
                        Our Delicious <span class="span">Foods</span>
                    </h2>

                    <p class="section-text">
                        Food is any substance consumed to provide nutritional support for an organism.
                    </p>

                    <ul class="filter-list">

                        <li>
                            <button class="filter-btn active">All</button>
                        </li>

                        <li>
                            <button class="filter-btn">Pizza</button>
                        </li>

                        <li>
                            <button class="filter-btn">Burger</button>
                        </li>

                        <li>
                            <button class="filter-btn">Burrito</button>
                        </li>

                        <li>
                            <button class="filter-btn">Sandwich</button>
                        </li>

                    </ul>

                    <ul class="food-menu-list">

                        <?php
//                         for(VNĐi=0;VNĐi<100;VNĐi++){
//                                 echo '
//                             <li class="food-menu-card">
//                                 <div class="card-banner">
//                                     <img src="../../assets/images/food-menu-1.png" width="300" height="300"
//                                     loading="lazy" class="w-100" alt="">
//                                     <div class="badge"> -15%</div>
// <a href="test.php?id='.VNĐi.'"><button class="btn btn-fill food-menu-btn">Order Now</button></a>
//                                 </div>
//                                 <div class="wrapper">
//                                     <p class="category">Chicken</p>
//                                     <div class="rating-wrapper">
//                                         <ion-icon name="star"></ion-icon>
//                                         <ion-icon name="star"></ion-icon>
//                                         <ion-icon name="star"></ion-icon>
//                                         <ion-icon name="star"></ion-icon>
//                                         <ion-icon name="star"></ion-icon>
//                                     </div>
//                                 </div>
//                                 <h3 class="h3 card-title">Fried Chicken Unlimited '.VNĐi.'</h3>
//                                 <div class="price-wrapper">
//                                     <p class="price-text">Price</p>
//                                     <data value="12.00" class="price">12.00VNĐ</data>
//                                     <del class="del">18.00VNĐ</del>
//                                 </div>
//                             </li>
//                             ';
//                         }
                        ?>

                        <li class="food-menu-card">

                            <div class="card-banner">
                                <img src="../../assets/images/food-menu-2.png" width="300" height="300"
                                loading="lazy" class="w-100" alt="">

                                <div class="badge"> -10% </div>

                                <button class="btn btn-fill food-menu-btn">Order Now</button>
                            </div>
                            <div class="wrapper">
                                <p class="category">Burger</p>

                                <div class="rating-wrapper">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                </div>
                            </div>
                            <h3 class="h3 card-title">Burger King Whopper</h3>

                            <div class="price-wrapper">
                                <p class="price-text">Price</p>

                                <data value="12.00" class="price">12.00VNĐ</data>

                                <del class="del">18.00VNĐ</del>
                            </div>
                        </li>

                        <li class="food-menu-card">

                            <div class="card-banner">
                                <img src="../../assets/images/food-menu-3.png" width="300" height="300"
                                loading="lazy" class="w-100" alt="">

                                <div class="badge"> -25% </div>

                                <button class="btn btn-fill food-menu-btn">Order Now</button>
                            </div>
                            <div class="wrapper">
                                <p class="category">Pizza</p>

                                <div class="rating-wrapper">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                </div>
                            </div>
                            <h3 class="h3 card-title">White Castle Pizzas</h3>

                            <div class="price-wrapper">
                                <p class="price-text">Price</p>

                                <data value="12.00" class="price">12.00VNĐ</data>

                                <del class="del">18.00VNĐ</del>
                            </div>
                        </li>

                        <li class="food-menu-card">

                            <div class="card-banner">
                                <img src="../../assets/images/food-menu-4.png" width="300" height="300"
                                loading="lazy" class="w-100" alt="">

                                <div class="badge"> -20% </div>

                                <button class="btn btn-fill food-menu-btn">Order Now</button>
                            </div>
                            <div class="wrapper">
                                <p class="category">Burrito</p>

                                <div class="rating-wrapper">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                </div>
                            </div>
                            <h3 class="h3 card-title">Bell Burrito Supreme</h3>

                            <div class="price-wrapper">
                                <p class="price-text">Price</p>

                                <data value="12.00" class="price">12.00VNĐ</data>

                                <del class="del">18.00VNĐ</del>
                            </div>
                        </li>

                        <li class="food-menu-card">

                            <div class="card-banner">
                                <img src="../../assets/images/food-menu-5.png" width="300" height="300"
                                loading="lazy" class="w-100" alt="">

                                <div class="badge"> -5% </div>

                                <button class="btn btn-fill food-menu-btn">Order Now</button>
                            </div>
                            <div class="wrapper">
                                <p class="category">Chicken</p>

                                <div class="rating-wrapper">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                </div>
                            </div>
                            <h3 class="h3 card-title">Kung Pao Chicken BBQ</h3>

                            <div class="price-wrapper">
                                <p class="price-text">Price</p>

                                <data value="12.00" class="price">12.00VNĐ</data>

                                <del class="del">18.00VNĐ</del>
                            </div>
                        </li>

                        <li class="food-menu-card">

                            <div class="card-banner">
                                <img src="../../assets/images/food-menu-6.png" width="300" height="300"
                                loading="lazy" class="w-100" alt="">

                                <div class="badge"> -15% </div>

                                <button class="btn btn-fill food-menu-btn">Order Now</button>
                            </div>
                            <div class="wrapper">
                                <p class="category">Chicken</p>

                                <div class="rating-wrapper">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                </div>
                            </div>
                            <h3 class="h3 card-title">Wendy's Chicken</h3>

                            <div class="price-wrapper">
                                <p class="price-text">Price</p>

                                <data value="12.00" class="price">12.00VNĐ</data>

                                <del class="del">18.00VNĐ</del>
                            </div>
                        </li>
                        
<?php
$products =  Select_Product();
if(!empty($products)){
    foreach($products as $product){
        echo '<li class="food-menu-card">';
        echo '    <div class="card-banner">';
        // echo '        <img src="../../'.$product->Get_Image().'" width="300" height="300" loading="lazy" class="w-100" alt="">';
        echo '        <img src="../../assets/images/food-menu-1.png" width="300" height="300" loading="lazy" class="w-100" alt="">';
        /*
         if (is_object($product) && method_exists($product, 'Get_Image')) 
        echo '        <img src="../../'.$product->Get_Image().'" width="300" height="300" loading="lazy" class="w-100" alt="">';
        else 
        $imagePath = 'assets/images/default.png'; // Đường dẫn mặc định
        */
        echo '        <div class="badge"> -'.($product->Get_Voucher()*100).'% </div>';
        echo '        <a href="product_details.php"><button class="btn btn-fill food-menu-btn">detail</button></a>';
        echo '    </div>';
        echo '    <div class="wrapper">';
        echo '        <p class="category">'.$product->Get_Category()->Get_Name().'</p>';
        echo '        <div class="rating-wrapper">';
        $stars = $product->Get_Hot();
        for($i=0;$i<$stars;$i++)    {echo "<ion-icon name='star'></ion-icon>";}
        echo '        </div>';
        echo '    </div>';
        echo '    <h3 class="h3 card-title">'.$product->Get_Name().'</h3>';
        echo '    <div class="price-wrapper">';
        echo '        <p class="price-text">Price</p>';
        echo '        <data value="12.00" class="price">'.formatNumber(($product->Get_Price() - $product->Get_Price()*$product->Get_Voucher())).'VNĐ</data>';
        echo '        <del class="del">'.formatNumber($product->Get_Price()).'VNĐ</del>';
        echo '    </div>';
        echo '</li>';

    }
}   else {
    echo 'no products selected';
}

?>

                    </ul>
                </div>
             </section>

            <!-- 
            - #FOOTER
            -->

            <?php include_once 'footer.php' ?>

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