<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
require_once('header.php');
include_once("../backend/db.php");
$id = $_GET['id'];
$sql2 = "SELECT * FROM physical_resources WHERE `id`='$id'";
$resultset = mysqli_query($con, $sql2) or die("database error:". mysqli_error($con));
$row = mysqli_fetch_assoc($resultset);

if(isset($_POST['send_comment'])) 
{
  $txt = $_POST['comment'];
  $resource_id = $_POST['resource_id'];
  $user_id = $_SESSION['email'];

  $sql = "insert into comments1(user_id,resource_id,txt) values('$user_id','$resource_id','$txt')";
  mysqli_query($con, $sql) or die("database error:". mysqli_error($con)."qqq".$sql);
  
  echo '<script type="text/javascript"> alert("Comment Sent Successfully!"); window.location.href="physical.php";</script>';  // alert message
}

$records = mysqli_query($con,"select * from comments1 where resource_id='$id'");
?>

<style>
    .fixed-top{
    background-color: #37517e!important;
    }
    .content{
    width:85%;
    margin: 10% auto;
    }
    .half{
    float: left;
    margin: 1%;
    padding: 0 2%;
    border-radius: 3px;
    }
    #first-half{
    width: 100%;
    }
    #second-half{
    border: 1px solid;
    width: 100%;
    }

    h2{
    margin: 1.25em 0;
    }
    h4{
    margin: .5em;
    }

    .book-cover{
    text-align: center;
    }
    .book-cover img{
    width: 25%;
    height: 400px;
    margin: 1em;
    border-radius: 3px;
    }
    h3{
    text-align: center;
    color: #154f83;
    margin: 1em;
    cursor: pointer;
    }

</style>

<div class="content">
  <div id="first-half" class="half">
    <h1><?= $row['name'] ?></h1>
  </div>
  <div id="second-half" class="half">
    <div class="book-cover">
      <img src="../physical_resources/<?= $row['id'] ?>/<?= $row['image'] ?>" />
    </div>
    <h4>Name: <?= $row['name'] ?></h4>
    
    <p><?= $row['description'] ?></p>
  <div>
  <form class="form-inline" method="post" action="resource_details.php">
    <div class="form-group mx-sm-3 mb-2">
        <input type="text" name="comment" class="form-control" placeholder="Write you comment">
        <input type="hidden" name="resource_id" value="<?= $row['id'] ?>">
        <button type="submit" class="btn btn-primary m-2" name="send_comment">Comment</button>
    </div>
  </form>
</div>
<hr>
<div class="container">
    <h2>Resource Comments:</h2>
    <ul>
        <?php
			while($data = mysqli_fetch_array($records))
			{
		?>
        <li><?= $data['txt'] ?></li>
        <?php } ?>
    </ul>
</div>

