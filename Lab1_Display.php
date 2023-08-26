<?php
include "mysql_conn.php";

$mysql_obj = new mysql_conn();
$mysql = $mysql_obj->GetConn();

$query = "SELECT * FROM `users`";
$result = mysqli_query($mysql, $query);

$s = "";

// while($row = mysqli_fetch_assoc($result)){
//     $s .= $row["UserName"] . "<br>";
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="Lab1.css" rel="stylesheet">  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display Users</title>
</head>
<body>
    <div id="container">    
        <h2>LIST OF USERS</h2>
        <table>
            <tr>
                <th>-- User Name --</th>
                <th>-- Valid Until --</th>
            </tr>
            <?php
            while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td><?= $row['UserName'] ?></td>
                    <td><?= $row['ValidUntil'] ?></td>
                    <td>
                        <form action="Lab1_Update.php" method="get">
                            <button name="edit" value="1">EDIT</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>


