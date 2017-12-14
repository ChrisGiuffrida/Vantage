<?php
require("verify_session.php");
$netid = $_GET["netid"];

$netid_demo = $netid_data = "";

// Check Demographics
require("connect.php");
if ($stmt = mysqli_prepare($link, "SELECT netid from Domers where netid = ? limit 1;")) {
    $stmt->bind_param('s', $netid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $netid_demo);
    mysqli_stmt_fetch($stmt);
}

// Check Data
require("connect.php");
if ($stmt = mysqli_prepare($link, "SELECT netid from Sessions where netid = ? limit 1;")) {
    $stmt->bind_param('s', $netid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $netid_data);
    mysqli_stmt_fetch($stmt);
}

if ($netid == $netid_demo && $netid == $netid_data) {
    header("Location: ./user.php?netid=" . $netid);
}
else {
    header("Location: ./search.php?bad_netid=True");
}


?>