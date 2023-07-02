<?php
    $con = mysqli_connect('localhost', 'root', '','bakery');
    if(mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_errno());
} 
?>