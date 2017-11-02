<?php
session_start();
if (!isset($_SESSION["netid"], $_SESSION["first"], $_SESSION["last"], $_SESSION["email"], $_SESSION["phone"])) {
    header('Location: ./login.html');
}

?>