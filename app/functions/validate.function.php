<?php


$isError = false;
$msg = [];

$arrErrors = [
    'required' => 'Pole %s% jest wymagane!',
	'email' => 'Adres E-mail w polu %s% jest niepoprawny!',
    'haslo' => 'Hasla sie roznia'
];

function fieldRequired($fieldName, $fieldVal)
{
    global $isError, $msg, $arrErrors;
    if (empty($fieldVal))
    {
        $isError = true;
        $msg[] = str_replace('%s%', $fieldName, $arrErrors['required']);
    }
}

function isEmail($fieldName, $fieldVal) {
    global $isError, $msg, $arrErrors;
    if (!filter_var($fieldVal, FILTER_VALIDATE_EMAIL)) {
        $isError = true;
        $msg[] = str_replace('%s%', $fieldName, $arrErrors['email']);
    }
}
function isPassword($fieldVal1, $fieldVal2){
    global $isError, $msg, $arrErrors;
    if(strcmp($fieldVal1, $fieldVal2)){
        $isError = true;
        $msg[] = $arrErrors['haslo'];
    }
}

function displayErrors()
{
    global $isError, $msg;
    if($isError)
    {
        $html = '<div class="border border-danger bg-danger bg-opacity-10 rounded"><ul class="text-color-danger">';
        foreach ($msg as $m)
        {
            $html .= '<li>' . $m . '</li>';
        }

        $html .= "</ul></div>";
        echo $html;
    }
    else
    {
        return null;
    }
}
?>