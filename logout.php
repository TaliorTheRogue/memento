<?php
session_start();
$_SESSION['connected']=false;
header('location:index.php');
?>