<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $active = isset($_POST['active']) ? 1 : 0;
    $update = "UPDATE users SET user_name='".$_POST['name']."', user_surname='".$_POST['surname']."', user_email='".$_POST['email']."', active=".$active." WHERE id=" . $_POST['id'];
    if ($db->query($update))
    {
        echo "<div class='border border-info bg-info bg-opacity-10 text-center rounded'>Uzytkownik zedytowany</div>";
    }else{

    }
    redirect('?page=index&action=users');
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
    $form['active'] = (int) $row['active'];
}