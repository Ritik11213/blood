<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Request Blood</title>
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
                    <h5 class="text-center my-3">REQUEST BLOOD</h5>
                    <?php
                      $pat = $_SESSION['seeker'];
                      $sel = mysqli_query($connect,"SELECT * FROM seeker WHERE username='$pat'");
                      $row = mysqli_fetch_array($sel);
                      $name = $row['name'];
                      $username=$row['username'];
                      $bg = $row['blood_group'];
                      $age = $row['age'];
                      
                      $gender = $row['gender'];
                      $phone=$row['phone'];
                      
                      if(isset($_POST['request']))
                      {
                          
                          $sym=$_POST['issue'];
                          if(empty($sym))
                          {
                            echo "<script>alert('Enter No in health issues if no issues')</script>";
                          }
                          else 
                          {
                              $query = "INSERT INTO requests (name,username,age,gender,blood_group,health_issues,phone) VALUES 
                              ('$name', '$username', '$age', '$gender', '$bg', '$sym','$phone')";
                              $res = mysqli_query($connect,$query);
                              if($res)
                              {
                                  echo "<script>alert('Your request is filed successfully.')</script>";
                                  header("Location: index.php");
                              }
                          }
                      }
                    ?>
                    <div class="col-md-12">
                        <div class="row">
                        <div class="col-md-3">
                            </div>
                            <div class="col-md-6 jumbotron">
                            
                                
                                <form method="post">
                                <label> Name :  <?php echo $name ?> </label>
                                    <br>
                                    <br>
                                    <label> Gender :  <?php echo $gender ?></label>
                                    <br>
                                    <br>
                                    <label> Blood Group :  <?php echo $bg ?></label>
                                    <br>
                                    <br>
                                    <label> Age :  <?php echo $age ?> </label>
                                    <br>
                                    <br>
                                    <label>Health Issues : </label>
                                    <input type="text" name="issue" class="form-control">
                                   
                                    <input type="submit" name="request" class="btn btn-danger my-2" value="Post Request">
                                </form>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>