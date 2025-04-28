<?php
error_reporting(E_ERROR | E_PARSE);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once("./db.php");

if(isset($_POST['add_book'])) {

    $book_name = $_POST['book_name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $count = $_POST['count'];
    $shelf = $_POST['shelf'];
    $section = $_POST['section'];

    $cover = $_FILES["cover"]["name"];
    $covertmp1 = $_FILES['cover']['tmp_name'];

    $file = $_FILES["file"]["name"];
    $filetmp1 = $_FILES["file"]["tmp_name"];


    $sql = "SELECT * FROM books WHERE `name`='$book_name'";
    $resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));
    $row = mysqli_fetch_assoc($resultset);

    if(!$row['name']){	
        $sql = "INSERT INTO 
        books(`name`,`category`, `description`, `image`, `file`, `count_books`, `shelf`, `section`) VALUES ('$book_name', '$category', '$description', '$cover', '$file', '$count', '$shelf', '$section')";
        mysqli_query($con, $sql) or die("database error:". mysqli_error($con)."qqq".$sql);
        $last_id = $con->insert_id;

        if (!file_exists('../books_cover/' . $last_id)) {
            mkdir('../books_cover/'. $last_id, 0777, true);
        }
        $dstcover = '../books_cover/' . $last_id . '/' . $cover;

        //
        if (!file_exists('../books_file/' . $last_id)) {
            mkdir('../books_file/'. $last_id, 0777, true);
        }
        $dstfile = '../books_file/' . $last_id . '/' . $file;

        move_uploaded_file($covertmp1, $dstcover);
        move_uploaded_file($filetmp1, $dstfile);


        echo '<script type="text/javascript"> alert("Book uploaded successfully!"); window.location.href="../librarian/index.php";</script>';  // alert message
    }
    else {				
        echo "<script>
            alert('The book is exist before!!');
            window.location.href='../librarian/add_book.php';
            </script>";

    }

  
}

//
if(isset($_POST['edit_book'])) {

    $id = $_POST['id'];
    $book_name = $_POST['book_name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $count = $_POST['count'];
    $shelf = $_POST['shelf'];
    $section = $_POST['section'];

    $cover = $_FILES["cover"]["name"];
    $covertmp1 = $_FILES['cover']['tmp_name'];

    $file = $_FILES["file"]["name"];
    $filetmp1 = $_FILES["file"]["tmp_name"];


    $old_cover = false;
    $old_file = false;

    $sql = "SELECT * FROM books WHERE `id`='$id'";
    $resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));
    $row = mysqli_fetch_assoc($resultset);

    if($cover == '')
    { 
        $cover = $row['image'];
        $old_cover = true;
     }
    if($file == '')
    { 
        $file = $row['file'];
        $old_file = true;
     }

    $sql = "update books set name='$book_name', category='$category', description='$description', image='$cover', file='$file', count_books='$count', shelf='$shelf', section='$section' where id='$id'";
    mysqli_query($con, $sql) or die("database error:". mysqli_error($con)."qqq".$sql);
    $last_id = $con->insert_id;

    if($old_cover == false)
    {
        $dstcover = '../books_cover/' . $last_id . '/' . $cover;
        move_uploaded_file($covertmp1, $dstcover);
    }
    if($old_file == false)
    {
        $dstfile = '../books_file/' . $last_id . '/' . $file;
        move_uploaded_file($filetmp1, $dstfile);
    }

    echo '<script type="text/javascript"> alert("Book updated successfully!"); window.location.href="../librarian/index.php";</script>';  // alert message
}

//
if(isset($_POST['delete_book'])) {

    $id = $_POST['id'];


    $sql = "delete from books where id='$id'";
    mysqli_query($con, $sql) or die("database error:". mysqli_error($con)."qqq".$sql);

    echo '<script type="text/javascript"> alert("Book deleted successfully!"); window.location.href="../librarian/index.php";</script>';  // alert message
}


?>