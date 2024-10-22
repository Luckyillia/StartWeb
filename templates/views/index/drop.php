<?php
if(isset($_GET['action'])){
    $drop = false;
    $sql = "DELETE FROM users WHERE id=".$_GET['id'];
    if ($db->query($sql))
    {
        echo "<div class='border border-info bg-info bg-opacity-10 text-center rounded'>Uzytkownik usunienty</div>";
        $drop = true;
    }else{
        $drop = false;
    }
    redirect('?page=index&action=users&deleted='.$drop);
}
?>