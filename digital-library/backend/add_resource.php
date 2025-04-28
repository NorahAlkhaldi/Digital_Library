<?php
include_once("./db.php");

if(isset($_POST['add_resource'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];

    $cover = $_FILES["cover"]["name"];
    $covertmp1 = $_FILES['cover']['tmp_name'];


    $sql = "SELECT * FROM physical_resources WHERE `name`='$name'";
    $resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));
    $row = mysqli_fetch_assoc($resultset);

    if(!$row['name']){
        $stmt = $con->prepare("INSERT INTO physical_resources (`name`, `description`, `image`) VALUES (?,?,?)");
        $stmt->bind_param("sss", $name, $description, $cover);
        $stmt->execute();
        
        $last_id = $con->insert_id;

        if (!file_exists('../physical_resources/' . $last_id)) {
            mkdir('../physical_resources/'. $last_id, 0777, true);
        }
        $dstcover = '../physical_resources/' . $last_id . '/' . $cover;
        //
        move_uploaded_file($covertmp1, $dstcover);


        echo '<script type="text/javascript"> alert("Physical resource added successfully!"); window.location.href="../librarian/index.php";</script>';  // alert message
    }
    else {				
        echo "<script>
            alert('The resource is exist before!!');
            window.location.href='../librarian/add_resource.php';
            </script>";

    }

  
}

//
if(isset($_POST['edit_resource'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $cover = $_FILES["cover"]["name"];
    $covertmp1 = $_FILES['cover']['tmp_name'];


    $old_cover = false;

    $sql = "SELECT * FROM physical_resources WHERE `id`='$id'";
    $resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));
    $row = mysqli_fetch_assoc($resultset);

    if($cover == '')
    { 
        $cover = $row['image'];
        $old_cover = true;
     }


     $stmt = $con->prepare("update physical_resources set name='?', description='?', image='?' where id='$id'");
    $stmt->bind_param("sss", $name, $description, $cover);
    $stmt->execute();

    $last_id = $con->insert_id;

    if($old_cover == false)
    {
        $dstcover = '../physical_resources/' . $last_id . '/' . $cover;
        move_uploaded_file($covertmp1, $dstcover);
    }


    echo '<script type="text/javascript"> alert("Resource updated successfully!"); window.location.href="../librarian/index.php";</script>';  // alert message
}

//
//
if(isset($_POST['delete_resource'])) {

    $id = $_POST['id'];

    $sql = "delete from physical_resources where id='$id'";
    mysqli_query($con, $sql) or die("database error:". mysqli_error($con)."qqq".$sql);

    echo '<script type="text/javascript"> alert("Resource deleted successfully!"); window.location.href="../librarian/index.php";</script>';  // alert message
}


?>