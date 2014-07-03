<?php
session_start();
$_SESSION['username'] = null;
$_SESSION['admin'] = null;
header('Location: /index.php');