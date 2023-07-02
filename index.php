<?php
session_start();
require_once 'connection.php';

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
        <a href='#header' class="logo" alt="logo">
          <img src="assets/images/logo/logooo.png">
        </a>
        <div class="header__burger"><span></span></div>

        <nav class="header__menu">
          <ul class="header__list">

            <li><a class="header__link" href="#header">Welcome</a></li>
            <li><a class="header__link" href="#info">Info</a></li>
            <li><a class="header__link" href="#menu">Menu</a></li>
            <li><a class="header__link" href="#contact">Contacts</a></li>
            <?php if (isset($_SESSION['userlogin'])) { ?>
              <a href="profile.php">
                <li><button class="openModal"><img src="assets/images/logo/person.png">
                  </button>
                </li>
              </a>

            <?php } else { ?>
              <li><button class="openModal" id="openModal"><img src="assets/images/logo/person.png"></li>
            <?php } ?>

            <?php if (isset($_SESSION['userlogin'])) { ?>
              <a href="logout.php"><button class="openModal" id="logout"><img
                    src="assets/images/logo/door_icon.png"></button></a>
            <?php } ?>
          </ul>
        </nav>
      </div>
    </div>
  </header>


  <div class="intro" id="header">
    <div class="container">
      <div class="intro__inner">

        <h1 class="intro_title">
          Pastry with love
        </h1>

        <h2 class="intro_subtitle">We`re bringing you fresh ingredients every <br>day in ways you can`t resist.</h2>
        <a class="btn" href="#menu">Our menu</a>
      </div>
    </div>
  </div>


  <section class="section" id="info">
    <div class="container images">
      <div class="section_header">
        <h1 class="section_title">Art of cakes</h1>
        <h2 class="section_subtitle">We create delicious memories</h2>
        <h3 class="section_info">A bakery is not only a place where you can buy delicious pastries,<br> but also a place
          where you can feel the real vatmosphere of home comfort.<br> When you enter the bakery, you find yourself in a
          world of warmth and soulfulness.<br> There is always a special atmosphere in which everyone can feel at home.
        </h3>
        <div class="panel">
          <div class="h10">Chef cook</div>
          <div class="el_box">
            <div class="text_left">Benito</div>
            <div class="box"><img src='assets/images/img_box/img.png'></div>
            <div class="text_right">Gaspare</div>
          </div>
          <div class="text_box">
            <div class="l">"</div>
            
            <div class=".neon-text-wrap text_center"><br>Unique creations for unique<br> occasions.</div>
            <div class="r">"</div>
          </div>
        </div>
      </div>
      <div class="section_img">
        <div class="block_img">
          <div class="img_box">
            <img src="assets/images/img_box/img1.png" alt="">
          </div>
          <div class="img_box">
            <img src="assets/images/img_box/img2.png" alt="">
          </div>
          <div class="img_box">
            <img src="assets/images/img_box/img3.png" alt="">
          </div>
          <div class="img_box">
            <img src="assets/images/img_box/img4.jpg" alt="">
          </div>
          <div class="box5">
            <img src="assets/images/img_box/Vektor1.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="section menu" id="menu">
    <div class="container">
      <div class="parts">
        <div class="main-banner" id="main-banner">
          <div class="imgban" id="imgban3"></div>
          <div class="imgban" id="imgban2"></div>
          <div class="imgban" id="imgban1"></div>

        </div>
        <div class="description">

          <?php if (isset($_SESSION['userlogin'])) { ?>
            <h6 class="section_title col1">Hello,
              <?php echo ($_SESSION['userlogin']) ?>!!
            </h6>
            <h7 class="section_title menu--title"> &#9734;Glad to see you&#9734;</h7>
          <?php } else { ?>
            <button id="openModal_link" class="openModal section_title col">Create an account </button>
            <h7 class="section_title menu--title"> and get 50% discount on coffee and cocoa</h7>
          <?php } ?>

          <h6 class="section_info menu--info">
            Fresh pastries arrive at Sweet Bakery restaurants and shops from their own bakery every morning.
            On January 30, in all Sweet Bakery restaurants, croissants are available for order all day. When ordering
            any croissant, there is a 50% discount on organic coffee and farm cocoa on fermented baked milk, and until
            14:00, a glass of sparkling wine as a gift with the order from the breakfast menu!
            Start your day in a good mood!
          </h6>

          <div class="anim">
            <div class="bread">
              <img src="assets/images/animation/bread.png" alt="">
            </div>

            <div class="smoke-wrap">
              <img class="smoke" src="assets/images/animation/smoke1.png" alt="">
            </div>
            <div class="smoke-wrap">
              <img class="smoke2" src="assets/images/animation/smoke1.png" alt="">
            </div>
            <div class="smoke-wrap">
              <img class="smoke3" src="assets/images/animation/smoke1.png" alt="">
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="section-cont" id="contact">
    <div class="container">
      <div class="form-section">
        <div class="form__item1">
          <h2 class="section_title section_title--form">
            Contact us
          </h2>

          <form action="form.php" method="post" class="form" onsubmit="return formValidate(this);" name="contacts">

            <input name="user_name" type="user_name" class="form__input _req" placeholder="Your name*" enter_text
              data-form="contacts">

            <input name="email" type="text" class="form__input _req _email" placeholder="Email*" data-form="contacts">

            <textarea maxlength="200" placeholder="Question*" class="form__input form__input--textarea _req"
              data-question name="question" data-question data-form="contacts">
          </textarea>

            <div class="checkbox">
              <input id="formAgreement" name="terms_form" type="checkbox" class="checkbox__input _req _checkbox"
                data-form="contacts">

              <label for="formAgreement" class="section_info checkbox__label"><span>I agree to the <a
                    href="https://ru.wikipedia.org/wiki/%D0%A3%D1%81%D0%BB%D0%BE%D0%B2%D0%B8%D1%8F_%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D1%8C%D0%B7%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F">terms
                    and conditions</a>*</span>
            </div>

            <div class="error_msg" data-form="contacts"></div>

            <div class="btn-container">
              <button type="submit" name="submit" class="btn btn--form">
                Send
              </button>
            </div>
          </form>
        </div>

        <div class="form__item2">
          <h3 class="form__heading">
            Location
          </h3>

          <a href="https://goo.gl/maps/iNyrxKCyAN72jTZY6" class="form__link" target="_blank">Malmo,Sweden</a>

          <h3 class="form__heading">
            Contact number
          </h3>

          <a href="tel:+11 22 33 44" class="form__link" target="_blank">+11 22 33 44</a>

          <h3 class="form__heading">
            Michelin stars
          </h3>

          <a href="https://guide.michelin.com/en/restaurants" class="form__link" target="_blank">Sweet bakery
            &#9734;&#9734;&#9734; </a>
        </div>
      </div>
    </div>
  </section>


  <dialog class="modal" id="modal">
    <div class="modal__block">

      <section class="block__item block-item">
        <div class="modal__title">Already have an account?</div>
        <button class="modal__close mod-close" id="modal__close">&#10006;</button>
        <button class="block-item__btn signIn" id="signInBtn">
          sign in
        </button>
      </section>

      <section class="block__item block-item">
        <div class="modal__title">Don't have an account?</div>
        <button class="modal__close">&#10006;</button>
        <button class="block-item__btn signUp" id="signUpBtn">
          sign up
        </button>
      </section>
    </div>

    <div class="modal__form-box" id="formBox">

      <form action="sign_In.php" class="modal__form form_signIn" method="post" onsubmit="return formValidate(this)"
        name="login">

        <div class="modal__form_logo"> <img src="assets/images/logo/bread_logo.png" alt=""></div>
        <p>
        <h4 class="modal__title form-title">Sign in</h4>
        </p>
        <p>
        <h3 class="modal__title form-label">Username or email address</h3>
        <input type="text" class="form__input modal-input _req" placeholder="Login" name="log_login" data-form="login"
          enter_text>
        </p>
        <h3 class="modal__title form-label">Password</h3>
        <input type="password" class="form__input modal-input _req" placeholder="Password" name="log_password"
          data-form="login" enter_text>
        <p>
        <div class="error_msg" data-form="login"></div>

        <div class="modal__form_btn">
          <button type="submit" class="block-item__btn" name="submit-log">Sign in</button>
        </div>
        </p>
      </form>

      <form action="sign_Up.php" class="modal__form form_signUp" method="post" name="register"
        onsubmit="return formValidate(this)">

        <h4 class="modal__title form-title">Welcome</h4>


        <h3 class="modal__title form-label">Enter your login</h3>
        <input type="text" class="form__input modal-input reg_input _req" placeholder="Login" name="reg_login"
          data-form="register" enter_text>

        <h3 class="modal__title form-label">Email</h3>
        <input type="text" class="form__input modal-input reg_input _req _email" placeholder="Email" name="reg_email"
          data-form="register">

        <h3 class="modal__title form-label">Password</h3>
        <input type="password" enter_text class="form__input modal-input _req reg_input" placeholder="Password"
          name="reg_password" data-form="register" data-pass>

        <h3 class="modal__title form-label">Confirm the password</h3>
        <input type="password" enter_text class="form__input modal-input _req reg_input" placeholder="Password"
          name="reg_confirm_password" data-form="register" data-pass>
        <p>
        <div class="checkbox">
          <input id="formAgreement_reg" type="checkbox" name="terms_reg" class="checkbox__input _req _checkbox"
            data-form="register">

          <label for="formAgreement_reg" class="section_info checkbox__label reg"><span>I agree to the <a
                href="https://ru.wikipedia.org/wiki/%D0%A3%D1%81%D0%BB%D0%BE%D0%B2%D0%B8%D1%8F_%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D1%8C%D0%B7%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F">terms
              </a>*</span>
        </div>

        <div class="error_msg" data-form="register"></div>

        <div class="modal__form_btn">
          <button type="submit" class="block-item__btn" name="submit-reg">Sign up</button>
        </div>
        </p>
      </form>
    </div>
  </dialog>


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
  <script src="assets/js/script.js" defer></script>


</body>

</html>