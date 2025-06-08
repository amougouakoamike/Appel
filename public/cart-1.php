<?php
 session_start();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- css link-->
    <link rel="stylesheet" href="style.css">
     <!-- Link Swiper's CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<!-- font awesome cnd link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
        <!--  header start-->
          <header class="heading">
            <a href="index.php" class="logo"><img src="iphone-1 (8).jpg" alt="" width="90px" ></a>
            <nav class="navbar" id-="navbar">
                <a href="index.php"  >Home</a>
                  <a href="#about"  >About</a>
                <a href="index.php">Iphone</a>
                <a href="mac-book.php">Mac Book</a> 
                <a href="hear-pot.php">Earpods</a> 
                <a href="cart-1.php" class="active"><i class="fas fa-shopping-cart"id="cart-item-counts" data-quantity="0"></i></a>
                <!-- <a href="sing-in-out.php" class="fas fa-user" id="sign-in-up"></a>  -->
                     
                  <?php
                  // Default profile image if user doesn't have one uploaded
                  $defaultProfileImage = 'assets/img/default-user.png';

                  // Assume $_SESSION['profile_image'] stores the user's image path after login
                  $userImage = isset($_SESSION['profile_image']) ? $_SESSION['profile_image'] : $defaultProfileImage;
                  ?>

                  <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                      <!-- User is logged in: show profile image -->
                      <a href="logout.php" id="sign-in-up" title="Logout">
                          <img src="logo-1 (1).jpeg"User" style="width: 55px; height: 55px; border-radius: 50%; object-fit: cover;">
                      </a>
                  <?php else: ?>
                      <!-- User not logged in: show default icon -->
                      <a href="sing-in-out.php" class="fas fa-user" id="sign-in-up" title="Sign In / Register"></a>
                  <?php endif; ?>
            </nav>
            <div class="icons"> 
                <i class="fas fa-bars"id="bars-menu"></i>
                     </div>
<!-- 
                     <div class="quantity">
                        <span class="minus">-</span>
                        <span class="count-number">1</span>
                        <span class="plus">+</span>
                      </div> -->
          </header>


 <!---- cart section   start-->
 <section class="cart-container container">
    <a href="index.php" class="back-homepage">
        <i class="fa-solid fa-chevron-left"></i>
        <span>Back To Home</span>
    </a>
    <h2 class="cart-title">Shopping Cart</h2>
    <div class="cart-box">
      <div class="cart-data">
        <div id="cartItems">
<!-- 
          <div class="cart-item item">
            <input type="text" class="username" name="username" placeholder="enter your name">
            <img src="iphone-1 (14).jpg"  class="image" alt="" width="200px">
            <div class="cart-item info">
              <h2 class="cart-item-title name"></h2>
              <input class="cart-item-quantity quantity" type="number"
               min="1" value="" name="" data-id="">
          </div>
          <h2 class="cart-item-price price">$200</h2>
          <button class="remove-from-cart" data-id="">Remove</button>
        </div> -->
        </div>
      </div>
      <div class="cart-t">
      <div id="cartTotal"></div>
      <a href="#" class="checkout-btn">Place Order</a>
    </div>
    </div>
 </section>
 
















   <!-- Swiper JS -->
   <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- js  link-->
     <script src="main.js"></script>
      <script src="cart.js"></script>
</body>
</html>
