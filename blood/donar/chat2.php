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
                <div class="col-md-10 my-3" style="text-align:center;">
                    <h3><b>Welcome to Chats Section</b></h3>
                </div>
            </div>
        </div>
    </div>

</body>
</html>