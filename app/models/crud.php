<?php

use LDAP\Result;

use function PHPSTORM_META\sql_injection_subst;

class crud extends Database
{
    public $query;
    public function addperson($value1)
    {
        $sql = "INSERT INTO `person`(`name`) VALUES ('$value1');";
        mysqli_query($this->conn,$sql);
        var_dump($sql);

    }
    public function readperson(){
        $pdo = $this->conn;
        // $sql = new PDO("SELECT * FROM `person`;");
        // // $result = $this->conn->prepare($sql);
        $sql = $pdo->prepare('SELECT * FROM `person`;');
        $sql->execute();
        $sql->fetch;
        // $sql->execute();
        return $sql;
    }
}
