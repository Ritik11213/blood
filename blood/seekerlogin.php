<?php
    session_start();
    include("connection.php");
    if(isset($_POST['login']))
    {
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        if(empty($uname))
        {
            echo "<script>alert('Enter Username')</script>";
        }
        else if(empty($pass))
        {
            echo "<script>alert('Enter Password')</script>";
        }
        else 
        {
            $query = "SELECT * FROM seeker WHERE username='$uname'AND password='$pass'";
            $res = mysqli_query($connect,$query);
            if(mysqli_num_rows($res)==1)
            {
                header("Location: seeker/index.php");
                $_SESSION['seeker'] = $uname;
            }
            else
            {
                echo "<script>alert('Invalid Account')</script>";
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <style>
body {
  background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQG4jpKFQyKxl6moHVPCAHpJ2HCQLBDAVMoJh-StU_4NWKmJ8Pkgo1KHt7iKuXg-jLznlo&usqp=CAU');
}
</style>
    <title>Seeker Login Page</title>
</head>
<body>
    <?php
        include("header.php");
    ?>
    <div class="container fluid">
    <div style="margin-top: 90px;"></div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-5 jumbotron p-3" style="border: 1px solid #ccc; box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);">
                    <h5 class="text-center my-3"><b>Seeker Login</b></h5>
                    <form method ="post">
                        <div class="form-group my-1">
                            <label><b>Username</b></label>
                            <input type="text" name="uname" class="form-control"
                               autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group my-1">
                            <label><b>Password</b></label>
                            <input type="password" name="pass" class="form-control"
                               autocomplete="off" placeholder="Enter Password">
                        </div>
                        <input type="submit" name="login" class="btn btn-danger my-2" value="Login">
                        <p>If do not have an account <a href="seeker_reg.php">Click Here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>