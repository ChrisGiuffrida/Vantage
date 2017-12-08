<?php

function parse_csv() {
    if (($handle = fopen("./uploads/" . $_SESSION["netid"] . ".csv", "r")) != FALSE) {
        $netids = array();
    
        while (($data = fgetcsv($handle, 1000, "\n")) != FALSE) {
            $netids[] = $data[0];
        }
        fclose($handle);
    }
    return $netids;
}

function get_stats($netids) {
    $data["devices"] = 0;
    $data["logins"] = 0;
    $data["processes"] = 0;

    $programs_query = "SELECT Count(command) FROM (SELECT DISTINCT command FROM Processes WHERE Date(date)=Curdate() and (";

    foreach ($netids as $netid) {
        $programs_query .= 'netid = "' . $netid . '" or ';

        // 1. Logins Today
        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT Count(logintime) FROM (SELECT logintime FROM Sessions WHERE Date(timestamp)=Curdate() AND netid=?) logintimes;")) {
            $stmt->bind_param("s", $netid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $logins);
            mysqli_stmt_fetch($stmt);
        }
        $data[$netid]["logins"] = $logins;
        $data["logins"] += $logins;

        // 2. Processes Today
        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT Count(pid) FROM (SELECT * FROM Processes WHERE Date(date)=Curdate() AND netid=?) pids;")) {
            $stmt->bind_param("s", $netid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $processes);
            mysqli_stmt_fetch($stmt);
        }
        $data[$netid]["processes"] = $processes;
        $data["processes"] += $processes;
        
        // 3. Most Recent Login
        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT date_format(timestamp, '%c/%d/%Y'), date_format(timestamp, '%r'), machine from Sessions where netid = ? order by timestamp desc limit 1;")) {
            $stmt->bind_param('s', $netid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $recent_login_date, $recent_login_time, $recent_login_machine);
            mysqli_stmt_fetch($stmt);
        }
        $data[$netid]["recent_login_date"] = $recent_login_date;
        $data[$netid]["recent_login_time"] = $recent_login_time;
        $data[$netid]["recent_login_machine"] = $recent_login_machine;

        // 4. Most Run Command Today
        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT command from Processes where netid = ? and Date(date)=Curdate() group by command order by count(command) desc limit 1;")) {
            $stmt->bind_param('s', $netid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $most_run);
            mysqli_stmt_fetch($stmt);
        }
        $data[$netid]["most_run"] = $most_run;

        // 5. Most Active Day
        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT dayname(date) from Processes where netid = ? group by dayname(date) order by count(*) desc limit 1;")) {
            $stmt->bind_param('s', $netid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $most_active);
            mysqli_stmt_fetch($stmt);
        }
        $data[$netid]["most_active"] = $most_active;
        
        // I. Devices
        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT Count(host) FROM (SELECT DISTINCT host FROM Sessions WHERE Date(timestamp)=Curdate() and netid = ?) hosts;")) {
            $stmt->bind_param('s', $netid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $devices);
            mysqli_stmt_fetch($stmt);
        }
        $data["devices"] += $devices;

    }

    $programs_query = substr($programs_query, 0, -3) . ")) command;";
    require("connect.php");
    if ($stmt = mysqli_prepare($link, $programs_query)) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $programs);
        mysqli_stmt_fetch($stmt);
    }
    $data["programs"] = $programs;

    return $data;

}

?>
