<?php
session_start();

if(!((isset($_SESSION['ValidUser'])) ||
    ((isset($_COOKIE['MyUser'])) && ($_COOKIE['MyUser'] == 1))
)) {
    header("location:Lab1_Login.php");
}

?>
<!doctype html>
<html lang="en">
<head>
    <link href="Lab1.css" rel="stylesheet">  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Protected Page</title>
</head>
<body>
    <h1>LOGIN SUCCESS</h1>
</body>
</html>