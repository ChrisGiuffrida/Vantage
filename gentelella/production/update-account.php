<?php
session_start();
require("connect.php");

/* create a prepared statement */
if ($stmt = mysqli_prepare($link, "UPDATE Users SET first_name=?, last_name=?, email=?, phone=? WHERE netid=?")) {
    /* bind parameters for markers */
    $netid = $_SESSION["netid"];
    $first = $_POST["first"];
    $last = $_POST["last"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $stmt->bind_param('sssss', $first, $last, $email, $phone, $netid);
    /* execute query */
    mysqli_stmt_execute($stmt);
    /* close statement */
    mysqli_stmt_close($stmt);
    // Updating Session Variables
    $_SESSION["first"] = $first;
    $_SESSION["last"] = $last;
    $_SESSION["email"] = $email;
    $_SESSION["phone"] = $phone;
}

// TODO: Add error messages for user.

/* close connection */
mysqli_close($link);

header('Location: ./settings.php');

?>