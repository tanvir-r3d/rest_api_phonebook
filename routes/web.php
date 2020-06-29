<?php

$router->post('/registration','RegistrationController@onRegister');
$router->post('/login','LoginController@onLogin');

$router->post('/insert',['middleware'=>'auth','uses'=>'PhoneBookController@onInsert']);
$router->post('/delete',['middleware'=>'auth','uses'=>'PhoneBookController@onDelete']);
$router->post('/select',['middleware'=>'auth','uses'=>'PhoneBookController@onSelect']);