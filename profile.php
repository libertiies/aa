<?php
session_start();
require_once 'connection.php';

if (!isset($_SESSION['userlogin'])) {
    header('Location: index.php');
}

$query = "SELECT id, user_name, email, question from form order by id";
$result = mysqli_query($con, $query);

if (isset($_SESSION['invalid'])) {
    echo "<script>window.addEventListener('load', function() { 
        alert('" . $_SESSION['invalid'] . "');
      }) </script>";
    unset($_SESSION['invalid']);
}

?>

<!DOCTYPE html>
<html lang "en">

<head>
    <meta charset "UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alegreya:wght@400;700&family=Lily+Script+One&family=Martel+Sans:wght@200&family=Montserrat:ital,wght@1,100&family=Nixie+One&family=Pinyon+Script&family=Raleway&display=swap"
        rel="stylesheet">

    <script src="https://kit.fontawesome.com/57bdca189b.js" crossorigin="anonymous"></script>
    <title>lb1 </title>
</head>

<body>

    <header class="header">
        <div class="container">
            <div class="header_inner">
                <a href='index.php#header' class="logo" alt="logo">
                    <img src="assets/images/logo/logooo.png">
                </a>
                <div class="header__burger"><span></span></div>

                <nav class="header__menu">
                    <ul class="header__list">

                        <li><a class="header__link" href="index.php#header">Welcome</a></li>
                        <li><a class="header__link" href="index.php#info">Info</a></li>
                        <li><a class="header__link" href="index.php#menu">Menu</a></li>
                        <li><a class="header__link" href="index.php#contact">Contacts</a></li>

                        <?php if (isset($_SESSION['userlogin'])) { ?>
                            <a href="profile.php">
                                <li><button class="openModal a"><img src="assets/images/logo/person.png">
                                    </button>
                                </li>
                            </a>
                        <?php } else { ?>
                            <li><button class="openModal" id="openModal"><img src="assets/images/logo/person.png"></li>
                        <?php } ?>

                        <?php if (isset($_SESSION['userlogin'])) { ?>
                            <a href="logout.php"><button class="openModal" id="openModal"><img
                                        src="assets/images/logo/door_icon.png"></button></a>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="intro">

        <div class="profile" style='Overflow-x:none; Overflow-y:none;' id="UsersInf">
            <h1 class="intro_title prof-title">
                Profile information
            </h1>

            <h2 class="intro_subtitle prof"><br>Login:<br>
                <?php if (isset($_SESSION['userlogin'])) {
                    echo ($_SESSION['userlogin']);
                } ?>
            </h2>
            <h2 class="intro_subtitle prof">Email:<br>
                <?php if (isset($_SESSION['useremail'])) {
                    echo ($_SESSION['useremail']);
                } ?>
            </h2>

            <h2 class="intro_subtitle prof">Password:<br>
                <?php if (isset($_SESSION['userpassword'])) {
                    echo ($_SESSION['userpassword']);
                } ?>
            </h2>

            <h2 class="intro_subtitle prof">Status:<br>
                <?php if (isset($_SESSION['status'])) {
                    if ($_SESSION['status']) {
                        echo ("Admin :)");
                    } else {
                        echo ("User :)");
                    }
                } ?>
            </h2>

            <?php if (isset($_SESSION['status'])) {
                if (!$_SESSION['status']) { ?>
                    <form action="code.php" method="post" class="radio_box">
                        <h1 style="color: white;font-family: 'Nixie One', cursive; font-size: 16px;">
                            <input style=' accent-color: #333;' type="radio" name="radio" id="radio1" value=1 /> 1 &nbsp;
                            <input style=' accent-color: #333;' type="radio" name="radio" id="radio2" value=2 /> 2 &nbsp;
                            <input style=' accent-color: #333;' type="radio" name="radio" id="radio3" value=3 /> 3 &nbsp;
                            <input style=' accent-color: #333;' type="radio" name="radio" id="radio4" value=4 /> 4 &nbsp;
                            <input style=' accent-color: #333;' type="radio" name="radio" id="radio5" checked value=5 /> 5 <br>
                        </h1>
                        <button style='margin-top:15px;' type="submit" class="openModal-adm intro_title prof-title-adm rate"
                            name="save_radio">
                            Add rating
                        </button>
                    </form>

                <?php }
            } ?>


            <?php if (isset($_SESSION['status'])) {
                if ($_SESSION['status']) { ?>
                    <button class="openModal-adm intro_title prof-title-adm" id="openUsersQue">
                        User`s questions
                    </button>
                    
                    <div class="profile adm" style = 'max-height: 700px; Overflow-x:none; Overflow-y:none;' id="UsersQue">
                        <h1 class="intro_title prof-title adma">
                            Welcome to Admin Panel,
                            <?php echo ($_SESSION['userlogin']) ?>
                        </h1>
                        <h1 class="" style ='color: white; 
                            font-size: 18px;
                            font-family: Playfair Display, serif;
                            margin-top: 16px;'>
                            User's questions
                        </h1>
                        <div class="scrollit">
                            <table>
                                <thead>
                                    <tr>
                                        <td>Id</td>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Question</td>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $form_selector = "SELECT * from form;";
                                    $result = mysqli_query($con, $form_selector);
                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['id'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['user_name'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['email'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['question'] ?>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                        <h1 class="" style ='color: white; 
                            font-size: 18px;
                            font-family: Playfair Display, serif;
                            margin-top: 16px;'>
                            User's accouts
                        </h1>
                            <div class="scrollit">
                                <table>
                                    <thead>
                                        <tr>
                                            <td>Id</td>
                                            <td>Login</td>
                                            <td>Email</td>
                                            <td>Status</td>
                                            <td>Rate</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $form_selector = "SELECT id,login,email,status,rate from account;";
                                        $result = mysqli_query($con, $form_selector);
                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row['id'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['login'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['email'] ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        if ($row['status']) {
                                                            echo ("Admin");
                                                        } else {
                                                            echo ("User");
                                                        }
                                                     ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        if ($row['status']) {
                                                            echo ("None");
                                                        } else {
                                                         echo $row['rate'];
                                                        }
                                                     ?>


                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                            <button class="openModal-adm intro_title prof-title-adm" id="closeUsersQue">
                                Profile information
                            </button>
                        </div>
                 <?php }
            } ?>

        </div>
    </div>


        <footer class="footer">
            <div class="container">
                <div class="box111">
                    <div class="col-1">
                        Contacts<br>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-facebook"></i>
                        <p>
                            123 45, YZ0 Road, BSK || Malmo, Sweden
                        </p>
                    </div>
                    <div class="col-3">
                        <img src="assets/images/logo/logo_dark.png" alt="">
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"> </script>
        <script src="assets/js/adm.js"></script>

</body>

</html>