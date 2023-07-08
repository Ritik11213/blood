<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>File Complaint</title>
</head>
<body>
    <?php
     include("..\header.php");
     include("..\connection.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                        include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my-3">FILE COMPLAINT</h5>
                    <?php
                      $pat = $_SESSION['seeker'];
                      $sel = mysqli_query($connect,"SELECT * FROM seeker WHERE username='$pat'");
                      $row = mysqli_fetch_array($sel);
                    
                      $from_username=$row['username'];
                      
                      
                      if(isset($_POST['request']))
                      {
                          
                          $sym=$_POST['issue'];
                          $to=$_POST['to'];
                          $tp=$_POST['type'];
                          if(empty($sym))
                          {
                            echo "<script>alert('Enter Field')</script>";
                          }
                          if(empty($to))
                          {
                            echo "<script>alert('Enter Field')</script>";
                          }
                          if(empty($tp))
                          {
                            echo "<script>alert('Enter Field')</script>";
                          }
                          if($tp!='S' && $tp!='D')
                          {
                            echo "<script>alert('Invalid Type Field')</script>";
                          }
                          else
                          {
                                if($tp=='S'){
                                    $qq="SELECT * FROM seeker where username='$to'";
                                    }
                                    else if($tp=='D'){
                                    $qq="SELECT * FROM donars where username='$to'"; 
                                    }

                                    $se = mysqli_query($connect,$qq);
                                
                                if(mysqli_num_rows($se) <1)
                                {
                                    echo "<script>alert('Invalid Username')</script>";
                                }
                                else 
                                {
                                    $query = "INSERT INTO complaints (from_name,to_name,issues,type) VALUES 
                                    ('$from_username', '$to', '$sym','$tp')";
                                    $res = mysqli_query($connect,$query);
                                    if($res)
                                    {
                                        echo "<script>alert('Your request is filed successfully.')</script>";
                                        header("Location: index.php");
                                    }
                            }
                          }
                      }
                    ?>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 jumbotron bg-info my-5">
                                <!-- <h5 class="text-center my-2">File Complaint</h5> -->
                                <br>
                                <br>
                                <form method="post">
                                    <label> <b> Complaint Against: </b></label>
                                    <input type="text" name="to" class="form-control"placeholder="Enter Username">
                                    <br>
                                    <label> <b>Issues: </b></label>
                                    <input type="text" name="issue" class="form-control">
                                    <br>
                                    <label> <b>Against Donor/Seeker: </b></label>
                                    <input type="text" name="type" class="form-control" placeholder="Type D for Donar and S for Seeker">
                                    <br>
                                    <input type="submit" name="request" class="btn btn-success my-2" value="Post Request">
                                </form>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>