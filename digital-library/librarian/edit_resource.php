<?php
error_reporting(E_ERROR | E_PARSE);
require_once('header.php');
include_once("../backend/db.php");

$id = $_GET['id'];

$records = mysqli_query($con,"select * from physical_resources where id='$id'");

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
          <h2>Edit Physical Resources</h2>
        </div>

        <div class="row">

          <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="../backend/add_resource.php" method="post" enctype="multipart/form-data" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Resource Name</label>
                  <input type="text" name="name" class="form-control" id="name" value="<?= $data['name'] ?>" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Resource Image</label>
                  <input type="file" class="form-control" name="cover" id="name">
                </div>
              </div>
              <div class="form-group">
                <label for="name">Resource Description</label>
                <input type="text" class="form-control" name="description" value="<?= $data['description'] ?>" id="subject" required>
              </div>
              <input type="hidden" name="id" value="<?= $id; ?>">

              <div class="text-center"><button type="submit" name="edit_resource">Edit Resource</button></div>
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