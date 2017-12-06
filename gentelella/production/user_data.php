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
            $stmt->bind_param('s', $netid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $favorite);
            mysqli_stmt_fetch($stmt);
        }
        $array["favorite"] = $favorite;

        // Most Run Process
        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT command from Processes where netid = ? group by command order by count(command) desc limit 1;")) {
            $stmt->bind_param('s', $netid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $most_run);
            mysqli_stmt_fetch($stmt);
        }
        $array["most_run"] = $most_run;

        // Most Active Day
        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT count(*) from Processes where netid = ? group by dayname(date) order by count(*) desc limit 1;")) {
            $stmt->bind_param('s', $netid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $most_active);
            mysqli_stmt_fetch($stmt);
        }
        $array["most_active"] = $most_active;

        // User Activity Report
        require("connect.php");
        $cpuleaderboard = array();
        if ($stmt = mysqli_prepare($link, "SELECT dayname(date), count(*) from Processes where netid = ? group by dayname(date) order by dayofweek(date);")) {
            $stmt->bind_param('s', $netid);
            mysqli_stmt_execute($stmt);
            $user_graph = $stmt->get_result();
            while($tuple = mysqli_fetch_array($user_graph, MYSQL_NUM)) {
                $user_graph_array[] = $tuple;
            }
            $stmt->close();
        }
        $array["user_graph"] = $user_graph_array;


        // Recent Logins
        require("connect.php");
        $cpuleaderboard = array();
        if ($stmt = mysqli_prepare($link, "SELECT date_format(timestamp, '%c/%d/%Y'), date_format(timestamp, '%r'), machine, host from Sessions where netid = ? order by timestamp desc limit 5;")) {
            $stmt->bind_param('s', $netid);
            mysqli_stmt_execute($stmt);
            $recent_login = $stmt->get_result();
            while($tuple = mysqli_fetch_array($recent_login, MYSQL_NUM)) {
                $recent_logins[] = $tuple;
            }
            $stmt->close();
        }
        $array["recent_logins"] = $recent_logins;

        
        // Recent Processes
        require("connect.php");
        $cpuleaderboard = array();
        if ($stmt = mysqli_prepare($link, "SELECT date_format(date, '%c/%d/%Y'), date_format(time, '%r'), command, machine from Processes where netid = ? order by date desc, time desc limit 5; ")) {
            $stmt->bind_param('s', $netid);
            mysqli_stmt_execute($stmt);
            $recent_process = $stmt->get_result();
            while($tuple = mysqli_fetch_array($recent_process, MYSQL_NUM)) {
                $recent_processes[] = $tuple;
            }
            $stmt->close();
        }
        $array["recent_processes"] = $recent_processes;

        // Top Processes
        require("connect.php");
        $cpuleaderboard = array();
        if ($stmt = mysqli_prepare($link, "SELECT command, count(command) from Processes where netid = ? group by command order by count(command) desc limit 5;")) {
            $stmt->bind_param('s', $netid);
            mysqli_stmt_execute($stmt);
            $top_process = $stmt->get_result();
            while($tuple = mysqli_fetch_array($top_process, MYSQL_NUM)) {
                $top_processes[] = $tuple;
            }
            $stmt->close();
        }
        $array["top_processes"] = $top_processes;

        return $array;
    }
?>