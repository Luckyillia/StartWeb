
<?php
header('Content-Type: text/html; charset=UTF-8');

include('app/config/session.php');
require('app/config/config.php');
require('app/config/db.php');
require('app/functions/validate.function.php');
require('app/functions/helper.function.php');
require('app/functions/displayTable.function.php');
require('templates/messages.html.php');
if(!isset($_SESSION['user'])) {
    include('templates/LoginPage.html.php');
}else{
    include('templates/MasterPage.html.php');
}

if(isset($_SESSION['message'])) {
    unset($_SESSION['message']);
}
?>
