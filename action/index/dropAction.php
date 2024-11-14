<?php
if(isset($_GET['action'])){
    $sql = "DELETE FROM users WHERE id=".$_GET['id'];
    if ($db->query($sql))
    {
        $_SESSION['message']['info'] = 'Uzytkownik usunienty';
    }else{
        $_SESSION['message']['warning'] = 'warning';
    }
    redirect('?page=index&action=users');
}
?> 