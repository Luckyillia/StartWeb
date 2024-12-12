<?php
if (!empty($_POST['id']))
{

	fieldRequired('Imię', $_POST['name']);
	fieldRequired('Nazwisko', $_POST['surname']);
	fieldRequired('E-mail', $_POST['email']);
	if(!$isError)
	{
		isEmail('E-mail', $_POST['email']);
	}
    if (isset($_POST['reset']))
    {
        fieldRequired('Hasło', $_POST['password']);
    }
	if (!$isError)
	{    
        $id = (int) $_POST['id'];
        $active = isset($_POST['active']) ? 1 : 0;
        $query = "UPDATE users SET user_name = '{$_POST['name']}', user_surname = '{$_POST['surname']}', user_email = '{$_POST['email']}', active = $active  WHERE id = $id";
        
        if ($db->query($query))
        {
            $_SESSION['message']['success'] = 'Git';
            redirect('?page=index&action=users');
        }
        else
        {
            $_SESSION['message']['warning'] = 'DB';
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
    $form['active'] = (int) $row['active'];
}