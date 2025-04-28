<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
require_once('header.php');
include_once("../backend/db.php");

$records = mysqli_query($con,
"SELECT c.id as comment_id, b.name, u.username, c.txt, 'b' as type 
FROM comments c, books b, users u 
WHERE b.id=c.book_id and u.email=c.user_id 
UNION 
SELECT c1.id as comment_id, r1.name, u1.username, c1.txt, 'r' as type 
FROM comments1 c1, physical_resources r1, users u1 
WHERE r1.id=c1.resource_id and u1.email=c1.user_id");

if(isset($_POST['delete'])) 
{
  $id = $_POST['id'];
  $type = $_POST['type'];
  if($type == 'b')
  {
    $sql = "delete from comments where id='$id'";
  }
  if($type == 'r')
  {
    $sql = "delete from comments1 where id='$id'";
  }
  
  mysqli_query($con, $sql) or die("database error:". mysqli_error($con)."qqq".$sql);	
  echo '<script type="text/javascript"> alert("Deleted Successfully!"); window.location.href="comments.php";</script>';  // alert message
}
?>
<link rel="stylesheet" href="css/style.css">

<style>
    .main-table-containter{
    border-radius:3vmin;
    background-color:#F6F6F4;
    width:100%;
    
        padding: 1rem 1rem;
    box-shadow: 0px 2px 5px 0px #00000033;
    }

    .title-table-container{
    display:flex;
    justify-content:space-between;
    margin-bottom:1.20rem;
    align-items:center;
    padding:0rem 1.5rem;

    }

    .subtitle{
    font-weight:600;
    
    }

    .select-button{
    padding:0.45rem 1rem;
    padding-right:1.5rem;
    position:relative;
    border-radius:0.5rem;
    border:2px solid lightgrey;
    font-weight:600;
    border:none;
    box-shadow: 0px 1px 2px 0px #0000003b, -1px 0px 2px 0px   #ffffff33;
    }

    .select-button:after{
    content:' ';
    position:absolute;
    height:0.7vmin;
    width:0.7vmin;
    border:1px solid black;
    border-bottom:none;
    border-left:none;
    right:10%;
    top:30%;
    transform:rotate(134deg);
    
    }

    .dot{
    height:15px;
    width:15px;
    }

    table{
    width:100%;
    font-weight:600;
    FONT-SIZE:11PX;
    BORDER-COLLAPSE:COLLAPSE;
    color:#474747;
    }

    tr{
    transition:background-color 0.2s;

    }
    tr:hover{
    background-color:#FFFFFD;
    
    }
    td{
    padding:1rem;
    border:none;
    }

    td{
    text-align:center;
    }
    td:first-child{
    border-radius: 1.5rem 0rem 0rem 1.5rem;
    text-align:left;

    }

    td:last-child{
    border-radius: 0rem 1.5rem 1.5rem 0rem;


    }

    .icono-texto{
    display:flex;
    ALIGN-ITEMS:CENTER;
    }

    .icono-texto>div{
    margin-left:10px;
    }
    .contenedor-svg{
        BACKGROUND-COLOR:#E090C9;
    BORDER-RADIUS:0.7REM;
        PADDING:10PX;
    }

    .pendiente{
    background-color:#37517e;
    COLOR:#fff;
    PADDING:0.5REM;
    BORDER-RADIUS:0.5REM;
    font-weight: bolder;
    border: none;
    }

    .completado{
        background-color:#E6ECE9;
    COLOR:#80ABA4;
    PADDING:0.5REM;
    BORDER-RADIUS:0.5REM;
    }

    .cancelado{
        background-color:#F3DEDC;
    COLOR:#CF5858;
    PADDING:0.5REM;
    BORDER-RADIUS:0.5REM;
    }

    .otro-dolar{
    background-color:#B3AFEC;
    }

    @media (max-width:750px){
    td:nth-child(2){
        display:none;
    }
    
    td:nth-child(3){
        display:none;
    }
    }
</style>

<style>
  .fixed-top{
    background-color: #37517e!important;
  }
  .cards{
    margin-top: 10%;
    margin-bottom: 5%;
  }
</style>

<div class="container cards">
    <h1 class="text-center">Manage Comments</h1>
    <hr>
	<!--Start table-->
    <div class='main-table-containter'>
        <div class='title-table-container'>
            <div class='subtitle'>Comments</div>
        </div>
        <div>
            <table>
            <tbody>
                <tr style="font-weight:bolder">
                    <td><div>User Name</div></td>
                    <td><div>Name</div></td>
                    <td><div>Comment</div></td>
                    <td><div>Type</div></td>
                    <td>Actions</td>
                </tr>
                <?php
                    while($data = mysqli_fetch_array($records))
                    {
                ?>
                <tr>
                    <td><div><?= $data['username'] ?></div></td>
                    <td><div><?= $data['name'] ?></div></td>
                    <td><div><?= $data['txt'] ?></div></td>
                    <td>
                        <?php if($data['type'] == 'b'){ ?>
                        <div>Book</div>
                        <?php } ?>
                        <?php if($data['type'] == 'r'){ ?>
                        <div>Physical Resource</div>
                        <?php } ?>
                    </td>
                    <td>
                        <form action="comments.php" method="post">
                            <input type="hidden" name="id" value="<?= $data['comment_id'] ?>">
                            <input type="hidden" name="type" value="<?= $data['type'] ?>">
                            <button class='pendiente' type="submit" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>

            </tbody>
            </table>
        </div>
    </div>

    <!--End Table-->
</div>

<?php
require_once('footer.php');
?>
