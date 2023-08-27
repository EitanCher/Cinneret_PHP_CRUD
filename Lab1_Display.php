<?php
// Connect to the DB:
include "mysql_conn.php";
$mysql_obj = new mysql_conn();
$mysql = $mysql_obj->GetConn();

// Create an object connected to the DB, having all the relevant functions:
include "class_users.php";
$user_obj = new User($mysql);
// Get an array of Users (each element is a line from the "users" table):
$userList = $user_obj->GetUsersList();

if(isset($_GET['btnDelete'])) {
    $user_obj->DeleteUser($_GET);
    header("Location: ".$_SERVER['PHP_SELF']);
    // header("location: Lab1_Display.php");
}

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
                <th>&nbsp; -- USER NAME --&nbsp;</th>
                <th>&nbsp; -- VALID UNTIL --&nbsp;</th>
                <th></th>
                <th></th>
            </tr>
            <?php
            foreach ($userList as $row) { ?>
                <tr>
                    <td><?= $row['UserName'] ?></td>
                    <td><?= $row['ValidUntil'] ?></td>
                    <td><a href="Lab1_Update.php?rid=<?= $row['userID'] ?>"> &nbsp; EDIT &nbsp;</a> </td>
                    <td><form method="get">
                            <button name="btnDelete" value="<?= $row['userID'] ?>">&nbsp;&nbsp;DELETE&nbsp;&nbsp;</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>