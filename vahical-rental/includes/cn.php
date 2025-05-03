<?php
error_reporting(0);
    $host="localhost";
    $username="root";
    $db="vehicle";
    $pass='';
    $conn = mysqli_connect("$host", "$username", "$pass", "$db");
if (!$conn) {
    echo "not";
}
?>