<?php
include_once("./db.php");
session_start();

if(isset($_POST['login'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

    $sql2 = "SELECT * FROM users WHERE `email`='$email' and `password`='$password'";
	$resultset = mysqli_query($con, $sql2) or die("database error:". mysqli_error($con));
	$row = mysqli_fetch_assoc($resultset);

    if($row['email']){
        if($row['type'] == '1')
        {
            $_SESSION['email']= $email;
            $_SESSION['login']='student';
            echo '<script type="text/javascript"> alert("Login Seccessfully!"); window.location.href="../student/index.php";</script>';  // alert message
        }
        else if($row['type'] == '2')
        {
            $_SESSION['email']= $email;
            $_SESSION['login']='librarian';
            echo '<script type="text/javascript"> alert("Login Seccessfully!"); window.location.href="../librarian/index.php";</script>';  // alert message
        }
        else if($row['type'] == '0')
        {
            $_SESSION['email']= $email;
            $_SESSION['login']='admin';
            echo '<script type="text/javascript"> alert("Login Seccessfully!"); window.location.href="../admin/index.php";</script>';  // alert message
        }
       
	}
    else {				
	    echo "<script>
            alert('This user is not exist!');
            window.location.href='../login.php';
            </script>";

	}
}

else if(isset($_POST['signup'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $sql = "SELECT * FROM `users` WHERE `email`='$email'";

    $resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));
    $row = mysqli_fetch_assoc($resultset);

    if(!$row['email']){	
        $sql = "INSERT INTO users(`username`, `email`, `password`, `phone`, `type`) VALUES ('$username', '$email', '$password', '$phone', '1')";
        mysqli_query($con, $sql) or die("database error:". mysqli_error($con)."qqq".$sql);			
        echo '<script type="text/javascript"> alert("Registered Successfully!"); window.location.href="../login.php";</script>';  // alert message
    }
    else {				
        echo '<script type="text/javascript"> alert("This email exist before!!"); window.location.href="../signup.php";</script>';  // alert message
    }
    
}


else if(isset($_POST['add_librarian'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $sql = "SELECT * FROM `users` WHERE `email`='$email'";

    $resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));
    $row = mysqli_fetch_assoc($resultset);

    if(!$row['email']){	
        $sql = "INSERT INTO users(`username`, `email`, `password`, `phone`, `type`) VALUES ('$username', '$email', '$password', '$phone', '2')";
        mysqli_query($con, $sql) or die("database error:". mysqli_error($con)."qqq".$sql);			
        echo '<script type="text/javascript"> alert("Added Successfully!"); window.location.href="../admin/index.php";</script>';  // alert message
    }
    else {				
        echo '<script type="text/javascript"> alert("This email exist before!!"); window.location.href="../admin/add_librarian.php";</script>';  // alert message
    }
    
}


else if(isset($_POST['edit_librarian'])) {

    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $sql = "UPDATE users SET `username`='$username',
     `email`='$email', `password`='$password', `phone`='$phone' WHERE id='$id'";
    mysqli_query($con, $sql) or die("database error:". mysqli_error($con)."qqq".$sql);			
    echo '<script type="text/javascript"> alert("Updated Successfully!"); window.location.href="../admin/librarians.php";</script>';  // alert message
    
}


?>