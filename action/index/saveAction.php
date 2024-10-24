<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['id'])){
        $update = "UPDATE users SET user_name='".$_POST['name']."', user_surname='".$_POST['surname']."', user_email='".$_POST['email']."' WHERE id=" . $_POST['id'];
        if ($db->query($update))
        {
            echo "<div class='border border-info bg-info bg-opacity-10 text-center rounded'>Uzytkownik zedytowany</div>";
        }else{

        }
        redirect('?page=index&action=users');
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

if (isset($_GET['id']))
{
    $sql = "SELECT * FROM users WHERE id=". (int) $_GET['id'];
    $result = $db->query($sql);
    $row = $result->fetch_assoc();

    $form['id'] = $row['id'];
    $form['name'] = $row['user_name'];
    $form['surname'] = $row['user_surname'];
    $form['email'] = $row['user_email'];
}else{

}