<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appels Store</title>
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
                <a href="index.php">Home</a>
                  <a href="index.php"  >About</a>
                <a href="index.php">Iphone</a>
                <a href="mac-book.php">Mac Book</a> 
                <a href="hear-pot.php" class="active" >EarPods</a> 
                <a href="cart-1.php" ><i class="fas fa-shopping-cart" id="cart-item-counts" data-quantity="0"></i></a>
               
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
          </header>


            <!---- EARPOD section   start-->
<section class="products container" id="iphone">
    <!-- Heading-->
     <h2 class="headings">Discover Product</h2>
     <!-- Products container -->
      <div class="product-container" id="productList">
        
        <!-- <div class="product">
          <img src="iphone (18).jpg" alt="">
          <div class="product-info">
            <h2 class="product-title"> MAC BOOK AIR </h2>
            <p class="product-price">$200</p>
            <a class="add-to-cart">Add to cart</a>
          </div>
        </div>  -->

      </div>

</section>
 <!---- earpod section   end-->

        
 <!-- Footer Start -->
 <div class="footer" id="footer">
    <div class="footer-c container">
      <div class="footer-box">
        <h2>Appel-Store</h2>
        <div class="social">
          <a href="https://www.google.com/" class="footer_social-link " ><i class="fa-brands fa-google"></i></a>
          <a href="https://www.facebook.com/login/" class="footer_social-link " ><i class="fa-brands fa-facebook"></i></a>
          <a href="https://github.com/"  class="footer_social-link "><i class="fa-brands fa-github"></i></a>
          <a href="https://www.linkedin.com/"class="footer_social-link "><i class="fa-brands fa-linkedin"></i></a>
        </div>
      </div>
      <div class="footer-box">
        <h3>Help</h3>
        <a href="#">Cantact Us</a>
        <a href="#">Faq</a>
        <a href="#">Shipment</a>
        <a href="#">payment</a>
        <a href="#">Track your Order</a>
        <a href="#">Return your Order</a>
      </div>
      <div class="footer-box">
        <h3>Legal Info</h3>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Condition</a>
        <a href="#">Return Policy</a>
        <a href="#">Comunity</a>
        <a href="#">Get Card</a>
      </div>
    </div>
    <p class="copyright">&#169 A.A Mike All rights Reserved </p>
   </div>
     <!-- Footer End -->
  
  
  
  
       
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
     <!-- Swiper JS -->
     <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
      <!-- js  link-->
       <script src="main.js"></script>
       <script src="cart.js"></script>
       <script src="earpot.js"></script>
  </body>
  </html>
    

