<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Total Complaints</title>
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
                        $patient=$_SESSION['admin'];
                        $query = "SELECT * FROM admin WHERE username='$patient'";
                        $res = mysqli_query($connect,$query);
                        $row = mysqli_fetch_array($res);
                        
                    ?> 
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my-3">Total Complaints</h5>
                    <?php
                        $query = "SELECT * FROM complaints where type='D'";
                        $res = mysqli_query($connect,$query);
                        $output = "";
                        $output.= "
                            <table class='table table-bordered'>
                                <tr>
                                    <td>ID</td>
                                    <td>From_UserName</td>
                                    <td>Against_UserName</td>
                                    <td>Issues</td>
                                    <td>Delete Account</td>
                                    <td>Reject Complaint</td>
                                    
                                    
                                    
                                </tr>
                        ";
                        if(mysqli_num_rows($res) < 1)
                        {
                            $output .= "
                                <tr>
                                    <td class='text-center' colspan='10'> No Complaints  </td>
                                </tr>
                            ";
                        }
                        while($row = mysqli_fetch_array($res))
                        {   
                            
                            $output .= "
                                <tr>
                                    <td>".$row['id']."</td>
                                    <td>".$row['from_name']."</td>
                                    <td>".$row['to_name']."</td>
                                    
                                    <td>".$row['issues']."</td>
                                    
                                    <td>
                                    
                                    
                                    <a href='delete_doner.php?id=".$row['to_name']."'>  <button class='btn btn-danger'>Delete Account</button></a>
                                    
                                
                                    </td>
                                    <td>
                                    <a href='delete_complaint.php?id=".$row['id']."'>  <button class='btn btn-danger'>Reject and delete Complaint</button></a>
                                </td>
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