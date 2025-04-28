<?php
error_reporting(E_ERROR | E_PARSE);
require_once('header.php');
include_once("../backend/db.php");

$records = mysqli_query($con,"select * from physical_resources");
?>

<style>
  .fixed-top{
    background-color: #37517e!important;
  }
  .services{
    margin-top: 5%;
  }
</style>

<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Physical Resources</h2>
        </div>

        <div class="row">
        <?php
          while($data = mysqli_fetch_array($records))
          {
        ?>
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon" style="width: 100%;"><img src="../physical_resources/<?= $data['id'] ?>/<?= $data['image'] ?>" alt="" style="width: 100%; height:200px;"></div>
              <h4><a href=""><?= $data['name'] ?></a></h4>
              <p style="max-height: 75px;overflow-y: hidden;"><?= $data['description'] ?></p>
              <hr>
              <form action="../backend/add_resource.php" method="post">
                  <input type="hidden" name="id" value="<?= $data['id'] ?>">
                  <button class="btn btn-danger btn-sm" type="submit" name="delete_resource">Delete Resource</button>
              </form>
            </div>
          </div>
        <?php } ?>
        </div>

      </div>
    </section><!-- End Services Section -->


<?php
require_once('footer.php');
?>