<?php
include_once("./db.php");

if(isset($_POST['add_category'])) {

    $category = $_POST['category'];


    $sql = "SELECT * FROM categories WHERE `category`='$category'";
    $resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));
    $row = mysqli_fetch_assoc($resultset);

    if(!$row['category']){	
        $sql = "INSERT INTO 
        categories(`category`) VALUES ('$category')";
        mysqli_query($con, $sql) or die("database error:". mysqli_error($con)."qqq".$sql);

        echo '<script type="text/javascript"> alert("Category added successfully!"); window.location.href="../librarian/index.php";</script>';  // alert message
    }
    else {				
        echo "<script>
            alert('The category is exist before!!');
            window.location.href='../librarian/add_category.php';
            </script>";

    }

  
}




//
if(isset($_POST['delete_category'])) {

    $id = $_POST['id'];


    $sql = "delete from categories where id='$id'";
    mysqli_query($con, $sql) or die("database error:". mysqli_error($con)."qqq".$sql);

    echo '<script type="text/javascript"> alert("Category deleted successfully!"); window.location.href="../librarian/index.php";</script>';  // alert message
}


?>