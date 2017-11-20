<?php

return array(
 
    'driver' => 'smtp',
 
    'host' => 'smtp.gmail.com',
 
    'port' => 587,
 
    'from' => array('address' => 'miha@vidakovic.si', 'name' => 'Awesome Laravel 4 Auth App'),
 
    'encryption' => 'tls',
 
    'username' => 'miha@vidakovic.si',
 
    'password' => 'herbi123',
 
    'sendmail' => '/usr/sbin/sendmail -bs',
 
    'pretend' => false,
 
);