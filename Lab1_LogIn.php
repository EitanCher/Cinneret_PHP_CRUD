<?php
session_start();
$gss = isset($_SESSION['gss']) ? $_SESSION['gss'] : 0;

// A variable to check if both fields have values:
$allFilled = (!empty($_GET['uname']) && !empty($_GET['pass']))? true : false;


if (isset($_GET['login'])) {
    // Display a message if the button is pressed but not all the fields have values:
    if($_GET['login'] == 1 && !$allFilled) {
        echo "Both Fields Should Be Filled in";
    }
    
    // Create a User object on button pressed:
    if($_GET['login'] == 1 && $allFilled) {
        include "class_users.php";
        include "mysql_conn.php";

        $users_obj = new User($_GET['uname'], $_GET['pass']);

        $mysql_obj = new mysql_conn();
        $mysql = $mysql_obj->GetConn();

        $a = $users_obj->getUserName();
        $b = $users_obj->getPassword();
        $c = $users_obj->getValidUntil();

        $q = "SELECT * FROM `users` WHERE UserName = '$a' AND Password = '$b'";
        $result = mysqli_query($mysql, $q);

        if(($gss < 33) && (mysqli_num_rows($result) > 0)) {
            $_SESSION['ValidUser'] = 1;
            setcookie("MyUser", 1);
            header("Location: 2_Passed.php");
        }
        else {
            echo "try again";
            $gss++;
        }
    }
    $_SESSION['gss'] = $gss;
}
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
            <input type="text" name="uname" placeholder="USER NAME..." />
            <br>
            <input type="text" name="pass" placeholder="PASSWORD..." />
            <br>
            <button name="login" value="1">LOG IN</button>
        </form>
    </div>
</body>
</html>


