<?php
session_start(); // Put this at the very top of your HTML pagel
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Popup</title>
  <link rel="stylesheet" href="style5.css">
   <!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

         <!--  contact section start-->
         <section class="contact" id="contact">
            <h1 class="heading"> Logged-In </h1>
            <div class="contact-container">
              <div class="contact-box">
  
              <div class="form-box-login">
                <form action="place-order.php" method="POST" enctype="multipart/form-data"  onsubmit="return showAlert('Logged-in successfully...');">
                <h1>Login</h1>
                 <div class="input-box">
                 <input type="email" name="email" placeholder="username or Email" required> 
                 <i class="fas fa-user"></i>
                </div>
                <div class="input-box">
                  <input type="password" name="password"  placeholder="password" required>
                  <i class="fas fa-lock"></i> 
                 </div>
                   <select name="role" id="" required>
                  <option value="">--Select Role</option>
                  <option value="user">User</option>
                  <option value="admin">Admin</option>
                 </select><br><br><br>
                 <div class="forgot-link">
                  <a href="#">Forgot password?</a>
                 </div>
                 <button href="index.php" type="submit" name="logginBtn" class="btn-n">Login</button> 
                 <p>Or login with social platforms</p>
                 <div class="social-icons">
                  <a href="https://www.google.com/" class="footer_social-link " ><i class="fa-brands fa-google"></i></a>
                  <a href="https://www.facebook.com/login/" class="footer_social-link " ><i class="fa-brands fa-facebook"></i></a>
                  <a href="https://github.com/"  class="footer_social-link "><i class="fa-brands fa-github"></i></a>
                  <a href="https://www.linkedin.com/"class="footer_social-link "><i class="fa-brands fa-linkedin"></i></a>
                 </div>
                </form>
              </div>
              <div class="form-box-register">
                <form action="place-order.php" method="POST"  enctype="multipart/form-data"  onsubmit="return showAlert('Registered successfully...');">
                <h1>Registration</h1>
                <div class="input-box">
                 <input type="text" name="name" placeholder="username" required> 
                 <i class="fas fa-user"></i>
                </div>
                <div class="input-box">
                  <input type="email" name="email"  placeholder="Email" required> 
                  <i class="fa-solid fa-envelope"></i>
                 </div>
                 <select name="role" id="" required>
                  <option value="">--Select Role</option>
                  <option value="user">User</option>
                  <option value="admin">Admin</option>
                 </select>
                <div class="input-box">
                  <input type="password" name="password"  placeholder="password" required>
                  <i class="fas fa-lock"></i> 
                 </div>
                 <button href="index.php" type="submit" name="registerBtn" class="btn-n">Registration</button> 
                 <p>Or Register with social platforms</p>
                 <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-square-pinterest"></i></a>
                    <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-square-whatsapp"></i></a>
                    <a href="#"><i class="fa-brands fa-square-youtube"></i></a>
                 </div>
                </form>
              </div>
              <div class="toggle-box">
                <div class="toggle-panel toggle-left">
                  <h1>Hello, welcome!</h1>
                  <p>Don't have an account ?</p>
                  <button type="submit" class="register-btn-n">Register</button>
                </div>
                <div class="toggle-panel toggle-right">
                  <h1>Welcome Back!</h1>
                  <p>Already have an account ?</p>
                  <button type="submit" class="login-btn-n">Login</button>
                </div>
              </div>
          </div>
          </div>
          </section>   

<script src="https://www.gstatic.com/firebasejs/10.8.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/10.8.1/firebase-auth.js"></script>
  <script src="sign-in-out.js"></script>
</body>
</html>
