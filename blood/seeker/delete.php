<?php 
    session_start();
    include("../header.php");
    include("../connection.php");
    $patient=$_SESSION['seeker'];
    if(isset($_GET['id']))
    {
        $idd=$_GET['id'];
    }
    
    $query = "DELETE from requests  WHERE id='$idd'";
    
    $res = mysqli_query($connect,$query);
    
    

    if($res)
    {
        echo "<script>alert('Request Deleted')</script>";
        header("Location: index.php");
    }


?>