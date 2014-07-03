<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pure Fishing</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/shared.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <style>
        #resizable { width: 150px; height: 150px; padding: 0.5em; }
        #resizable h4 { text-align: center; margin: 0; }
    </style>
    <script>
        $(function() {
            $( "#resizable" ).resizable();
        });
    </script>
</head>
<body>
<header>
<h1 id="header">Pure Fishing...<span id="logo">everything you need to catch the big one!</span></h1><br />
</header>

<?php
require 'templates/navigation.php';
?>
<section>