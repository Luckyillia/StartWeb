<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $active = isset($_POST['active']) ? 1 : 0;
    if(!empty($_POST['id'])){
        $update = "UPDATE users SET user_name='".$_POST['name']."', user_surname='".$_POST['surname']."', user_email='".$_POST['email']."', active=".$active." WHERE id=" . $_POST['id'];
        if ($db->query($update))
        {
            echo "<div class='border border-info bg-info bg-opacity-10 text-center rounded'>Uzytkownik zedytowany</div>";
            $_SESSION['message']['success'] = '';
            redirect('?page=index&action=users');
        }else{
            redirect('?page=index&action=edit&id=' . $_POST['id']);
        }
    }else{
        if (!$isError)
        {
            $dbStatus = [];
            $password = md5(PASS_SALT . $_POST['password']);
            $query = "INSERT INTO users SET user_name = '{$_POST['name']}', 
            user_surname = '{$_POST['surname']}', user_email = '{$_POST['email']}', 
            user_password = '$password'";
            if ($db->query($query))
            {
                $dbStatus = ['status' => 'success', 'msg' => 'Data was inserted Successfully'];
            }
            else
            {
                $dbStatus = ['status' => 'warning', 'msg' => 'Data has not been inserted!'];
            }

        }else{
            $form['name'] = $_POST['name'];
            $form['surname'] = $_POST['surname'];
            $form['email'] = $_POST['email'];
        }
    }
}