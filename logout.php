<?php
session_start();

//$_SESSION['user_is_logged_in'] = false;
session_destroy(); //unistavanje cele esije

header('Location: /index.php');
die;