<?php

class Student2{

    private $id;
    private $name;
    private $lastname;
    private $cedula;
    private $age;

    public function __construct($id, $name, $lastname, $cedula, $age){
    $this->id = $id;
    $this->name = $name;
    $this->lastname = $lastname;
    $this->cedula = $cedula;
    $this->age = $age;
    }
    public function getId(){return $this->id;}
    public function getName(){return $this->name;}
    public function getLastname(){return $this->lastname;}
    public function getCedula(){return $this->cedula;}
    public function getAge(){return $this->age;}
    public function setId($id){$this->id = $id;}
    public function setName($name){$this->name = $name;}
    public function setLastname($lastname){$this->lastname = $lastname;}
    public function setCedula($cedula){$this->cedula = $cedula;}
    public function setAge($age){$this->age = $age;}









}