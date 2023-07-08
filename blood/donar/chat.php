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
                <div class="col-md-10">
                    
                    <?php
                        $uname="";
                        if(isset($_GET['id']))
                        {
                            $uname=$_GET['id'];
                        }
                        $don = $_SESSION['donar'];
                        $rec = $uname;
                    ?>
                    <div class="head"> <h5 class="text-center my-3">Chat with <?php echo $uname; ?></h5> </div>
                    
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 jumbotron my-5" style = "border: 1px solid black; height: 400px; overflow: auto;">
                                <?php
                                    $query= "SELECT * FROM chats where ((sender='$don' and receiver='$rec') or (sender='$rec' and receiver='$don'))";
                                    $res = mysqli_query($connect,$query);
                                    $output="";
                                    if(mysqli_num_rows($res) < 1)
                                    {
                                        $output .= "
                                            <h3> No chats yet </h3>
                                        ";
                                    }
                                    while($row = mysqli_fetch_array($res))
                                    {
                                        if($row['sender']==$uname)
                                        {
                                            $output .= '
                                            <div class="messages my-2" style="width: 250px; margin-right:auto;">
                                                <div class="message">
                                                    <div class="sender mx-2"><b>'.$row['sender'].'</b></div>
                                                    <div class="timestamp mx-2">'.$row['date'].'</div>
                                                </div>
                                                <div class="text mx-2">'.$row['chat'].'</div> 
                                            </div>
                                            ';
                                        }
                                        else 
                                        {
                                            $output .= '
                                            <div class="messages my-2" style="width: 250px; margin-left:auto;">
                                                <div class="message">
                                                    <div class="sender mx-2"><b>'.$row['sender'].'</b></div>
                                                    <div class="timestamp mx-2">'.$row['date'].'</div>
                                                </div>
                                                <div class="text mx-2">'.$row['chat'].'</div> 
                                            </div>
                                            ';
                                        }
                                    }
                                    echo $output;
                                ?>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                    <?php

                        if(isset($_POST['msg']))
                        {
                            $chat=$_POST['message'];

                            $_S['form_token'] = "";

                            if(empty($chat))
                            {
                                echo "<script>alert('Enter a message.')</script>";
                            }
                            else 
                            {
                                $query = "INSERT INTO chats (sender, receiver, sendertype, receivertype, date, chat) VALUES 
                                ('$don', '$rec', 'Donar', 'Receiver', NOW(), '$chat')";
                                $res = mysqli_query($connect,$query);
                                if($res)
                                {
                                    unset($_POST['message']);
                                    // header('Location: success.php');
                                    // header('Location: chat.php?id="$uname"');
                                }
                                else 
                                {
                                    echo "<script>alert('Message Not Sent.')</script>";
                                }
                            }
                        }
                    ?>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 jumbotron bg-info my-5">
                                <form method="post" style="display:flex">
                                    <input type="text" name="message" id="msg" autocomplete="off" class="form-control mx-2 my-2" placeholder="Enter Message">
                                    <input type="submit" name="msg" value="Send" class="btn btn-success mx-2 my-2" onsubmit="disableButton()">
                                </form>  
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function disableButton() {
            document.getElementById("submitBtn").disabled = true;
        }
    </script>
</body>
</html>