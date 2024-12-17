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

     <header class="header" data-header>

        <div class="top-bar">
            <div class="container">
                <p>Free shiping for all order above 50$</p>
            </div>
        </div>
        
        <div class="nav-wrapper" >
            <div class="container">
                <h1 class="h1">
                    <a href="./index.html" class="logo">M<span class="span">EAT</span></a>
                    <a href="./index.html" class="logo">EAT<span class="span">ER</span></a>
                </h1>
                <div class="menu-wrapper">
                    <button class="nav-open-btn" aria-label="Open Menu" data-nav-toggle-btn>
                        <ion-icon class="menu-icon" name="menu-outline"></ion-icon>
                        <ion-icon class="close-icon" name="close-outline"></ion-icon>
                    </button>
                <nav class="navbar" data-navbar>
                    <ul class="navbar-list">
                        <li>
                            <a href="./index.html" class="navbar-link active">Home</a>
                        </li>
                        <li>
                            <a href="./index.html" class="navbar-link">About</a>
                        </li>
                        <li>
                            <a href="./index.html" class="navbar-link">Shop</a>
                        </li>
                        <li>
                            <a href="./index.html" class="navbar-link">Blog</a>
                        </li>
                        <li>
                            <a href="./index.html" class="navbar-link">Products</a>
                        </li>
                        <li>
                            <a href="./index.html" class="navbar-link">Contact</a>
                        </li>
                    </ul>
                    <div class="navbar-wrapper">
                        <a href="sign_in.php" class="btn btn-fill">Login</a>
                    </div>
                </nav>
                </div>

            <div class="header-action">

                <div class="search-wrapper" data-search-wrapper>
                    <button class="header-action-btn" data-search-btn>
                        <ion-icon name="search-outline" class="search-icon"></ion-icon>
                    </button>

                    <div class="input-wrapper">
                        <input type="search" name="search" placeholder="Search here" class="search-input">

                        <button class="search-submit" aria-label="Submit search">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>
                    </div>
                </div>
                <div class="whishlist-wrapper">
                    <button class="header-action-btn whishlist" aria-label="Open whishlist" data-panel-btn="whishlist">
                        <ion-icon class="heart-outline" name="heart-outline"></ion-icon>
                        <ion-icon class="heart" name="heart"></ion-icon>
                        <data value="3" class="btn-badge">03</data>
                    </button>
                    <div class="side-panel whishlist" data-side-panel="whishlist">
                        <ul class="panel-list">
                            <li class="panel-item">
                                <a href="./product-details.html" class="panel-card">
                                    <figure class="item-banner">
                                        <img src="../../assets/images/food-menu-1.png" width="46" height="46" loading="lazy" alt="seafood 1">
                                    </figure>
            
                                    <div>
                                        <p class="item-title">Seafood 1</p>
                                        <span class="item-value">12$</span>
                                        <span class="item-amount">x1</span>
                                    </div>
                                </a>
                                <button class="item-remove-btn">
                                    <ion-icon name="close-outline"></ion-icon>
                                </button>
                            </li>
                            <li class="panel-item">
                                <a href="./product-details.html" class="panel-card">
                                    <figure class="item-banner">
                                        <img src="../../assets/images/food-menu-2.png" width="46" height="46" loading="lazy" alt="meat 1">
                                    </figure>
            
                                    <div>
                                        <p class="item-title">Meat 1</p>
                                        <span class="item-value">10$</span>
                                        <span class="item-amount">x1</span>
                                    </div>
                                </a>
                                <button class="item-remove-btn">
                                    <ion-icon name="close-outline"></ion-icon>
                                </button>
                            </li>
                            <li class="panel-item">
                                <a href="./product-details.html" class="panel-card">
                                    <figure class="item-banner">
                                        <img src="../../assets/images/food-menu-3.png" width="46" height="46" loading="lazy" alt="fried chicken 1">
                                    </figure>
            
                                    <div>
                                        <p class="item-title">Fried Chicken 1</p>
                                        <span class="item-value">9.3$</span>
                                        <span class="item-amount">x1</span>
                                    </div>
                                </a>
                                <button class="item-remove-btn">
                                    <ion-icon name="close-outline"></ion-icon>
                                </button>
                            </li>
                        </ul>
                        <div class="subtotal">
                            <p class="subtotal-text">Subtotal:</p>
                            <data value="696" class="subtotal-value">
                                696$
                            </data>
                        </div>
                        <a href="./whishlist.html" class="panel-btn btn btn-fill">View Whishlist</a>
                    </div>
                </div>
                <div class="cart-wrapper">
                    <button class="header-action-btn cart" aria-label="Open shopping cart" data-panel-btn="cart">
                        <ion-icon class="basket-outline" name="basket-outline"></ion-icon>
                        <ion-icon class="basket" name="basket"></ion-icon>
    
                        <data value="2" class="btn-badge">02</data>
                    </button>
                    <div class="side-panel cart" data-side-panel="cart">
                        <ul class="panel-list">
                            <li class="panel-item">
                                <a href="./product-details.html" class="panel-card">
                                    <figure class="item-banner">
                                        <img src="../../assets/images/food-menu-1.png" width="46" height="46" loading="lazy" alt="seafood 1">
                                    </figure>
            
                                    <div>
                                        <p class="item-title">Seafood 1</p>
                                        <span class="item-value">12$</span>
                                        <span class="item-amount">x1</span>
                                    </div>
                                </a>
                                <button class="item-remove-btn">
                                    <ion-icon name="close-outline"></ion-icon>
                                </button>
                            </li>
                            <li class="panel-item">
                                <a href="./product-details.html" class="panel-card">
                                    <figure class="item-banner">
                                        <img src="../../assets/images/food-menu-2.png" width="46" height="46" loading="lazy" alt="meat 1">
                                    </figure>
            
                                    <div>
                                        <p class="item-title">Meat 1</p>
                                        <span class="item-value">10$</span>
                                        <span class="item-amount">x1</span>
                                    </div>
                                </a>
                                <button class="item-remove-btn">
                                    <ion-icon name="close-outline"></ion-icon>
                                </button>
                            </li>
                            <li class="panel-item">
                                <a href="./product-details.html" class="panel-card">
                                    <figure class="item-banner">
                                        <img src="../../assets/images/food-menu-3.png" width="46" height="46" loading="lazy" alt="fried chicken 1">
                                    </figure>
            
                                    <div>
                                        <p class="item-title">Fried Chicken 1</p>
                                        <span class="item-value">9.3$</span>
                                        <span class="item-amount">x1</span>
                                    </div>
                                </a>
                                <button class="item-remove-btn">
                                    <ion-icon name="close-outline"></ion-icon>
                                </button>
                            </li>
                        </ul>
                        <div class="subtotal">
                            <p class="subtotal-text">Subtotal:</p>
                            <data value="696" class="subtotal-value">
                                696$
                            </data>
                        </div>
                        <a href="./cart.html" class="panel-btn btn btn-fill">View Cart</a>
                    </div> 
                </div>
            </div>
            </div>
        </div>

    </header>


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
//                         for($i=0;$i<100;$i++){
//                             echo '
//                             <li class="food-menu-card">
//                                 <div class="card-banner">
//                                     <img src="../../assets/images/food-menu-1.png" width="300" height="300"
//                                     loading="lazy" class="w-100" alt="">
//                                     <div class="badge"> -15%</div>
// <a href="test.php?id='.$i.'"><button class="btn btn-fill food-menu-btn">Order Now</button></a>
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
//                                 <h3 class="h3 card-title">Fried Chicken Unlimited '.$i.'</h3>
//                                 <div class="price-wrapper">
//                                     <p class="price-text">Price</p>
//                                     <data value="12.00" class="price">12.00$</data>
//                                     <del class="del">18.00$</del>
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

                                <data value="12.00" class="price">12.00$</data>

                                <del class="del">18.00$</del>
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

                                <data value="12.00" class="price">12.00$</data>

                                <del class="del">18.00$</del>
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

                                <data value="12.00" class="price">12.00$</data>

                                <del class="del">18.00$</del>
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

                                <data value="12.00" class="price">12.00$</data>

                                <del class="del">18.00$</del>
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

                                <data value="12.00" class="price">12.00$</data>

                                <del class="del">18.00$</del>
                            </div>
                        </li>

                    </ul>
                </div>
             </section>

            <!-- 
            - #FOOTER
            -->

            <footer class="footer">

                <div class="footer-top" style="background-image: url('../../assets/images/footer-illustration.png');">

                    <div class="container">

                        <div class="footer-brand">
                            <a href="#" class="logo">M<span class="span">EAT</span></a>
                            <a href="#" class="logo">EAT<span class="span">ER</span></a>
    
                            <p class="footer-text">
                                Financial experts support or help you to to find out which way you can raise your funds more.
                            </p>
    
                            <ul class="social-list">
                                
                                <li>
                                    <a href="#" class="social-link">
                                        <ion-icon name="logo-facebook"></ion-icon>
                                    </a>
                                </li>
    
                                <li>
                                    <a href="#" class="social-link">
                                        <ion-icon name="logo-twitter"></ion-icon>
                                    </a>
                                </li>
    
                                <li>
                                    <a href="#" class="social-link">
                                        <ion-icon name="logo-instagram"></ion-icon>
                                    </a>
                                </li>
    
                                <li>
                                    <a href="#" class="social-link">
                                        <ion-icon name="logo-pinterest"></ion-icon>
                                    </a>
                                </li>
    
                            </ul>

                        </div>

                        <ul class="footer-list">
    
                            <li>
                                <p class="footer-list-title">Contact Info</p>
                            </li>

                            <li>
                                <p class="footer-list-item">+1 (062) 109-9222</p>
                            </li>

                            <li>
                                <p class="footer-list-item">baolhn.23ns@vku.udn.vn</p>
                            </li>

                            <li>
                                <address class="footer-list-item">
                                    Số 88, Đường Hải Vân Thượng, Phường Hòa Minh, Quận Liên Chiểu, Đà Nẵng.
                                </address>
                            </li>
                        </ul>

                        <ul class="footer-list">

                            <li>
                                <p class="footer-list-title">Opening Hours</p>
                            </li>

                            <li>
                                <p class="footer-list-item">Monday-Friday: 08:00-22:00</p>
                            </li>

                            <li>
                                <p class="footer-list-item">Tuesday 4PM: Till Mid Night</p>
                            </li>

                            <li>
                                <p class="footer-list-item">Saturday: 10:00-16:00</p>
                            </li>
                        </ul>

                        <form action="" class="footer-form">

                            <p class="footer-list-title">Book a Table</p>

                            <div class="input-wrapper">

                                <input type="text" name="full_name" 
                                required placeholder="Your Name" aria-label="Your Name"
                                 class="input-field">

                                 <input type="email" name="email address" 
                                 required placeholder="Email" aria-label="Email"
                                  class="input-field">

                            </div>

                            <div class="input-wrapper">
                                <select name="total_person" aria-label="Total person" class="input-field">
                                    <option value="person">Person</option>
                                    <option value="2 person">2 Person</option>
                                    <option value="3 person">3 Person</option>
                                    <option value="4 person">4 Person</option>
                                    <option value="5 person">5 Person</option>
                                </select>

                                <input type="date" name="booking_date" aria-label="Reservation date"
                                 required class="input-field">

                            </div>

                            <textarea name="message" aria-label="Message" placeholder="Message" class="input-field"></textarea>

                            <button type="submit" class="btn btn-fill">Book a Table</button>

                        </form>

                    </div>
                </div>

                <div class="footer-bottom">
                    <div class="container">
                        
                        <p class="copyright-text">
                            &copy; 2024 <a href="#" class="copyright-link">BVH</a> All Rights Reserved.
                        </p>
                    </div>
                </div>
            </footer>

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