<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Donar's Profile</title>
</head>
<body>
    <?php
        include("../header.php");
        include("../connection.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-Left: -30px;">
                    <?php 
                        include("sidenav.php");
                        $patient=$_SESSION['donar'];
                        $query = "SELECT * FROM donars WHERE username='$patient'";
                        $res = mysqli_query($connect,$query);
                        $row = mysqli_fetch_array($res);
                    ?> 
                </div>
                <div class="col-md-10">
                    
               
                    <div class="row">
                        <div class="col-md-6">
                           
                              
                                

                                <table class="table table-border-bordered">
                                    <tr>
                                        <th colspan="2" class="text-center">My Profile</th>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td><?php echo $row['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $row['username']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Age</td>
                                        <td><?php echo $row['age']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Blood Group</td>
                                        <td><?php echo $row['blood_group']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $row['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number</td>
                                        <td><?php echo $row['phone']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $row['gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td><?php echo $row['country']; ?></td>
                                    </tr>
                                </table>
                        </div>
                        <div class="col-md-6">
                            
                               
                          

                            <?php

                                $error=array();
                                if(isset($_POST['change']))
                                {
                                    $old = $_POST['old_pass'];
                                    $new = $_POST['new_pass'];
                                    $con = $_POST['con_pass'];
                                    $query = "SELECT * FROM donars WHERE username='$patient'";
                                    $res = mysqli_query($connect,$query);
                                    $row = mysqli_fetch_array($res);
                                    if(empty($old))
                                    {
                                        echo "<script>alert('Enter Old Password')</script>";
                                       
                                    }
                                    else if($old != $row['password'])
                                    {
                                        echo "<script>alert('Old Password not matching')</script>";
                        
                                    }
                                    else if(empty($new))
                                    {
                                        echo "<script>alert('Enter new Password')</script>";
                                        
                                    }
                                    else if(empty($con))
                                    {
                                        echo "<script>alert('Confirm new Password')</script>";
                                        
                                    }
                                    else
                                    {

                                        $n1=0; $n2=0; $n3=0; $n4=0; $n5=0;
                                        for($i=0; $i<strlen($new); $i++)
                                        {
                                            if($new[$i]>='a' && $new[$i]<='z') $n1++;
                                            else if($new[$i]>='A' && $new[$i]<='Z') $n2++;
                                            else if($new[$i]>='0' && $new[$i]<='9') $n3++;
                                            else if($new[$i]==' ') $n4++;
                                            else $n5++;
                                        }
                                        if(strlen($new)<8){
                                            echo "<script>alert('Password must have atleast 8 characters')</script>";
                                            
                                        }else if($n4>0){
                                            echo "<script>alert('Password must not have empty spaces')</script>";
                                            
                                        }
                                        else if($n1==0){
                                            echo "<script>alert('Password must contain atleast one lowercase letter')</script>";
                                        
                                        }
                                        else if($n2==0){
                                            echo "<script>alert('Password must contain atleast one uppercase letter')</script>";
                                            
                                        }
                                        else if($n3==0){
                                            echo "<script>alert('Password must contain atleast one numeric character')</script>";
                                        
                                        }
                                        else if($n5==0){
                                            echo "<script>alert('Password must contain atleast one special character')</script>";
                                    
                                        }
                                        else if($con!=$new){
                                            echo "<script>alert('Confirm Password not matching password')</script>";
                
                                        }
                                        else
                                        {
                                            $query = "UPDATE donars SET password='$new' WHERE username='$patient'";
                                            $re= mysqli_query($connect,$query);
                                            if($re)
                                            {
                                                echo "<script>alert('Password Updated Successfully')</script>";
                                            }
                                        }
                                    }
                                }
                            ?>

                            <h5 class="my-4 text-center">Change Password</h5>
                            <form method="post">
                                <label>Old Password</label>
                                <input type="password" name="old_pass" class="form-control"
                                   autocomplete="off" placeholder="Enter old Password">
                                <label>New Password</label>
                                <input type="password" name="new_pass" class="form-control"
                                   autocomplete="off" placeholder="Enter new Password">
                                <label>Confirm Password</label>
                                <input type="password" name="con_pass" class="form-control"
                                   autocomplete="off" placeholder="Enter confirm Password">
                                <input type="submit" name="change" class="btn btn-danger my-2" value="Change Password">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>