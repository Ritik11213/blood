<?php 
    session_start();
    include("../header.php");
    include("../connection.php");
    $patient=$_SESSION['admin'];
    if(isset($_GET['id']))
    {
        $uname=$_GET['id'];
    }
   
    $query = "DELETE from seeker  WHERE username='$uname'";
    $query2 = "DELETE from requests  WHERE username='$uname'";
   
    $res = mysqli_query($connect,$query);
    $res2 = mysqli_query($connect,$query2);
   

    if($res&&$res2)
    {
        echo "<script>alert('Account Deleted')</script>";
        header("Location: index.php");
    }


?>

