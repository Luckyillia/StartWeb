<?php
require('app/config/db.php');

$userName = 'lucky';
$userSurname = 'lucky';
$email = 'a@a.a';
$password = md5('illia');

$sql = "INSERT INTO users (user_name,user_surname, user_email, user_password, active) VALUES ('$userName','$userSurname', '$email', '$password', 1)";

if (mysqli_query($db, $sql)) {
    echo 'Uzytkownik dodany!';
} else {
    echo 'Error: ' . mysqli_error($db);
}
?>
