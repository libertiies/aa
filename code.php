<?php
session_start();
require_once 'connection.php';

if(isset($_POST['save_radio'])){
        $rate = $_POST['radio'];
        $login = $_SESSION['userlogin'];

        $query = "Update account 
        set rate = '$rate'
        where login = '$login';";
        $result = mysqli_query($con, $query); 

        if($result){
        $_SESSION['invalid'] ='Thanks for you rate';
        header('Location: profile.php');}
        else{
        $_SESSION['invalid'] ='Some problem with inputing';
        header('Location: profile.php');
        }
    };
?>