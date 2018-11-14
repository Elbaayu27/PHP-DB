<?php
session_start();
session_destroy();
// if(isset($_SESSION['user'])){
// 	unset($_SESSION['user']);
// } 
header('Location: Login2.php')
 ?> 