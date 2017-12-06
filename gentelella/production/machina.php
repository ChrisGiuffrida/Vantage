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


        // LEADERBOARDS
        // top 10 processes leaderboards last week
        require("connect.php");
        $pleaderboard = array();
        if ($stmt = mysqli_prepare($link, "SELECT netid, count(*) as cnt FROM Processes where machine = ? and date > subdate(curdate(), 7) group by netid order by cnt desc limit 10;")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            $processleader = $stmt->get_result();
            while($tuple = mysqli_fetch_array($processleader, MYSQL_NUM)) {
                $pleaderboard[] = $tuple;
            }
            $stmt->close();
        }
        $array["pleader"] = $pleaderboard;

        // top 10 login leaderboards last week
        require("connect.php");
        $logleaderboard = array();
        if ($stmt = mysqli_prepare($link, "SELECT netid, count(*) as logins FROM Sessions where machine = ? and date(timestamp) > subdate(curdate(), 7) group by netid order by logins desc limit 10;")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            $loginleader = $stmt->get_result();
            while($tuple = mysqli_fetch_array($loginleader, MYSQL_NUM)) {
                $logleaderboard[] = $tuple;
            }
            $stmt->close();
        }
        $array["logleader"] = $logleaderboard;


        // top 10 commands leaderboards last week
        require("connect.php");
        $processleaderboard = array();
        if ($stmt = mysqli_prepare($link, "SELECT command, count(*) as cnt FROM Processes where machine = ? and date > subdate(curdate(), 7) group by netid order by cnt desc limit 10;")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            $procleader = $stmt->get_result();
            while($tuple = mysqli_fetch_array($procleader, MYSQL_NUM)) {
                $processleaderboard[] = $tuple;
            }
            $stmt->close();
        }
        $array["procleader"] = $processleaderboard;

        // top 10 cpu leaderboards last week
        require("connect.php");
        $cpuleaderboard = array();
        if ($stmt = mysqli_prepare($link, "SELECT date(timestamp), round(max(cpu_percentage), 2) as cpu FROM MachineSnapshots where name = ? and date(timestamp) > subdate(curdate(), 30) group by day(timestamp) order by cpu desc limit 10;")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            $cpuleader = $stmt->get_result();
            while($tuple = mysqli_fetch_array($cpuleader, MYSQL_NUM)) {
                $cpuleaderboard[] = $tuple;
            }
            $stmt->close();
        }
        $array["cpuleader"] = $cpuleaderboard;

        // GRAPHS
        // top 10 processes leaderboards last week
        require("connect.php");
        $avgprocesses = array();
        if ($stmt = mysqli_prepare($link, "SELECT dayofweek(date) as week, round(avg(cnt),2) FROM (SELECT date, count(*) as cnt from Processes where machine = ? group by date) pday group by week;")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            $averageproc = $stmt->get_result();
            while($tuple = mysqli_fetch_array($averageproc, MYSQL_NUM)) {
                $avgprocesses[] = $tuple[1];
            }
            $stmt->close();
        }
        $array["avgprocgraph"] = $avgprocesses;

        require("connect.php");
        $weekprocesses = array();
        if ($stmt = mysqli_prepare($link, "SELECT dayofweek(date) as week, round(avg(cnt),2) FROM (SELECT date, count(*) as cnt from Processes where machine = ? and date > subdate(curdate(),7) group by date) pday group by week;")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            $weekproc = $stmt->get_result();
            while($tuple = mysqli_fetch_array($weekproc, MYSQL_NUM)) {
                $weekprocesses[] = $tuple[1];
            }
            $stmt->close();
        }
        $array["weekprocgraph"] = $weekprocesses;

        require("connect.php");
        $avglogins = array();
        if ($stmt = mysqli_prepare($link, "SELECT dayofweek(timestamp) as weekday, round(avg(total_users),2) FROM MachineSnapshots where name = ? group by weekday;")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            $avglog = $stmt->get_result();
            while($tuple = mysqli_fetch_array($avglog, MYSQL_NUM)) {
                $avglogins[] = $tuple[1];
            }
            $stmt->close();
        }
        $array["avglogingraph"] = $avglogins;

        require("connect.php");
        $weeklogins = array();
        if ($stmt = mysqli_prepare($link, "SELECT dayofweek(timestamp) as weekday, round(avg(total_users),2) FROM MachineSnapshots where name = ? and date(timestamp) > subdate(curdate(), 7) group by weekday;")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            $weeklog = $stmt->get_result();
            while($tuple = mysqli_fetch_array($weeklog, MYSQL_NUM)) {
                $weeklogins[] = $tuple[1];
            }
            $stmt->close();
        }
        $array["weeklogingraph"] = $weeklogins;

        require("connect.php");
        $alltimecpu = array();
        if ($stmt = mysqli_prepare($link, "select dayofweek(timestamp)weekday, avg(cpu_percentage) FROM MachineSnapshots WHERE name = ? group by weekday")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            $cpu = $stmt->get_result();
            while($tuple = mysqli_fetch_array($cpu, MYSQL_NUM)) {
                $alltimecpu[] = $tuple[1];
            }
            $stmt->close();
        }
        $array["alltimecpugraph"] = $alltimecpu;

        require("connect.php");
        if ($stmt = mysqli_prepare($link, "select dayofweek(timestamp)weekday, avg(cpu_percentage) FROM MachineSnapshots WHERE name = ? and date(timestamp) > subdate(curdate(), 7) group by weekday")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            $wcpu = $stmt->get_result();
            while($tuple = mysqli_fetch_array($wcpu, MYSQL_NUM)) {
                $weekcpu[] = $tuple[1];
            }
            $stmt->close();
        }
        $array["weekcpugraph"] = $weekcpu;

        require("connect.php");
        if ($stmt = mysqli_prepare($link, "SELECT status, count(*) from(select Processes.netid, Processes.date, Domers.status from Processes  inner join Domers on Processes.netid=Domers.netid  where date < subdate(curdate(), 1) and status!='Graduate-' and machine = ?)a group by status order by status;")) {
            $stmt->bind_param('s', $stdnt_mchn);
            mysqli_stmt_execute($stmt);
            $process = $stmt->get_result();
            while($tuple = mysqli_fetch_array($process, MYSQL_NUM)) {
                $processes_donut[] = $tuple[1];
            }
            $stmt->close();
        }
        $array["processes_donut"] = $processes_donut;
        return $array;
    }
?>
