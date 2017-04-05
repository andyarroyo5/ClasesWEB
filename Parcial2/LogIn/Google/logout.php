<?php
session_start();
session_unset();
  $_SESSION['token'] = NULL;
//    $_SESSION['FULLNAME'] = NULL;
  //  $_SESSION['EMAIL'] =  NULL;
header("Location: index.php");        // you can enter home page here ( Eg : header("Location: " ."http://www.krizna.com/home.php");
?>
