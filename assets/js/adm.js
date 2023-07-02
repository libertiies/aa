/*jslint browser: true*/
/*global $,document*/

const openUsersQue = document.getElementById('openUsersQue');
const UsersQue = document.getElementById('UsersQue');

const closeUsersQue = document.getElementById('closeUsersQue');
const UsersInf = document.getElementById('UsersInf');


            openUsersQue.addEventListener('click', ()=>{
            UsersQue.style.visibility = 'visible';
            UsersInf.style.visibility = 'hidden';
            UsersInf.style.transition = 'none';    
            UsersQue.style.transition = 'none';    
        });

        closeUsersQue.addEventListener('click', ()=>{
            UsersQue.style.visibility = 'hidden';
            UsersInf.style.visibility = 'visible';

        });
