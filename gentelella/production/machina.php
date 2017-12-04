<?php 
    // From: http://jeffreysambells.com/2012/10/25/human-readable-filesize-php
    function human_filesize($bytes, $decimals = 2) {
        $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }

    function get_data($stdnt_mchn) {
        // 1.
        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT Sum(total_users) FROM (SELECT total_users, name, Max(timestamp) FROM MachineSnapshots WHERE Date(timestamp) = Curdate() AND name = ? GROUP BY name) AS q;")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $users);
            mysqli_stmt_fetch($stmt);
        }
        $array["users"] = $users;
        // 2.
        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT Count(pid) FROM (SELECT * FROM Processes WHERE Date(date)=Curdate() AND machine = ?) pids;")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $processes);
            mysqli_stmt_fetch($stmt);
        }
        $array["processes"] = $processes;
        // 3.
        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT Count(logintime) FROM (SELECT logintime FROM Sessions WHERE Date(timestamp)=Curdate() AND machine = ?) logintimes;")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $logins);
            mysqli_stmt_fetch($stmt);
        }
        $array["logins"] = $logins;
        // 4.
        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT Count(host) FROM (SELECT DISTINCT host FROM Sessions WHERE Date(timestamp)=Curdate() AND machine = ?) hosts;")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $devices);
            mysqli_stmt_fetch($stmt);
        }
        $array["devices"] = $devices;
        // 5.
        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT Round(Avg(cpu_percentage), 2) FROM MachineSnapshots WHERE Date(timestamp) = Curdate() AND name = ?;")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $cpu);
            mysqli_stmt_fetch($stmt);
        }
        $array["cpu"] = $cpu;
        // 6.
        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT uptime FROM MachineSnapshots WHERE name = ? AND Date(timestamp) = Curdate() ORDER BY timestamp DESC LIMIT 1;")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $uptime);
            mysqli_stmt_fetch($stmt);
        }
        $array["uptime"] = $uptime;
        // 6.
        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT Count(*) FROM (SELECT name FROM Disks WHERE machine = ? AND Date(timestamp) = Curdate() GROUP BY name) a; ")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $num_disks);
            mysqli_stmt_fetch($stmt);
        }
        $array["num_disks"] = $num_disks;
        // 7.
        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT Count(*) FROM (SELECT name FROM Disks WHERE machine = ? AND Date(timestamp) = Curdate() GROUP BY name) a; ")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $num_disks);
            mysqli_stmt_fetch($stmt);
        }
        $array["num_disks"] = $num_disks;
        // 8.
        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT Avg(mem_used) FROM MachineSnapshots WHERE  Date(timestamp) = Curdate() AND name = ?;")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $memory);
            mysqli_stmt_fetch($stmt);
        }
        $array["memory"] = human_filesize(round($memory * 1000), 1);
        return $array;
    }
?>
