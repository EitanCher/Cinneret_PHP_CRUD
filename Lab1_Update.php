<?php
include "mysql_conn.php";
$mysql_obj = new mysql_conn();
$mysql = $mysql_obj->GetConn();

include "class_users.php";
$user_obj = new User($mysql);

if(isset($_GET['editBtn'])) {
    $user_obj->UpdateUser($_GET);
    header("location:./Lab1_Display.php");
}

$id = isset($_GET['rid']) ? $_GET['rid'] : -1;  //"rid" is passed by URL from "EDIT" link in "Display" page
$row = $user_obj->GetUser($id);
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
            <input type="hidden" name="id" value="<?= $id ?>" />
            <input type="text" name="uname" value="<?= $row['UserName'] ?>"/><br>
            <input type="text" name="valid" value="<?= $row['ValidUntil'] ?>"/><br>
            <button name="editBtn" value="1">UPDATE USER</button>
        </form>
    </div>
</body>
</html>