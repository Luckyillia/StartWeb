<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $isError = false;
    fieldRequired('Name',$_POST['name']);
    fieldRequired('Surname',$_POST['surname']);
    fieldRequired('E-mail',$_POST['email']);
    $password = md5($_POST['password']);
    $password2 = md5($_POST['password2']);
    $active = isset($_POST['active']) ? 1 : 0;
    if(!empty($_POST['id'])){
        if($_POST['reset']){
            $query = "UPDATE users SET user_name='".$_POST['name']."', user_surname='".$_POST['surname']."', user_email='".$_POST['email']."', active=".$active.", user_password='$password' WHERE id=" . $_POST['id'];
        }else{
            $query = "UPDATE users SET user_name='".$_POST['name']."', user_surname='".$_POST['surname']."', user_email='".$_POST['email']."', active=".$active." WHERE id=" . $_POST['id'];
        }
        $link = '?page=index&action=edit&id='.$_POST['id'];
    }else{  
        $query = "INSERT INTO users SET user_name = '{$_POST['name']}', user_surname = '{$_POST['surname']}', user_email = '{$_POST['email']}', user_password = '$password',active=$active";
        $link = '?page=index&action=add';
    }
    if (!$isError)
    {
        if($password == $password2){
            if ($db->query($query))
            {
                $_SESSION['message']['success'] = 'Git';
                redirect('?page=index&action=users');
    
            }else{
                $_SESSION['message']['warning'] = 'DB';
                redirect($link);
            }
        }else{
            $_SESSION['message']['warning'] = 'Pass';
            redirect($link);
        }
        

    }else{
        $form['name'] = $_POST['name'];
        $form['surname'] = $_POST['surname'];
        $form['email'] = $_POST['email'];
        $form['active'] = $active;
        $_SESSION['message']['warning'] = 'Pole';
        redirect($link);
    }
}