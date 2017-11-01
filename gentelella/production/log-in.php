<?php
require('connect.php');
if ($stmt = mysqli_prepare($link, "SELECT password, netid, first, last FROM users where email=?")) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt->bind_param("s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $db_password, $netid, $first, $last);
    mysqli_stmt_fetch($stmt);
    if($db_password == $password) {
        session_start();
        $_SESSION["netid"] = $netid;
        $_SESSION["first"] = $first;
        $_SESSION["last"] = $last;
        header('Location: ./index.php');
    }
    else {
        header('Location: ./login.html');
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}
?>