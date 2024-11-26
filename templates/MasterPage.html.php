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