<?php
if (!empty($_POST['id']))
{
    $id = (int) $_POST['id'];
    $active = isset($_POST['active']) ? 1 : 0;
    $password = md5($_POST['password']);
	fieldRequired('Imię', $_POST['name']);
	fieldRequired('Nazwisko', $_POST['surname']);
	fieldRequired('E-mail', $_POST['email']);
	if(!$isError)
	{
		isEmail('E-mail', $_POST['email']);
	}
    if($_POST['reset']){
        fieldRequired('Haslo', $_POST['password']);
        fieldRequired('Powt.Haslo', $_POST['password2']);
        if(!$isError)
        {
            isPassword($_POST['password'], $_POST['password2']);
        }
        $query = "UPDATE users SET user_name='".$_POST['name']."', user_surname='".$_POST['surname']."', user_email='".$_POST['email']."', active=".$active.", user_password='$password' WHERE id=" . $_POST['id'];
    }else{
        $query = "UPDATE users SET user_name='".$_POST['name']."', user_surname='".$_POST['surname']."', user_email='".$_POST['email']."', active=".$active." WHERE id=" . $_POST['id'];
    }
	if (!$isError)
	{   
        if ($db->query($query))
        {
            $_SESSION['message']['success'] = 'Git';
            redirect('?page=user&action=users');
        }
        else
        {
            $_SESSION['message']['warning'] = 'DB';
        }
    }else{
        $form = $_POST;
        $form['active'] = isset($_POST['active']) ? 1 : 0;
        $form['reset'] = isset($_POST['reset']) ? 1 : 0;
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
    $form['active'] = (int) $row['active'];
}