<?php
function prcnt_change($ystrdy, $today) {
    if ($ystrdy == 0) {
        return 0;
    }
    else {
        return (($today - $ystrdy) / $ystrdy) * 100;
    }
}

$total_users = $total_users_ystrdy = $total_processes = "";
// 1.0 Find total users on all the machines.
require("connect.php");
if ($stmt = mysqli_prepare($link, "SELECT Sum(total_users) FROM (SELECT total_users, name, Max(timestamp) FROM MachineSnapshots WHERE Date(timestamp) = Curdate() GROUP BY name) AS q;")) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $total_users);
    mysqli_stmt_fetch($stmt);
}
// 1.1 Find total users on all machines from yesterday.
require("connect.php");
if ($stmt = mysqli_prepare($link, "SELECT Sum(total_users) FROM (SELECT total_users, name, Max(timestamp) FROM MachineSnapshots WHERE Date(timestamp) = Subdate(Curdate(), 1) GROUP BY name) AS q;")) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $total_users_ystrdy);
    mysqli_stmt_fetch($stmt);
}
// 1.2 Compute percent change.
$total_users_change = prcnt_change($total_users_ystrdy, $total_users);


// 2.0 Find total processes
require("connect.php");
if ($stmt = mysqli_prepare($link, "SELECT Count(pid) FROM (SELECT * FROM Processes WHERE Date(date)=Curdate()) pids;")) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $total_processes);
    mysqli_stmt_fetch($stmt);
}
// 2.1 Find total processes from yesterday
require("connect.php");
if ($stmt = mysqli_prepare($link, "SELECT Count(pid) FROM (SELECT * FROM Processes WHERE Date(date)=Subdate(Curdate(), 1)) pids;")) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $total_processes_ystrdy);
    mysqli_stmt_fetch($stmt);
}
// 2.2 Compute percent change
$total_processes_change = prcnt_change($total_processes_ystrdy, $total_processes);

// 3.0 Find total logins
require("connect.php");
if ($stmt = mysqli_prepare($link, "SELECT Count(logintime) FROM (SELECT logintime FROM Sessions WHERE Date(timestamp)=Curdate()) logintimes;")) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $total_logins);
    mysqli_stmt_fetch($stmt);
}
// 3.1 Find total logins from yesterday
require("connect.php");
if ($stmt = mysqli_prepare($link, "SELECT Count(logintime) FROM (SELECT logintime FROM Sessions WHERE Date(timestamp)=Subdate(Curdate(), 1)) logintimes;")) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $total_logins_ystrdy);
    mysqli_stmt_fetch($stmt);
}
// 3.2 Compute percent change
$total_logins_change = prcnt_change($total_logins_ystrdy, $total_logins);

// 4.0 Find total devices 
require("connect.php");
if ($stmt = mysqli_prepare($link, "SELECT Count(host) FROM (SELECT DISTINCT host FROM Sessions WHERE Date(timestamp)=Curdate()) hosts")) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $total_devices);
    mysqli_stmt_fetch($stmt);
}
// 4.1 Find total devices from yesterday
require("connect.php");
if ($stmt = mysqli_prepare($link, "SELECT Count(host) FROM (SELECT DISTINCT host FROM Sessions WHERE Date(timestamp)=Subdate(Curdate(), 1)) hosts")) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $total_devices_ystrdy);
    mysqli_stmt_fetch($stmt);
}
// 4.2 Compute percent change
$total_devices_change = prcnt_change($total_devices_ystrdy, $total_devices);

$netid = $_SESSION["netid"];
// 5.0 Find your total processes
require("connect.php");
if ($stmt = mysqli_prepare($link, "SELECT Count(pid) FROM (SELECT * FROM Processes WHERE Date(date)=Curdate() AND netid=?) pids;")) {
    $stmt->bind_param("s", $netid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $your_processes);
    mysqli_stmt_fetch($stmt);
}
// 5.1 Find your total processes from yesterday
require("connect.php");
if ($stmt = mysqli_prepare($link, "SELECT Count(pid) FROM (SELECT * FROM Processes WHERE Date(date)=Subdate(Curdate(), 1) AND netid=?) pids;")) {
    $stmt->bind_param("s", $netid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $your_processes_ystrdy);
    mysqli_stmt_fetch($stmt);
}
// 5.2 Compute percent change
$your_processes_change = prcnt_change($your_processes_ystrdy, $your_processes);

require("connect.php");
// 6.0 Find your total logins
if ($stmt = mysqli_prepare($link, "SELECT Count(logintime) FROM (SELECT logintime FROM Sessions WHERE Date(timestamp)=Curdate() AND netid=?) logintimes;")) {
    $stmt->bind_param("s", $netid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $your_logins);
    mysqli_stmt_fetch($stmt);
}
require("connect.php");
// 6.1 Find your total logins from yesterday
if ($stmt = mysqli_prepare($link, "SELECT Count(logintime) FROM (SELECT logintime FROM Sessions WHERE Date(timestamp)=Subdate(Curdate(), 1) AND netid=?) logintimes;")) {
    $stmt->bind_param("s", $netid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $your_logins_ystrdy);
    mysqli_stmt_fetch($stmt);
}
// 6.2 Compute percent change
$your_logins_change = prcnt_change($your_logins_ystrdy, $your_logins);

?>