<?php 
    session_start();
    include("../header.php");
    include("../connection.php");
    $patient=$_SESSION['admin'];
    if(isset($_GET['id']))
    {
        $uname=$_GET['id'];
    }
    
    $query = "DELETE from donars  WHERE username='$uname'";
    
    $res = mysqli_query($connect,$query);
    
    

    if($res)
    {
        echo "<script>alert('Account Deleted')</script>";
        header("Location: index.php");
    }


?>
