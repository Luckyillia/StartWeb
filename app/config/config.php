<?php

session_start();

$protocol = 'http://';
define ('PREFIX', '/ChatX/');
define ('BASE_URL', $protocol . $_SERVER['HTTP_HOST'] . PREFIX);
define ('PASS_SALT', 'xyz234@');