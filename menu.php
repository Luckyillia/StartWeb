<?php
$menu = array(
    "Dashboard" => array ("page" => "index", "name" => "Pulpit"),
    'News' => array('page' => 'news', 'name' => 'News',
    'action' => array (
        0 => array ('action' => 'add', 'title' =>'Dodaj aktualność'),
        1 => array ('action' => 'list', 'title' =>'Lista aktualność')
        )
    ),
    "Users" => array ("page" => "user", "name" => "Użytkownicy", 
    'action'=> array(
        0 => array('action' => 'add', 'title' =>'Dodaj Użytkownika'),
        1 => array('action' => 'users', 'title' =>'Lista Użytkownika')
        )
    )
);