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
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                    </li>
                </ul>
                <span class="navbar-text m-2">
                    Witaj<?php echo ", ".$name." ".$surname; ?>
                </span>
                <a class="btn btn-primary m-2" href="./logout.php">Wyloguj</a>
                </div>
            </div>
        </nav>
		<main>
            <?php
                $page = isset($_GET['page'])?$_GET['page'] : 'index';
                $action = isset($_GET['action'])?$_GET['action'] : 'index';
                if(is_file($actionFile = 'action'. DIRECTORY_SEPARATOR . $page . DIRECTORY_SEPARATOR . $action .'Action.php')){
                    include($actionFile);
                    if(is_file($viewFile = 'templates/views'. DIRECTORY_SEPARATOR . $page . DIRECTORY_SEPARATOR . $action .'.php')){
                        include($viewFile);
                    }
                }else{
                    throw new Exception("Error Processing Request".$actionFile);
                }
                exit;
            ?>    
        </main>
	</body>
</html>