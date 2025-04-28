<?php
require_once('header.php');
?>

<link rel="stylesheet" href="style.css">
<style>
  .fixed-top{
    background-color: #37517e!important;
  }
</style>
<div class="form_signup" style="top: 28%;">
  <form method="post" action="backend/access.php">
    <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" class="input_form" placeholder="Email" required>
    </div>
    <br><br>
    <div class="form-group">
      <label for="exampleInputEmail1">Password</label>
      <input type="password" name="password" class="input_form" placeholder="Password" required>
    </div>
    <br>
    <button type="submit" name="login" class="btn_signup">Login</button><br>
    <span>Not register yet? <a href="signup.php">Registration</a></span>
  </form>
</div>
<div class="signup">
    <img src="img/10.png" class="signup_image" alt="">
</div>
