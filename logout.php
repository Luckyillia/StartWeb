<?php
include('app/config/session.php');
require('app/functions/helper.function.php');
unset($_SESSION);
session_destroy();
redirect('index.php');