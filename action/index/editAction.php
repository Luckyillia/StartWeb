<?php
if (isset($_GET['id']))
{
    $sql = "SELECT * FROM users WHERE id=". (int) $_GET['id'];
    $result = $db->query($sql);
    $row = $result->fetch_assoc();

    $form['id'] = $row['id'];
    $form['name'] = $row['user_name'];
    $form['surname'] = $row['user_surname'];
    $form['email'] = $row['user_email'];
    $form['active'] = (int) $row['active'];
}