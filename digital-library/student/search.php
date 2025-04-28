<?php
error_reporting(E_ERROR | E_PARSE);
require_once('header.php');
include_once("../backend/db.php");

$word = $_POST['word'];
$records = mysqli_query($con,"select * from books where name like '%$word%' or category like '%$word%'");
$records1 = mysqli_query($con,"select * from physical_resources where name like '%$word%'");


?>

<style>
  .fixed-top{
    background-color: #37517e!important;
  }
  .portfolio{
    margin-top: 5%;
  }
</style>
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Search Results</h2>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
		<?php
			while($data = mysqli_fetch_array($records))
			{
		?>
          <div class="col-lg-4 col-md-6 portfolio-item">
            <div class="portfolio-img" style="height:500px;"><img src="../books_cover/<?= $data['id'] ?>/<?= $data['image'] ?>" class="img-fluid" alt="" style="height:100%;"></div>
            <div class="portfolio-info">
              <h4><?= $data['name'] ?></h4>
              <p><?= $data['category'] ?></p>
              <a href="../books_cover/<?= $data['id'] ?>/<?= $data['image'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?= $data['name'] ?>"><i class="bx bx-plus"></i></a>
              <br>
              <form action="../backend/book_book.php" method="post">
                  <input type="hidden" name="id" value="<?= $data['id'] ?>">
                  <button class="btn btn-primary btn-sm" type="submit" name="book_book" <?php if($data['status']==1){ ?> disabled <?php } ?> ><i class="bx bx-book"></i> Book Resource</button>
              </form>
            </div>
            
          </div>
		<?php } ?>
        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row">
        <?php
          while($data1 = mysqli_fetch_array($records1))
          {
        ?>
          <div class="col-xl-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon" style="width: 100%;"><img src="../physical_resources/<?= $data1['id'] ?>/<?= $data1['image'] ?>" alt="" style="width: 100%; height:200px;"></div>
              <h4><a href=""><?= $data1['name'] ?></a></h4>
              <p style="max-height: 75px;overflow-y: hidden;"><?= $data1['description'] ?></p>
              <hr>
              <form action="../backend/book_resource.php" method="post">
                  <input type="hidden" name="id" value="<?= $data1['id'] ?>">
                  <button class="btn btn-primary btn-sm" type="submit" name="book_resource" <?php if($data1['status']==1){ ?> disabled <?php } ?> >Book Resource</button>
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
