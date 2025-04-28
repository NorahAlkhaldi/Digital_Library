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
  .portfolio{
    margin-top: 5%;
  }
</style>
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Library Books</h2>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
		<?php
			while($data = mysqli_fetch_array($records))
			{
		?>
          <div class="col-lg-4 col-md-6 portfolio-item">
            <div class="portfolio-img" style="height:500px;"><img src="../books_cover/<?= $data['id'] ?>/<?= $data['image'] ?>" class="img-fluid" alt="" style="height:100%;"></div>
            <div class="portfolio-info">
              <h4><a href="" target="_blank"><?= $data['name'] ?></a></h4>
              <p><?= $data['category'] ?></p>
              <p><?= $data['shelf'] ?> - <?= $data['section'] ?></p>
              <a href="../books_cover/<?= $data['id'] ?>/<?= $data['image'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?= $data['name'] ?>"><i class="bx bx-plus"></i></a>
              <a href="edit_book.php?id=<?= $data['id'] ?>" class="details-link" title="More Details"><i class="bx bx-edit"></i></a>
            </div>
          </div>
		<?php } ?>
        </div>

      </div>
    </section><!-- End Portfolio Section -->

<?php
require_once('footer.php');
?>
