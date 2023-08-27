<?php
var_dump($_GET);

include "mysql_conn.php";
$mysql_obj = new mysql_conn();
$mysql = $mysql_obj->GetConn();

if(isset($_GET['setUser'])) {
    include "class_users.php";
    $user_obj = new User($mysql);
    $user_obj->CreateUser($_GET);
    header("location: Lab1_Display.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="Lab1.css" rel="stylesheet">  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Set User</title>
</head>
<body>
    <div id="container">    
        <h2>SET USER-NAME AND PASSWORD</h2>
        <form action="" method="get">
            <input type="text" name="uname" placeholder="USER NAME..." /><br>
            <input type="text" name="pass" placeholder="PASSWORD..." /><br>
            <button name="setUser" value="1">CREATE USER</button>
        </form>
    </div>
</body>
</html>
