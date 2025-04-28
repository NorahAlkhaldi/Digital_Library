<?php
error_reporting(E_ERROR | E_PARSE);
require_once('header.php');
include_once("../backend/db.php");

$id = $_GET['id'];

$records = mysqli_query($con,"select * from books where id='$id'");

while($data = mysqli_fetch_array($records))
{
?>

<style>
  .fixed-top{
    background-color: #37517e!important;
  }
  .contact{
    margin-top: 5%;
  }
</style>

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Edit Book</h2>
        </div>

        <div class="row">

          <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="../backend/add_book.php" method="post" enctype="multipart/form-data" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="name">Book Name</label>
                  <input type="text" name="book_name" class="form-control" id="name" value="<?= $data['name'] ?>" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="name">Book Category</label>
                  <input type="text" class="form-control" name="category" value="<?= $data['category'] ?>" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="name">Books Count</label>
                  <input type="text" class="form-control" name="count" value="<?= $data['count_books'] ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Book Description</label>
                <input type="text" class="form-control" name="description" value="<?= $data['description'] ?>" required>
              </div>
              
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="name">Book Cover</label>
                  <input type="file" class="form-control" name="cover" id="subject">
                </div>
                <div class="form-group col-md-4">
                  <label for="name">Bookshelf</label>
                  <input type="text" class="form-control" value="<?= $data['shelf'] ?>" name="shelf" id="subject" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="name">Book Section</label>
                  <input type="text" class="form-control" value="<?= $data['section'] ?>" name="section" id="subject" required>
                </div>
              </div>
              <input type="hidden" name="id" value="<?= $data['id'] ?>">
              <div class="text-center">
                <button class="btn btn-warning" type="submit" name="edit_book">Edit Book</button>
                <button class="btn btn-warning" type="submit" name="delete_book">Delete Book</button>
              </div>
            </form>
          </div>

        </div>

      </div>
</section>
<!-- End Contact Section -->

<?php
}
require_once('footer.php');
?>
