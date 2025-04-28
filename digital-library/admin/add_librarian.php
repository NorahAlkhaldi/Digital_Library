<?php
require_once('header.php');
?>

<link rel="stylesheet" href="../style.css">
<style>
  .navbar-dark{
    background-color: #f5f5f8!important;
  }
  .navbar-dark .navbar-nav .nav-link{
    color:black!important;
  }
</style>
<style>
  .fixed-top{
    background-color: #37517e!important;
  }
</style>
<div class="form_signup" style="right:30%">
  <h2 class="text-center">Add Librarian</h2>
  <hr>
  <form method="post" action="../backend/access.php">
    <div class="form-group">
      <label>Librarian Name</label>
      <input type="text" name="username" class="input_form" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Librarian Email</label>
      <input type="email" name="email" class="input_form" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Librarian Phone</label>
      <input type="text" name="phone" class="input_form" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Librarian Password</label>
      <input type="password" name="password" class="input_form" required>
    </div>
    
    <button type="submit" class="btn_signup" name="add_librarian">Add Librarian</button><br>
  </form>
</div>

