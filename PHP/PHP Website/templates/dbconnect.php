<?php
$connection = new mysqli( 'articles.justkrys1.com',//host
    'kryrag', //user name
    'priscilla4520', //password
    'php_articles'); //database name

if( $connection->errno){
    die( "Unable to connect to database: $connection =>error");
}