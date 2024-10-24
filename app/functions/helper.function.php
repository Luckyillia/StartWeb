<?php
function showStatusIcon($status){
    if($status){
        return'<i class="bi bi-check" style="font-size:20px;color:green;"></i>';
    }else{
        return'<i class="bi bi-dash" style="color:red;"></i>';
    }
}

function showMessage($messageType, $messageText)
{
    $html = '<div class="container">';
    switch ($messageType)
    {
        case 'success':
            $html .= '<div class="alert alert-success" role="alert">';
            break;
        case 'warning':
            $html .= '<div class="alert alert-warning" role="alert">';
            break;
        case 'info':
            $html .= '<div class="alert alert-primary" role="alert">';
            break;            

    }
    $html .= $messageText;
    $html .= '</div></div>';
    if (!empty($messageText) && !empty($messageType))
    {
        echo $html;
    }
}

function redirect($url){
    header('Location: '.$url,true,307);
    exit;
}
?>