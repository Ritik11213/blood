<?php
    session_start();
    if(isset($_SESSION['donar'])){
        unset($_SESSION['donar']);
        header("Location: ../index.php");
    }
?>
