<?php

class User {
    private $ID;
    private $name;
    private $address;
    private $username;
    private $password;
    private $email;
    private $birthday;

    //ctor
    public function User(&$id, &$name, &$address, &$username, &$password, &$email, &$bd){
        $this->ID = $id;
        $this->name = $name;
        $this->address = $address;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->birthday = $bd;
    }
    //getters
    public function getID(){ return $this->ID; }
    public function getName(){ return $this->name; }
    public function getAddress() { return $this->address; }
    public function getUsername() { return $this->username; }
    public function getPassword() { return $this->password; }
    public function getEmail() { return $this->email; }
    public function getBirthString(){ return $this->birthday; }
    public function getBirthDate() { return $this->birthday; }
    //setters
    public function setID($id){ $this->ID = $id; }
    public function setName($n){ $this->name = $n; }
    public function setAddress($a){ $this->address = $a; }
    public function setUsername($un){ $this->username = $un; }
    public function setPassword($pw){ $this->password = $pw; }
    public function setEmail($e){ $this->email = $e; }
    public function setBirthDate($bd){ $this->birthday = $bd; }

    //add login
    //add register

}

?>
