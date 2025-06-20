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
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <title>StartWeb</title>
	</head>
	
	<body>
        <?php
        $sql = "SELECT * FROM users WHERE user_email = '{$_SESSION['user']}'";
        $result = mysqli_query($db, $sql);
        $user = mysqli_fetch_assoc($result);
        if ($user) {
            $name = $user['user_name'];
            $surname = $user['user_surname'];
        }
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="./">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                <?php include('templates/menu.html.php');?>
                <span class="navbar-text m-2">
                    Witaj<?php echo ", ".$name." ".$surname; ?>
                </span>
                <a class="btn btn-primary m-2" href="./logout.php">Wyloguj</a>
                </div>
            </div>
        </nav>
		<main>
            <section class='content'>
                <?php
                    $page = isset($_GET['page'])?$_GET['page'] : 'index';
                    $action = isset($_GET['action'])?$_GET['action'] : 'index';
                    if(is_file($actionFile = 'action'. DIRECTORY_SEPARATOR . $page . DIRECTORY_SEPARATOR . $action .'Action.php')){
                        include($actionFile);
                        include('templates/messages.html.php');
                        if(is_file($viewFile = 'templates/views'. DIRECTORY_SEPARATOR . $page . DIRECTORY_SEPARATOR . $action .'.php')){
                            include($viewFile);
                        }
                    }else{
                        throw new Exception("Error Processing Request".$actionFile);
                    }
                ?>
            </section>  
        </main>
        <script defer src="assets/js/script.js"></script>
	</body>
</html>