
<!DOCTYPE html>
<html lang="en">
<head>
<style>
.city {
  background-color: tomato;
  color: black;
  border: 2px solid black;
  margin: 20px;
  padding: 20px;
}
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

        <div class="list-group" style="height: 90vh;">
            <!-- <div class="list-group-item list-group-item-action bg-danger text-center text-white">Chats</div> -->
                    <?php
                        $see=$_SESSION['seeker'];
                        $query="SELECT distinct(sender) from chats where receiver='$see'";
                        $res = mysqli_query($connect,$query);
                        $output = "";
                        $output.= "
                            <table class='table table-bordered  text-center'>
                                <tr>
                                    <td class='list-group-item list-group-item-action text-white bg-danger'>My Chat List</td>
                                </tr>
                        ";
                        if(mysqli_num_rows($res)<1)
                        {
                            $output .= "
                                <tr>
                                    <td class='list-group-item list-group-item-action text-center text-white '> No Chats Yet </td>
                                </tr>
                            ";
                        }
                        while($row = mysqli_fetch_array($res))
                        {
                            $output .= "
                                <tr>
                                    <td>
                                        <a href='chat.php?id=".$row['sender']."' class='list-group-item list-group-item-action text-center text-black'><b>".$row['sender']."</b></a>
                                    </td>
                            ";
                        }

                        $output .="
                            </tr>
                        </table>";
                        echo $output;
                    ?>
        </div>
    
</body>
</html>