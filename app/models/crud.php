<?php

use LDAP\Result;

use function PHPSTORM_META\sql_injection_subst;

class crud extends Database
{
    public $query;
    public function addperson($value1)
    {

        $sql = "INSERT INTO `person`(`name`) VALUES ('$value1[0]');";
        mysqli_query($this->conn, $sql);
        // print_r($value1[0]);
    }
    public function deleteperson($value1)
    {
        $sql = "DELETE FROM `person`  WHERE `name`='$value1[0]');";
        mysqli_query($this->conn, $sql);
        // print_r($value1[0]);
    }
    public function readperson()
    {
        $conn = $this->conn;
        $result = $conn->query("SELECT * FROM `person`");
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
}
