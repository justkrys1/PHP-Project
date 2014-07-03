<?php

$to = 'justkrys1@yahoo.com';

//$to = @email
$subject = 'Response from Pure Fishing';
$message = 'Thankyou for your question!';
$headers = 'From: krys@purefishing.com.' . "\r\n"; //. 'bcc: dave.jones@scc.spokane.edu' . "\r\n" ;
mail( $to, $subject,$message, $headers );
//mail( $email, '', $message );
