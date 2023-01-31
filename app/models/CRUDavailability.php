<?php

use LDAP\Result;

use function PHPSTORM_META\sql_injection_subst;

class CRUDavailability extends Database
{
    public function Cavailability($value1, $value2, $value3, $value4)
    {
        $conn = $this->conn;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("INSERT INTO `availability`(`jour`,`heure_debut`, `heure_fin`) VALUES ('$value1','$value2','$value3')");
        $stmt->execute();
    }
    public function Ravailability()
    {
        $conn = $this->conn;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM availability");
        $stmt->execute();
        $result = $stmt->fetchAll();
        echo json_encode($result);
    }
    public function Uavailability($value1, $value2, $value3, $value4)
    {
        $conn = $this->conn;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("UPDATE `appointments` SET `jour`='$value1',`heure_debut`='$value2',`heure_fin`='$value3'");
        $stmt->execute();
    }
    public function Davailability($value1)
    {
        $conn = $this->conn;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("DELETE FROM `availability` WHERE `id`=$value1");
        $stmt->execute();
    }
}
