<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $isError = false;
    fieldRequired('Name',$_POST['name']);
    fieldRequired('Surname',$_POST['surname']);
    fieldRequired('E-mail',$_POST['email']);
    $password = md5($_POST['password']);
    $active = isset($_POST['active']) ? 1 : 0;
    if(!empty($_POST['id'])){
        $query = "UPDATE users SET user_name='".$_POST['name']."', user_surname='".$_POST['surname']."', user_email='".$_POST['email']."', active=".$active." WHERE id=" . $_POST['id'];
        $link = '?page=index&action=edit&id='.$_POST['id'];
    }else{  
        $query = "INSERT INTO users SET user_name = '{$_POST['name']}', user_surname = '{$_POST['surname']}', user_email = '{$_POST['email']}', user_password = '$password',active=$active";
        $link = '?page=index&action=add';
    }
    if (!$isError)
    {
        if ($db->query($query))
        {
            $_SESSION['message']['info'] = 'cos';
            redirect('?page=index&action=users');

        }else{
            $_SESSION['message']['warning'] = 'warning';
            redirect($link);
        }

    }else{
        $form['name'] = $_POST['name'];
        $form['surname'] = $_POST['surname'];
        $form['email'] = $_POST['email'];
        $form['active'] = $active;
        $_SESSION['message']['warning'] = 'cos';
        redirect($link);
    }
}