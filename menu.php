<?php
$menu = array(
    "Dashboard" => array ("page" => "index", "name" => "Pulpit"),
    "Users" => array ("page" => "user", "name" => "Użytkownicy", 
    'action'=> array(
        0 => array('action' => 'add', 'title' =>'Dodaj Użytkownika'),
        1 => array('action' => 'users', 'title' =>'Lista Użytkownika')
        )
    )
);
