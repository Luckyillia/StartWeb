<?php
include('app/config/session.php');
require('app/config/config.php');
require('app/config/db.php');
require('app/functions/helper.function.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sql = "SELECT * FROM users WHERE user_email = '{$_POST['email']}'";
    $result = mysqli_query($db, $sql);
    $user = mysqli_fetch_assoc($result);
    if ($user) {
        if($user['active'] == '1'){
            $pass = md5($_POST['password']);
            if($user['user_password']==$pass){
                $_SESSION['user'] = $user['user_email'];
                redirect('index.php');
            }else{
                $_SESSION['message']['warning'] = 'Nie poprawny login lub haslo';
                redirect('index.php');
                exit;
            }
        }else{
            $_SESSION['message']['warning'] = 'Uzytkownik jest nie aktywny';
            redirect('index.php');
            exit;
        }
    } else {
        $_SESSION['message']['warning'] = 'Nie poprawny login lub haslo';
        redirect('index.php');
        exit;
    }
}
?>
