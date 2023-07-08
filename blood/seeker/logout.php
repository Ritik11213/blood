<?php
session_start();
if(isset($_SESSION['seeker'])){
    unset($_SESSION['seeker']);
    header("Location: ../index.php");
}
?>