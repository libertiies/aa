<?php
session_start();
require_once 'connection.php';

//  echo("Connection successful");

$user_name;
$email;
$question;
$terms = filter_input(INPUT_POST, "terms", FILTER_VALIDATE_BOOL);

if (isset($_POST['submit'])) {

    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $question = $_POST['question'];

   
        $query = "INSERT INTO form VALUES('','$user_name','$email','$question','')";
    

    mysqli_query($con, $query);
    $check_query = "SELECT * FROM form WHERE user_name = '$user_name' and email = '$email' and question = '$question'";

    $result_check = mysqli_query($con, $check_query);
    $count = mysqli_num_rows($result_check);
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'swe3t.bakery@gmail.com';
$mail->Password = 'tauicpsopzbvccpw';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('swe3t.bakery@gmail.com');
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = 'Thanks for your question';
$mail->Body = 'Hello,'.$user_name.', we`ll answer your question with great pleasure! <br> Your question: '.$question;
$mail->send();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Form</title>

</head>

<body>
    <section class="section-cont form_succesful">
        <?php
        if (isset($user_name)) { ?>
            <img class="war_logo" src="assets/images/form_contact_us/success.png" alt="">
            <p class="section_title form--status">Congratulation!</p>
            <h2 class="section_title form--info">
                Hi,
                <?php echo $user_name ?>.
                Your request has been sent! Thanks for the feedback :&#10099;
            </h2>
        <?php

        } else { ?>
            <img class="war_logo" src="assets/images/form_contact_us/wrning.png" alt="">
            <h2 class="section_title form--status">
                Oops! Something went wrong.
            </h2>
            <h3 class="section_title form--info">
                We couldn`t record your question. Please try again!
            </h3>
        <?php }

        ?>

        </div>
        <a href="index.php" class="btn btn--succes">
            Return to previous page
        </a>
        </div>
    </section>


</body>

</html>