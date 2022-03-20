<?php
include_once 'preinstall.php';

class User
{
    private $login;
    private $password;
    private $confirm_password;
    private $email;
    private $name;
    
    public function setLogin($v)
    {
        if($v == ""){
            throw new Exception('Введите имя!');
        }
        $this->login = $v;
    }

    public function setPass($v)
    {
        if($v == ""){
            throw new Exception('Введите пароль!');
        }

        $this->password = $v;
    }

    public function setConfirmPass($v)
    {
        if($v == ""){
            throw new Exception('Повторите введение пароля!');
        }

        $this->confirm_password = $v;
    }

    public function setMail($v)
    {
        if($v == ""){
            throw new Exception('Введите email!');
        }

        $this->email = $v;
    }

    public function setName($v)
    {
        if($v == ""){
            throw new Exception('Введите пароль!');
        }

        $this->name = $v;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPass()
    {
        return $this->password;
    }

    public function getConfirmPass()
    {
        return $this->confirm_password;
    }

    public function getMail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function save()
    {
        $preset = new preinstall ('../json/data.json');
        $preset->createUser($this);
    }
}