<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
require_once('header.php');
include_once("../backend/db.php");

$id = $_GET['id'];
$sql2 = "select * from users where id='$id'";
$resultset = mysqli_query($con, $sql2) or die("database error:". mysqli_error($con));
$row = mysqli_fetch_assoc($resultset);
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
  <h2 class="text-center">Edit Librarian</h2>
  <hr>
  <form method="post" action="../backend/access.php">
    <div class="form-group">
      <label>Librarian Name</label>
      <input type="text" name="username" value="<?= $row['username'] ?>" class="input_form" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Librarian Email</label>
      <input type="email" name="email" value="<?= $row['email'] ?>" class="input_form" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Librarian Phone</label>
      <input type="text" name="phone" value="<?= $row['phone'] ?>" class="input_form" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Librarian Password</label>
      <input type="password" name="password" value="<?= $row['password'] ?>" class="input_form" required>
    </div>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <button type="submit" class="btn_signup" name="edit_librarian">Edit Librarian</button><br>
  </form>
</div>

