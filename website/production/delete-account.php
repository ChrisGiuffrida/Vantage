<?php
session_start();
require("connect.php");

/* create a prepared statement */
if ($stmt = mysqli_prepare($link, "DELETE FROM users WHERE netid=?")) {
    /* bind parameters for markers */
    $netid = $_SESSION["netid"];
    $stmt->bind_param('s', $netid);
    /* execute query */
    mysqli_stmt_execute($stmt);
    /* close statement */
    mysqli_stmt_close($stmt);
}

/* close connection */
mysqli_close($link);

session_unset();
session_destroy();
header('Location: ./login.html');

?>