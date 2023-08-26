<?php
include "mysql_conn.php";

$a = $_GET['uname'];
$b = $_GET['pass'];

$mysql_obj = new mysql_conn();
$mysql = $mysql_obj->GetConn();

$q_id = "SELECT * FROM `users` WHERE `UserName` LIKE '$a' AND `ValidUntil` = '$b'";
$res_id = mysqli_query($mysql, $q_id);

$row = mysqli_fetch_assoc($res_id);
$id = $row['userID'];

if($_GET['editBtn'] == 1) {
    $x = $_GET['uname'];
    $y = $_GET['valid'];
    $q = "UPDATE `users` SET `UserName` = '$x', `ValidUntil` = '$y' WHERE `users`.`userID` = $id";   
    $result = mysqli_query($mysql, $q);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="Lab1.css" rel="stylesheet">  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User</title>
</head>
<body>
    <div id="container">    
        <h2>UPDATE USER</h2>
        <form action="" method="get">
            <input type="text" name="uname"/>
            <br>
            <input type="text" name="valid"/>
            <br>
            <button name="editBtn" value="1">UPDATE USER</button>
        </form>
    </div>
</body>
</html>


