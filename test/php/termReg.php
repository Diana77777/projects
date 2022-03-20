<?php
include_once 'preinstall.php';

$errors = [];
$message;
if(strlen($_POST['password']) < 6 && strlen($_POST['confirm_password']) < 6){
    $errors[] = ['text' => "Укажите пароль! (более 6 символов)", 'name' => "password"];
}
if (!preg_match('/^[A-Za-z0-9-_]{2,}$/i', $_POST['login'])){
    $errors[] = ['text' => "Укажите логин (более 6 символов) или такой логин уже существует!", 'name' => "login"];
} 
if(!preg_match('/[A-Za-z0-9]/', $_POST['password'])){
    $errors[] = ['text' => "Пароль должен состоять из букв, цифр!", 'name' => "password"];
} 
if(!preg_match('/[A-Za-z0-9]{6,}/', $_POST['password']) || $_POST['confirm_password'] != $_POST['password']){
    $errors[] = ['text' => "Повторите пароль!", 'name' => "confirm_password"];
} 
if(!preg_match('/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i', $_POST['email'])){
    $errors[] = ['text' => "Укажите email или такой email уже существует!", 'name' => "e-mail"];
} 
if(!preg_match('/[A-Za-z]{2,}/', $_POST['name'])){
    $errors[] = ['text' => "Укажите имя! (более 2 символов)", 'name' => "name"];
}

if(count($errors) == 0){
    $user = new User();
    $user->setLogin($_POST['login']);
    $user->setPass(md5($_POST['password']));
    $user->setConfirmPass(md5($_POST['confirm_password']));
    $user->setMail($_POST['email']);
    $user->setName($_POST['name']);
    $user->save();

    $message = 'Успех!';
}

echo json_encode(['errors' => $errors, 'message' => $message]);