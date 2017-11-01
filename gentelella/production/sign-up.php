<?php
// Connecting, selecting database
require('connect.php');
/* create a prepared statement */
if ($stmt = mysqli_prepare($link, "INSERT INTO users VALUES (?, ?, ?, ?, ?, ?)")) {
    /* bind parameters for markers */
    $first = $_POST['first'];
    $last = $_POST['last'];
    $netid = $_POST['netid'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password-confirm'];
    $stmt->bind_param('ssssss', $netid, $password, $first, $last, $email, $phone);
    /* execute query */
    mysqli_stmt_execute($stmt);
    /* close statement */
    mysqli_stmt_close($stmt);
}

/* close connection */
mysqli_close($link);
session_start();
$_SESSION["netid"] = $netid;
$_SESSION["first"] = $first;
$_SESSION["last"] = $last;

header('Location: ./index.php');
?>