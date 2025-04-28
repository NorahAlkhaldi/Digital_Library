<?php
include_once("./db.php");

if(isset($_POST['add_damage'])) {

    $book_id = $_POST['book_id'];
    $mainatinance_date = $_POST['mainatinance_date'];

    $sql2 = "SELECT * FROM damaged_books WHERE `book_id`='$book_id'";
    $resultset = mysqli_query($con, $sql2) or die("database error:". mysqli_error($con));
    $row = mysqli_fetch_assoc($resultset);

    if(!$row['book_id'])
    {
        $sql = "INSERT INTO damaged_books(`book_id`,`mainatinance_date`) VALUES ('$book_id','$mainatinance_date')";
        mysqli_query($con, $sql) or die("database error:". mysqli_error($con)."qqq".$sql);

        $sql1 = "UPDATE books set `status`=1 where `id`='$book_id'";
        mysqli_query($con, $sql1) or die("database error:". mysqli_error($con)."qqq".$sql1);

        echo '<script type="text/javascript"> alert("Done successfully!");
        window.location.href="../librarian/index.php";</script>'; 
    }
    else 
    {				
        echo "<script>
            alert('The book is exist before!!');
            window.location.href='../librarian/books.php';
            </script>";
    }
    
}

//
if(isset($_POST['delete_damaged'])) {

    $id = $_POST['id'];

    $sql = "delete from damaged_books where book_id='$id'";
    mysqli_query($con, $sql) or die("database error:". mysqli_error($con)."qqq".$sql);

    $sql1 = "UPDATE books set `status`=0 where `id`='$id'";
    mysqli_query($con, $sql1) or die("database error:". mysqli_error($con)."qqq".$sql1);

    echo '<script type="text/javascript"> alert("Book maintained successfully!"); window.location.href="../librarian/index.php";</script>';  // alert message
}

?>