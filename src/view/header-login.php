
<header class="header" data-header>

<div class="top-bar">
    <div class="container">
        <p>Free shiping for all order above 50$</p>
    </div>
</div>

<div class="nav-wrapper" >
    <div class="container">
        <h1 class="h1">
            <a href="./index.php" class="logo">M<span class="span">EAT</span></a>
            <a href="./index.php" class="logo">EAT<span class="span">ER</span></a>
        </h1>
        <div class="menu-wrapper">
            <button class="nav-open-btn" aria-label="Open Menu" data-nav-toggle-btn>
                <ion-icon class="menu-icon" name="menu-outline"></ion-icon>
                <ion-icon class="close-icon" name="close-outline"></ion-icon>
            </button>
        <nav class="navbar" data-navbar>
            <ul class="navbar-list">
                <li>
                    <a href="./index.php" class="navbar-link">Home</a>
                </li>
                <li>
                    <a href="./product.php" class="navbar-link">Products</a>
                </li>
                <li>
                    <a href="#footer" class="navbar-link">About</a>
                </li>
                <li>
                    <a href="#footer" class="navbar-link">Contact</a>
                </li>

            </ul>
            <div class="login-wrapper">
            <a href="sign_in.php" class="signup-btn btn btn-fill">Sign up</a>   
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
                                <img src="../../assets/images/food-menu-1.png" width="46" height="46" loading="lazy" alt="thumbnail_food">
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
                <a href="./cart.php" class="panel-btn btn btn-fill">View Cart</a>
            </div> 
        </div>
    </div>
    </div>
</div>

</header>