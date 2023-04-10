<?php

class Admin extends User {
    //ctor
    public function Admin(&$id, &$n, &$a, &$un, &$pw, &$e, &$bd){
        parent::User($id, $n, $a, $un, $pw, $e, $bd);
    }

    public function addBookToInventory($b){
        //add code
    }

    public function removeBookFromInventory($b){
        //add code
    }

    public function modifyBookInInventory($b){
        //add code
    }

    public function removeUser($user){
        //add code
    }

}

?>

