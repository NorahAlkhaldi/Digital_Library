<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
require_once('header.php');
include_once("../backend/db.php");

$records = mysqli_query($con,"select * from books");
if(isset($_POST['delete_book'])) 
{
  $id = $_POST['id'];
  $sql = "delete from books where id='$id'";
  mysqli_query($con, $sql) or die("database error:". mysqli_error($con)."qqq".$sql);	
  echo '<script type="text/javascript"> alert("Deleted Successfully!"); window.location.href="books.php";</script>';  // alert message
}
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
              <h4><?= $data['name'] ?></h4>
              <p><?= $data['category'] ?></p>
			  <form action="books.php" method="post">
			  	<input type="hidden" name="id" value="<?= $data['id'] ?>">
			  	<button class="btn btn-danger" type="submit" name="delete_book">Delete Book</button>
			  </form>
            </div>
          </div>
		<?php } ?>
        </div>

      </div>
    </section><!-- End Portfolio Section -->

<?php
require_once('footer.php');
?>
