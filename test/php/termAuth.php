<?php
session_start();
include_once 'preinstall.php';
include_once 'user.php';

$errors = [];
$message;

if (!preg_match('/[A-Za-z0-9]{6,}/', $_POST['login']) || !preg_match('/[A-Za-z0-9]{6,}/', $_POST['password'])){
    $errors[] = ['text' => "Логин или пароль не верный!"];
    echo json_encode(['errors' => $errors, 'message' => $message]);
} 
else {
    try{
        $user = new User();
        $file = file_get_contents('../json/data.json');
        $users = json_decode($file, true) ?? [];
        unset($file);
        $user = null;
    
        foreach($users as $item) {
            if($_POST['login'] == $item["login"] && md5($_POST['password']) == $item["password"]){
                $user = $item;
            }
        }
        if(!$user) {
            $errors[] = ['text' => "Логин или пароль не верный!"];
            echo json_encode(['errors' => $errors, 'message' => $message]);
            return;
        }
        $_SESSION["user"] = $user;

        $preset = new preinstall ('../json/data.json');

        $message = 'Успех!';
        echo json_encode(['errors' => $errors, 'message' => $message]);
    }
    catch(Exception $ex) {
        $errors[] = [$ex];
        exit('Ошибка записи');
    }
}