<?php

$protocol = 'http://';
define ('PREFIX', '/StartWebillia/');
define ('BASE_URL', $protocol . $_SERVER['HTTP_HOST'] . PREFIX);
define ('PASS_SALT', 'xyz234@');
define ('UPLOAD_PATH', dirname(dirname(dirname(__FILE__))) .DIRECTORY_SEPARATOR . 'upload');