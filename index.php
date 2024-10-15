<?php

header('Content-Type: text/html; charset=UTF-8');

require('app/config/config.php');
require('app/config/db.php');
require('app/functions/validate.function.php');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{	
	fieldRequired('Imię', $_POST['name']);
	fieldRequired('Nazwisko', $_POST['surname']);
	fieldRequired('E-mail', $_POST['email']);
	if (!$isError)
	{	
		isEmail('E-mail', $_POST['email']);
	}

	if (!$isError)
	{	
		$password = md5(PASS_SALT . $_POST['password']);
		$query = "INSERT INTO users SET user_name = '{$_POST['name']}', user_surname = '{$_POST['surname']}', user_email = '{$_POST['email']}', user_password = '$password'";
		if ($db->query($query))
		{
			echo "<div class='border border-info bg-info bg-opacity-10 text-center rounded'>Data was inserted Successfully</div>";
		}
		else
		{
			echo "<div class='border border-info bg-info bg-opacity-10 text-center rounded'>Data has not been inserted!</div>";
		}
	}
}

if(isset($_GET['action'])){
	switch ($_GET['action']) {
		case 'edit':
				// $sql = "DELETE FROM users WHERE id=".$_GET['id'];
				// if($db->query($sql)){
					
				// }
				// break;
		case 'drop':
			$sql = "DELETE FROM users WHERE id=".$_GET['id'];
			if ($db->query($sql))
			{
				echo "<div class='border border-info bg-info bg-opacity-10 text-center rounded'>Uzytkownik usunienty</div>";
			}
			break;
		default:
			# code...
			break;
	}
}
$sql = "SELECT * FROM users ORDER BY id ASC";
$result = $db->query($sql);
?>


<!DOCTYPE html>
<html data-bs-theme="dark">
    <head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="stylesheet" href="assets/css/bootstrap.css"/>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="assets/css/bootstrap.rtl.css"/>
		<link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css"/>
	</head>
	
	<body>
		<br>
		<section>
			<?php include ('templates/form.html.php'); ?>
		</section>
		<br>
		<section>
			<?php include ('templates/list.html.php'); ?>
		</section>
	</body>
</html>
