<?php
function showStatusIcon($status){
    if($row['active']){
        return'<i class="bi bi-check" style="font-size:20px;color:green;"></i>';
    }else{
        return'<i class="bi bi-dash" style="color:red;"></i>';
    }
}

function redirect($url){
    header('Location: '.$url,true,307);
    exit;
}
?>