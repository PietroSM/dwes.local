<?php

namespace dwes\app\entity;
use dwes\app\entity\IEntity;;

class Usuario implements IEntity{
    private $id;
    private $username;
    private $password;
    private $role;


    public function __construct(string $username="",string $password="", 
    string $role="")
    {
        $this->id = null;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }


    //Getters and Setters
    public function getId(){
        return $this->id;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPassword(){
        return $this->password;
    }
    public function getRole(){
        return $this->role;
    }


    public function setUsername($username){
        $this->username = $username;
        return $this;
    }

    public function setPassword($password){
        $this->password = $password;
        return $this;
    }
    public function setRole($role){
        $this->role = $role;
        return $this;
    }

    public function toArray(): array
    {
        return [$this->getUsername()];
    }
}