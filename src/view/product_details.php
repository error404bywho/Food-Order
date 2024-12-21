<?php session_start();?>

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

     <?php include_once 'header-login.php' ?>


    <main>
        <article>

            <div class="link-wrapper">
                <a href="" class="link">home</a>
                <a href="" class="link">product</a>
                <a href="" class="link">Seafood 1</a>
            </div>

           <!--
           - #PRODUCT 
           -->

           <section class="section product">
            <div class="container">
                <figure class="product-image">
                    <img src="../../assets/images/food-menu-1.png" 
                    width="400" height="400" loading="lazy" class="w-100" alt="">
                </figure>
                <div class="product-content">
                    <h2 class="product-title">
                        Seafood 1
                    </h2>
                    <div class="price-wrapper">
                        <p class="price-text">Price</p>

                        <data value="12.00" class="price">12.00$</data>

                        <del class="del">18.00$</del>
                    </div>
                    <p class="product-text">
                        Shrimp, crab, lobster, clams, mussels, scallops, squid, 
                        fish fillets, corn, potatoes, garlic, onions, parsley, lemon, 
                        and a mix of seasonings like Old Bay, garlic butter, paprika, 
                        and chili powder.
                    </p>
                    <div class="product-quantity">
                        <button id="decrease">
                            <ion-icon name="remove-outline"></ion-icon>
                        </button>

                        <span id="quantity">1</span>

                        <button id="increase">
                            <ion-icon name="add-outline"></ion-icon>
                        </button>
                    </div>
                    <button class="btn btn-fill">Order Now</button>
                </div>
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