<?php

class Publisher {
   private $name;
   private $address;
   private $contactInfo; 

   //ctor
   public function __construct(&$name, &$address, &$contactInfo){
        $this->name = $name;
        $this->address = $address;
        $this->contactInfo = $contactInfo;
   }

   //getters and setters

   public function getName() {
       return $this->name;
   }
   public function getAddress() {
       return $this->address;
   }
   public function getContactInfo() {
       return $this->contactInfo;
   }

   public function setName($name) {
       $this->name = $name;
   }
   public function setAddress($address) {
       $this->address = $address;
   }
   public function setContactInfo($contactInfo) {
       $this->contactInfo = $contactInfo;
   }
}

?>
