<?php

?>
<section>
	<div class="container border border-primary bg-primary bg-opacity-10 border-3 rounded mx-auto p-2">
		<?php 
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
					echo "<div class='border border-success bg-success bg-opacity-10 text-center rounded'>Data was inserted Successfully</div>";
				}
				else
				{
					echo "<div class='border border-info bg-info bg-opacity-10 text-center rounded'>Data has not been inserted!</div>";
				}
			}
		}
		
		include ('templates/form.html.php'); ?>
	</div>
</section>