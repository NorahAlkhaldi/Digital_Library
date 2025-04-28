<?php
error_reporting(E_ERROR | E_PARSE);
require_once('header.php');
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
          <h2>Add Book</h2>
        </div>

        <div class="row">

          <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="../backend/add_book.php" method="post" enctype="multipart/form-data" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="name">Book Name</label>
                  <input type="text" name="book_name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="name">Book Category</label>
                  <input type="text" class="form-control" name="category" id="name" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="name">Books Count</label>
                  <input type="text" class="form-control" name="count" id="subject" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Book Description</label>
                <input type="text" class="form-control" name="description" id="subject" required>
              </div>
              
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="name">Book Cover</label>
                  <input type="file" class="form-control" name="cover" id="subject" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="name">Bookshelf</label>
                  <input type="text" class="form-control" name="shelf" id="subject" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="name">Book Section</label>
                  <input type="text" class="form-control" name="section" id="subject" required>
                </div>
              </div>
              <div class="text-center"><button type="submit" name="add_book">Add Book</button></div>
            </form>
          </div>

        </div>

      </div>
</section>
<!-- End Contact Section -->

<?php
require_once('footer.php');
?>