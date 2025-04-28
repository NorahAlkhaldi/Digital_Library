<?php
require_once('header.php');
?>

<link rel="stylesheet" href="style.css">
<style>
  .fixed-top{
    background-color: #37517e!important;
  }
</style>
<div class="form_signup">
  <form method="post" action="backend/access.php">
    <div class="form-group">
      <label>User Name</label>
      <input type="text" name="username" class="input_form" placeholder="User Name" required>
    </div>
    <br>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" name="email" class="input_form" placeholder="Email Address" required>
    </div>
    <br>
    <div class="form-group">
      <label for="exampleInputEmail1">Phone</label>
      <input type="text" name="phone" class="input_form" placeholder="Phone Number" required>
    </div>
    <br>
    <div class="form-group">
      <label for="exampleInputEmail1">Password</label>
      <input type="password" name="password" class="input_form" placeholder="Password" required>
    </div>
    <br>
    <button type="submit" name="signup" class="btn_signup">Register Now</button><br>
    <span>Already Register? <a href="login.php">Login</a></span>
  </form>
</div>
<div class="signup">
    <img src="img/10.png" class="signup_image" alt="">
</div>
