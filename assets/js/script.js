/*jslint browser: true*/
/*global $,document*/
$(document).ready(function () {
    "use strict";
    $('.header__burger').click(function (event) { // eslint-disable-line no-unused-vars
        $('.header__burger, .header__menu, .header').toggleClass('active');
    });
});


var bannerStatus = 1;
var bannerTimer = 10000;

window.onload = function () {
    bannerLoop();
}

var startBannerLoop = setInterval(function () {
    bannerLoop();
}, bannerTimer);

document.getElementById("main-banner").onmouseleave = function () {
    startBannerLoop = setInterval(function () {
        bannerLoop();
    }, bannerTimer)
}
document.getElementById("main-banner").onmouseenter = function () {
    clearInterval(startBannerLoop);
}

function bannerLoop() {
    if (bannerStatus === 1) {
        document.getElementById("imgban2").style.opacity = "0";
        setTimeout(function () {
            document.getElementById("imgban1").style.right = "0px";
            document.getElementById("imgban1").style.zIndex = "2";

            document.getElementById("imgban2").style.right = "-300px";
            document.getElementById("imgban2").style.zIndex = "3";

            document.getElementById("imgban3").style.right = "300px";
            document.getElementById("imgban3").style.zIndex = "1";
        }, 500);
        setTimeout(function () {
            document.getElementById("imgban2").style.opacity = "1";
        }, 1000);

        bannerStatus = 2;
    }

    else if (bannerStatus === 2) {
        document.getElementById("imgban3").style.opacity = "0";
        setTimeout(function () {
            document.getElementById("imgban2").style.right = "0px";
            document.getElementById("imgban2").style.zIndex = "2";

            document.getElementById("imgban3").style.right = "-300px";
            document.getElementById("imgban3").style.zIndex = "3";

            document.getElementById("imgban1").style.right = "300px";
            document.getElementById("imgban1").style.zIndex = "1";
        }, 500);
        setTimeout(function () {
            document.getElementById("imgban3").style.opacity = "1";
        }, 1000);

        bannerStatus = 3;
    }
    else if (bannerStatus === 3) {
        document.getElementById("imgban1").style.opacity = "0";
        setTimeout(function () {
            document.getElementById("imgban3").style.right = "0px";
            document.getElementById("imgban3").style.zIndex = "2";

            document.getElementById("imgban1").style.right = "-300px";
            document.getElementById("imgban1").style.zIndex = "3";

            document.getElementById("imgban2").style.right = "300px";
            document.getElementById("imgban2").style.zIndex = "1";
        }, 500);
        setTimeout(function () {
            document.getElementById("imgban1").style.opacity = "1";
        }, 1000);

        bannerStatus = 1;
    }
}

const buttonOpenReg = document.getElementById('openModal');
const ModalElem = document.querySelector('.modal');
const linkOpenReg = document.getElementById('openModal_link');

linkOpenReg.addEventListener('click', () => {
    ModalElem.showModal();
})

buttonOpenReg.addEventListener('click', () => {
    ModalElem.showModal();
});

ModalElem.addEventListener('click', (e) => {
    if (e.target == ModalElem) ModalElem.close();
});



const signInBtn = document.getElementById('signInBtn');
const signUpBtn = document.getElementById('signUpBtn');

const formBox = document.getElementById('formBox');
const modalBlock = document.querySelector('.modal__block');

signUpBtn.addEventListener('click', function () {
    formBox.classList.add('active');
    modalBlock.classList.add('active');
    ModalElem.classList.add('active');
});

signInBtn.addEventListener('click', function () {
    ModalElem.classList.remove('active');
    formBox.classList.remove('active');
    modalBlock.classList.remove('active');
});


function formValidate(form) {
    let msg = '';
    let formReq = document.querySelectorAll(`._req[data-form="${form.name}"]`);
    let count = 0;
    let counttype = 0;
    let countpass = 0;

    for (index = 0; index < formReq.length; index++) {
        const input = formReq[index];
        input.classList.remove('_error');

        if (input.value === '') {
            input.classList.add('_error');
            if (count === 0) {
                msg += 'None of the fields must be empty<br>';
                count++;
            }
        } else {
            if (input.classList.contains('_email')) {
                if (emailtest(input)) {
                    input.classList.add('_error');
                    msg += 'Email must be in email format<br>';
                }
            }  else {
                    if (input.classList.contains('_checkbox')) {
                        if (input.checked === false) {
                            input.classList.add('_error');
                            msg += 'Agreement must be checked<br>';
                        }
                    } else {
                        if (input.hasAttribute("data-pass")) {
                            let pass = document.querySelectorAll(`[data-pass][data-form="${form.name}"]`);
                            if (pass[0].value !== pass[1].value) {
                                input.classList.add('_error');
                                if (countpass === 0) {
                                    msg += 'Passwords do not match<br>';
                                    countpass++;
                                }
                                pass[0].classList.add('_error');
                                pass[1].classList.add('_error');
                            if (pass[0].value < 5 || pass[0].value > 30) {
                                    if (counttype === 0) {
                                        msg += 'Password must be at least 5 characters<br>';
                                        counttype++
                                    }
                                    input.classList.add('_error');
                                }
                                if (pass[1].value < 5 || pass[1].value > 30) {
                                    if (counttype === 0) {
                                        msg += 'Password must be at least 5 characters<br>';
                                        counttype++
                                    }
                                    input.classList.add('_error');
                                }
                            }
                        } else {
                            if (input.hasAttribute("data-question")) {
                                if (input.value.length < 10 || input.value.length > 200) {
                                    input.classList.add('_error');
                                    msg += 'Question must be at least 10 characters<br>';
                                }
                            } else {
                                if (input.hasAttribute("enter_text")) {
                                    if (input.value.length < 5 || input.value.length > 30) {
                                        if (counttype === 0) {
                                            msg += 'Name, email, login and password must be at least 5 characters<br>';
                                            counttype++
                                        }
                                        input.classList.add('_error');
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    

    if (msg === '') {
        console.log("no error");
        return true;
    } else {
        const form_msg = document.querySelector(`.error_msg[data-form="${form.name}"]`);
        const input = document.querySelector(`.reg_input[data-form="${form.name}"]`);
        form_msg.innerHTML = msg;
        form_msg.style.display = 'block';
        if(msg >= 50){
            input.style.height = 10;
          }
          
        console.log("{}");
        return false;
    }
}

function emailtest(input) { return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value); }

function validatePhoneNumber(input) {
    return !/^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/.test(input); 
  }
