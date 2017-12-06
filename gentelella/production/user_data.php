<?php 
    // From: http://jeffreysambells.com/2012/10/25/human-readable-filesize-php
    function human_filesize($bytes, $decimals = 2) {
        $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }

    function get_data($netid) {
        // Favorite Machine
        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT machine from Sessions where netid = ? group by machine order by count(machine) desc limit 1;")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $users);
            mysqli_stmt_fetch($stmt);
        }
        $array["favorite"] = $processes;

        // Most Run Process
        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT command from Processes where netid = ? group by command order by count(command) desc limit 1;")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $users);
            mysqli_stmt_fetch($stmt);
        }
        $array["most_run"] = $processes;

        // Most Active Day
        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT count(*) from Processes where netid = ? group by dayname(date) order by count(*) desc limit 1;")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $users);
            mysqli_stmt_fetch($stmt);
        }
        $array["most_active"] = $processes;

        // User Activity Report
        // require("connect.php");
        // $cpuleaderboard = array();
        // if ($stmt = mysqli_prepare($link, "SELECT date(timestamp), round(max(cpu_percentage), 2) as cpu FROM MachineSnapshots where name = ? and date(timestamp) > subdate(curdate(), 30) group by day(timestamp) order by cpu desc limit 10;")) {
        //     $stmt->bind_param('s', $stdnt_mchn);
        //     mysqli_stmt_execute($stmt);
        //     $cpuleader = $stmt->get_result();
        //     while($tuple = mysqli_fetch_array($cpuleader, MYSQL_NUM)) {
        //         $cpuleaderboard[] = $tuple;
        //     }
        //     $stmt->close();
        // }
        // $array["cpuleader"] = $cpuleaderboard;

        return $array;
    }
?>