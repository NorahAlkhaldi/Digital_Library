<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
require_once('header.php');
include_once("../backend/db.php");

$records = mysqli_query($con,"select * from books");
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
          <h2>New Damage Book</h2>
        </div>

        <div class="row">

          <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="../backend/add_damage.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="name">Book Name</label>
                  <select name="book_id" class="form-control" id="name" required>
                    <?php
                        while($data = mysqli_fetch_array($records))
                        {
                    ?>
                    <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label for="name">Mainatinance Date</label>
                  <input type="date" name="mainatinance_date" class="form-control" id="name" required>
                </div>
              </div>
              <div class="text-center"><button type="submit" name="add_damage">Submit</button></div>
            </form>
          </div>

        </div>

      </div>
</section>
<!-- End Contact Section -->

<?php
require_once('footer.php');
?>