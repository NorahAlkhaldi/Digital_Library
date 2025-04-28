<?php
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
          <h2>Add Category</h2>
        </div>

        <div class="row">

          <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="../backend/add_category.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="name">Category Name</label>
                  <input type="text" name="category" class="form-control" id="name" required>
                </div>
              </div>
              <div class="text-center"><button type="submit" name="add_category">Add Category</button></div>
            </form>
          </div>

        </div>

      </div>
</section>
<!-- End Contact Section -->

<?php
require_once('footer.php');
?>