<?php
include_once("./db.php");

if(isset($_POST['book_book'])) {

    session_start();

    $user_id = $_SESSION['email'];
    $book_id = $_POST['id'];
    $borrow_date = $_POST['borrow_date'];
    $return_date = $_POST['return_date'];

    $sql = "SELECT count_books FROM books WHERE `id`='$book_id'";
    $resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));
    $row = mysqli_fetch_assoc($resultset);

    $count_books = $row['count_books'];

    $sql1 = "SELECT count(*) as count_borrow FROM borrow WHERE `book_id`='$book_id'";
    $resultset1 = mysqli_query($con, $sql1) or die("database error:". mysqli_error($con));
    $row1 = mysqli_fetch_assoc($resultset1);

    $count_borrow = $row1['count_borrow'];

    if($count_books == $count_borrow)
    {
        echo '<script type="text/javascript"> alert("Sorry, This book not available now!");
     window.location.href="../student/books.php";</script>';
    }
    else
    {
        $sql0 = "SELECT count(*) as count_user_borrow FROM borrow WHERE `book_id`='$book_id' and user_id='$user_id'";
        $resultset0 = mysqli_query($con, $sql0) or die("database error:". mysqli_error($con));
        $row0 = mysqli_fetch_assoc($resultset0);
        $user_exist = $row0['count_user_borrow'];

        if($user_exist > 0)
        {
            echo '<script type="text/javascript"> alert("Sorry, You already booked this book!");
            window.location.href="../student/index.php";</script>'; 
        }
        else
        {
            $sql2 = "INSERT INTO borrow(`user_id`,`book_id`,`borrow_date`,`return_date`) VALUES ('$user_id','$book_id','$borrow_date','$return_date')";
            mysqli_query($con, $sql2) or die("database error:". mysqli_error($con)."qqq".$sql2);
            echo '<script type="text/javascript"> alert("Book borrowed successfully!");
                window.location.href="../student/index.php";</script>';
        } 
    }

    
}

?>