<?php
$link = mysqli_connect('localhost', 'cgiuffri', 'Vantage2017') or die('Could not connect: ' . mysql_error());
mysqli_select_db($link, 'sqlsneverbetter') or die('Could not select database');
?>