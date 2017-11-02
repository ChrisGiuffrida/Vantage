<?php
require("connect.php");
$total_users = $total_processes = "";
// 1. Find total users on all the machines.
if ($stmt = mysqli_prepare($link, "SELECT Sum(total_users) FROM MachineSnapshots WHERE (name, timestamp) IN (SELECT name, Max(timestamp) FROM MachineSnapshots GROUP BY name)")) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $total_users);
    mysqli_stmt_fetch($stmt);
}
require("connect.php");
// 2. Find total processes
if ($stmt = mysqli_prepare($link, "SELECT Count(pid) FROM (SELECT * FROM Processes WHERE DATE(date)=CURDATE()) pids;")) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $total_processes);
    mysqli_stmt_fetch($stmt);
}

require("connect.php");
// 3. Find total logins
if ($stmt = mysqli_prepare($link, "SELECT Count(logintime) FROM (SELECT logintime FROM Sessions WHERE DATE(timestamp)=CURDATE()) logintimes;")) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $total_logins);
    mysqli_stmt_fetch($stmt);
}

require("connect.php");
// 4. Find total devices 
if ($stmt = mysqli_prepare($link, "SELECT Count(host) FROM (SELECT DISTINCT host FROM Sessions WHERE DATE(timestamp)=CURDATE()) hosts")) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $total_devices);
    mysqli_stmt_fetch($stmt);
}

require("connect.php");
$netid = $_SESSION["netid"];
// 5. Find your total processes
if ($stmt = mysqli_prepare($link, "SELECT Count(pid) FROM (SELECT * FROM Processes WHERE DATE(date)=CURDATE() AND netid=?) pids;")) {
    $stmt->bind_param("s", $netid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $your_processes);
    mysqli_stmt_fetch($stmt);
}

require("connect.php");
// 5. Find your total processes
if ($stmt = mysqli_prepare($link, "SELECT Count(logintime) FROM (SELECT logintime FROM Sessions WHERE DATE(timestamp)=CURDATE() AND netid=?) logintimes;")) {
    $stmt->bind_param("s", $netid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $your_logins);
    mysqli_stmt_fetch($stmt);
}

?>