<?php
    session_start();
    require_once 'connection.php';
        $login;
        $password;

        if(isset($_POST['submit-log'])) {
            $login = $_POST['log_login'];
            $password = $_POST['log_password'];
            
            $check_query_log = "SELECT * FROM account WHERE login = '$login' and password = '$password'";
       
            $result_check_log = mysqli_query($con,$check_query_log);
            $count_log = mysqli_num_rows($result_check_log);

            /*****/
            if($count_log > 0) {
            $user = mysqli_fetch_assoc($result_check_log);

            $_SESSION['userlogin'] = $user['login'];
            $_SESSION['useremail'] = $user['email'];
            $_SESSION['userpassword'] = $user['password'];
            $_SESSION['status'] = $user['status'];
           
            header('Location: profile.php');
            } else {
    
        $_SESSION['invalid'] ='Wrong login or password';
        header('Location: index.php');
    }
}