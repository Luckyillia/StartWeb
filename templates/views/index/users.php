<?php
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
?>
<section>
	<?php include ('templates/list.html.php'); ?>
</section>