<?php
    session_start();
    require_once 'connection.php';
    $login;
    $email;
    $password;

    if (isset($_POST['submit-reg'])) {

        $login = $_POST['reg_login'];
        $email = $_POST['reg_email'];
        $password = $_POST['reg_password'];
        $check_query_reg = "SELECT * FROM account WHERE login = '$login'";
        
        $result_check_reg = mysqli_query($con, $check_query_reg);
        $count_reg = mysqli_num_rows($result_check_reg);
        if ($count_reg === 0) {
            $query_reg = "INSERT INTO account VALUES('','$login','$email','$password','',0)";
            mysqli_query($con, $query_reg);
            $result = mysqli_query($con, $check_query_reg);
            $user = mysqli_fetch_assoc($result);


            $_SESSION['userlogin'] = $user['login'];
            $_SESSION['useremail'] = $user['email'];
            $_SESSION['userpassword'] = $user['password'];
            $_SESSION['status'] = $user['status'];
            
            header('Location: profile.php');
        } else {
            $_SESSION['invalid'] = 'This login is already taken';
            header('Location: index.php');
        }
    }
?>