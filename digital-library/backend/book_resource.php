<?php
include_once("./db.php");

if(isset($_POST['book_resource'])) {

    session_start();

    $user_id = $_SESSION['email'];
    $resource_id = $_POST['id'];
    $borrow_date = $_POST['borrow_date'];
    $return_date = $_POST['return_date'];

    $sql = "INSERT INTO physical_borrow(`user_id`,`resource_id`,`borrow_date`,`return_date`) VALUES ('$user_id','$resource_id','$borrow_date','$return_date')";
    mysqli_query($con, $sql) or die("database error:". mysqli_error($con)."qqq".$sql);

    $sql1 = "UPDATE physical_resources set `status`=1 where `id`='$resource_id'";
    mysqli_query($con, $sql1) or die("database error:". mysqli_error($con)."qqq".$sql1);

    echo '<script type="text/javascript"> alert("Resource booked successfully!");
     window.location.href="../student/index.php";</script>'; 
}

?>