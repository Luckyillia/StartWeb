<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	fieldRequired('Imię', $_POST['name']);
	fieldRequired('Nazwisko', $_POST['surname']);
	fieldRequired('E-mail', $_POST['email']);
	fieldRequired('Hasło', $_POST['password']);
	if(!$isError)
	{
		isEmail('E-mail', $_POST['email']);
	}
	fieldRequired('Haslo', $_POST['password']);
	fieldRequired('Powt.Haslo', $_POST['password2']);
	if(!$isError)
	{
		isPassword($_POST['password'], $_POST['password2']);
	}
	if (!$isError)
	{	
		/* status Bool(true|false), msg String) */
		$dbStatus = [];
		$password = md5(PASS_SALT . $_POST['password']);
		$active = isset($_POST['active']) ? 1 : 0;
		$query = "INSERT INTO users SET user_name = '{$_POST['name']}', user_surname = '{$_POST['surname']}', user_email = '{$_POST['email']}', user_password = '$password',active=$active";
		if ($db->query($query))
        {
            $_SESSION['message']['success'] = 'Git';
			redirect('index.php?page=user&action=users');
        }
        else
        {
            $_SESSION['message']['warning'] = 'DB';
        }
	}
	else
	{
		$form['name'] = $_POST['name'];
		$form['surname'] = $_POST['surname'];
		$form['email'] = $_POST['email'];
	}
}
?>