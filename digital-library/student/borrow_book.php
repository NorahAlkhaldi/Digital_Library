<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
require_once('header.php');

$id = $_GET['id'];
$title = $_GET['title'];
?>
<style>
  .fixed-top{
    background-color: #37517e!important;
  }
  .contact{
    margin-top: 6%;
  }
</style>
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Borrow Book Form</h2>
        </div>

        <div class="row">

          <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="../backend/book_book.php" method="post" enctype="multipart/form-data" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="name">Book Title</label>
                  <input type="text" class="form-control" value="<?= $title; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Borrow Date</label>
                  <input type="date" class="form-control" name="borrow_date" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Returned Date</label>
                  <input type="date" class="form-control" name="return_date" id="name" required>
                </div>
              </div>
              <input type="hidden" name="id" value="<?= $id ?>">
              <div class="text-center"><button type="submit" name="book_book"><i class="bx bx-book"></i> Borrow Book</button></div>
            </form>
          </div>

        </div>

      </div>
</section>
<!-- End Contact Section -->

<?php
require_once('footer.php');
?>