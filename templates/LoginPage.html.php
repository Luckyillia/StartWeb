<!DOCTYPE html>
<html data-bs-theme="dark">
    <head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="stylesheet" href="assets/css/bootstrap.css"/>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="assets/css/bootstrap.rtl.css"/>
		<link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css"/>
        <link rel="stylesheet" href="assets/icon/font/bootstrap-icons.css">
        <link rel="stylesheet" href="assets/icon/font/bootstrap-icons.min.css">
        
	</head>
	
	<body>
		<main>
            <div class="container border border-primary bg-primary bg-opacity-10 border-3 rounded mx-auto p-2">
                <?php include('templates/messages.html.php'); ?>
                <form class="row g-2" action="login.php" method="post">
                    <legend class="text-center"><h1 class="align-center">Formularz logowania użytkownika</h1></legend>
                    <div class="col-md-12">
                        <input class="form-control" type="text" name="email" placeholder="Adres E-mail" value="<?php if(isset($form['surname'])): echo $form['email']; endif;?>">
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" type="password" name="password" placeholder="Hasło" require />
                    </div>                        
                    <dvi class="buttons">
                        <button class="btn btn-primary" type="submit" name="submit">Loguj</button>
                    </div>
                </form>
            </div>
        </main>
	</body>
</html>