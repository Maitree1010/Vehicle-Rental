<?php
session_start();


echo "<script>document.write(sessionStorage.getItem('vid'));</script>";

$date=DATE("d/M/Y");


echo $date,$time;

?>
