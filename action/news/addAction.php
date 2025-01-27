<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (!file_exists(UPLOAD_PATH))
	{
		mkdir(UPLOAD_PATH, 0777);
	}

	fieldRequired('Tytuł', $_POST['title']);
	fieldRequired('Autor', $_POST['author']);
	fieldRequired('Treść', $_POST['text']);

	if($_FILES['image']['error'] != 0){
		fieldRequired('Image', '');
	}

	$tmp_name = $_FILES['image']['tmp_name'];
	$filetype = $_FILES['image']['type'];
	$allowedTypes = [
		'image/png' => '.png',
		'image/jpeg' => '.jpg',
		'image/gif' => '.gif'
	 ];
	if (!$isError && in_array($filetype, array_keys($allowedTypes)))
	{	
		$active = isset($_POST['active']) ? 1 : 0;
		$name = date("Y-m-d_H-i-s").$allowedTypes[$filetype];
		move_uploaded_file($tmp_name, UPLOAD_PATH."/".$name);
		$query = "INSERT INTO news SET news_filename = '{$name}', news_title = '{$_POST['title']}', news_author = '{$_POST['author']}', news_content = '{$_POST['text']}', news_publish_date = NOW(), news_active=$active";
		if ($db->query($query))
        {
            $_SESSION['message']['success'] = 'Git';
			redirect('index.php?page=news&action=list');
        }
        else
        {
            $_SESSION['message']['warning'] = 'DB';
        }
	}
	else
	{
		$form['title'] = $_POST['title'];
		$form['author'] = $_POST['author'];
		$form['text'] = $_POST['text'];
		if(!empty($_FILES['image']['type']) && !in_array($filetype, array_keys($allowedTypes))){
			$_SESSION['message']['warning'] = 'Nie poprawny typ pliku';
		}
	}
}
?>