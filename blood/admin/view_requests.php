<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Total Requests</title>
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
                        $bg=$row['blood_group'];
                    ?> 
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my-3">Total Requests</h5>
                    <?php
                    $query="SELECT * FROM requests";
                        $res = mysqli_query($connect,$query);
                        $output = "";
                        $output.= "
                            <table class='table table-bordered'>
                                <tr>
                                    <td>ID</td>
                                    <td>Name</td>
                                    <td>Username</td>
                                    <td>Age</td>
                                    <td>Blood_group</td>
                                    <td>Phone</td>
                                    <td>Gender</td>
                                    <td>Health_issues</td>
                                </tr>
                        ";
                        if(mysqli_num_rows($res) < 1)
                        {
                            $output .= "
                                <tr>
                                    <td class='text-center' colspan='10'> No Requests  </td>
                                </tr>
                            ";
                        }
                        while($row = mysqli_fetch_array($res))
                        {
                            $output .= "
                                <tr>
                                    <td>".$row['id']."</td>
                                    <td>".$row['name']."</td>
                                    <td>".$row['username']."</td>
                                    <td>".$row['age']."</td>
                                    <td>".$row['blood_group']."</td>
                                    <td>".$row['phone']."</td>
                                    <td>".$row['gender']."</td>
                                    <td>".$row['health_issues']."</td>
                            ";
                        }

                        $output .="
                            </tr>
                        </table>";
                        echo $output;
                    ?>
                </div>
               
            </div>
        </div>
    </div>

    
</body>
</html>