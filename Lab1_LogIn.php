<?php
session_start();

include "mysql_conn.php";
$mysql_obj = new mysql_conn();
$mysql = $mysql_obj->GetConn();

include "class_users.php";
$users_obj = new User($mysql);

$gss = isset($_SESSION['gss']) ? $_SESSION['gss'] : 0;
if(isset($_GET['btnLogin'])) {
    $uname = (isset($_GET['uname'])) ? $_GET['uname'] : "";
    $pass =  (isset($_GET['pass'])) ? $_GET['pass'] : "";
    if (($gss < 4) && ($users_obj->IsValid($uname, $pass))) {
        $_SESSION['ValidUser'] = $uname;
        $_SESSION['TOKEN'] = substr(md5(rand(100, 999)), 0, 10);
        setcookie("MyUser", $uname);
        header("location: Lab1_Success.php");
    }
    else {
        setcookie("MyUser",0);
        echo "TRY AGAIN";
        $gss++;
    }
}
$_SESSION['gss'] = $gss;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="Lab1.css" rel="stylesheet">  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <div id="container">    
        <h2>SPECIFY USER-NAME AND PASSWORD</h2>
        <form action="" method="get">
            <input type="text" name="uname" placeholder="USER NAME..." /><br>
            <input type="text" name="pass" placeholder="PASSWORD..." /><br>
            <button name="btnLogin" value="1">LOG IN</button>
        </form>
    </div>
</body>
</html>


