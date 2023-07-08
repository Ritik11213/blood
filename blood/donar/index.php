<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
body {
  background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQG4jpKFQyKxl6moHVPCAHpJ2HCQLBDAVMoJh-StU_4NWKmJ8Pkgo1KHt7iKuXg-jLznlo&usqp=CAU');
}
</style>
    <title>Donar's Dashboard</title>
</head>
<body>
    <?php
        include("../header.php");
        include("../connection.php");
    ?>

<div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2"style="margin-left: -30px;">
                <?php
                include("sidenav.php");
                ?>
                </div>
                <div class="col-md-10">
                    <h5 class="my-3" style="text-align:center;">Donar's  Dashboard</h5>
                    <div class="col-md-12">
                        <div class="row">
                        <div class="col-md-3 bg-danger mx-3"style="height: 120px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="text-white my-4">My Profile</h5>
                                    </div>
                                        <div class="col-md-4">
                                            <a href="profile.php">
                                            <i class="fas fa-user fa-3x my-4"style="color: white;"></i>
                                            </a>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-danger mx-2"style="height: 120px;">
                            <div class="col-md-12">
                                <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white my-4">View Blood Requests</h5>
                                        </div>
                                        <div class="col-md-4">
                                                <a href="view_requests.php">
                                                    <i class="fa-solid fa-receipt fa-3x my-4"style="color: white;"></i>
                                                </a>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-danger mx-2"style="height: 120px;">
                            <div class="col-md-12">
                                <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white my-4">My Chats</h5>
                                        </div>
                                        <div class="col-md-4">
                                                <a href="chat2.php">
                                                    <i class="fa-brands fa-rocketchat fa-3x my-4"style="color: white;"></i>
                                                </a>
                                        </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-md-3 bg-danger mx-3 my-3"style="height: 120px;">
                            <div class="col-md-12">
                                <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white my-4">File Complaint</h5>
                                        </div>
                                        <div class="col-md-4">
                                                <a href="file_complaint.php">
                                                    <i class="fa-solid fa-receipt fa-3x my-4"style="color: white;"></i>
                                                </a>
                                        </div>
                                </div>
                            </div>
                        </div>
                        </div>
                       
                    </div>

        
                   
                  
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>