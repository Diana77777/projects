<?php
include_once 'user.php';

class preinstall
{
    private $path;

    public function getPath()
    {
        return $this->path;
    }
    
    public function __construct($jsonPath){
        $this->path = $jsonPath;
    }

    public function updateFile(User $user){
        $file = file_get_contents($this->getPath());
        $users = json_decode($file, true);        
        unset($file);     
        $users[] = $this->getOption($user);                     
        file_put_contents($this->getPath(), json_encode($users));  
    }


    public function getOption(User $user)
    {
        return [
            'name' => $user->getName(),
            'login' => $user->getLogin(), 
            'email' => $user->getMail(),
            'password' => $user->getPass(),
            'confirm_password' => $user->getConfirmPass(),

        ];
    }

    public function createUser(User $user){
        try{
            $file = file_get_contents($this->getPath());
            $users = json_decode($file, true) ?? [];
            unset($file);

            foreach($users as $item){
                if($user->getMail() == $item["email"] || $user->getLogin() == $item["login"]){
                    exit('Такой логин или почта уже существует');
                }
            }
            
            $this->updateFile($user);
        }
        catch(Exception $ex){
            exit('Ошибка записи');
        }
    }
}