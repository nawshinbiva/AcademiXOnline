<?php
    require('sessionCheck.php');
    setcookie('username','',-10,'/');
    setcookie('password','',-10,'/');
    header("location:homeCtrl.php?goto=login");
?>