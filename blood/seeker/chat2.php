<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Chat with User</title>
</head>
<body>
    <?php
        include("../header.php");
        include("../connection.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -10px;">
                    <?php
                        include("chat_sidenav.php");
                    ?>
                </div>
                <div class="col-md-10" style="text-align:center;">
                    Welcome to Chats Section 
                </div>
            </div>
        </div>
    </div>

</body>
</html>