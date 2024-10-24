<?php
if (!$isError)
{
    $dbStatus = [];
    $password = md5(PASS_SALT . $_POST['password']);
    $query = "INSERT INTO users SET user_name = '{$_POST['name']}', 
    user_surname = '{$_POST['surname']}', user_email = '{$_POST['email']}', 
    user_password = '$password'";
    if ($db->query($query))
    {
        $dbStatus = ['status' => 'success', 'msg' => 'Data was inserted Successfully'];
    }
    else
    {
        $dbStatus = ['status' => 'warning', 'msg' => 'Data has not been inserted!'];
    }
}else{
    $form['name'] = $_POST['name'];
    $form['surname'] = $_POST['surname'];
    $form['email'] = $_POST['email'];
}
?>