<?php

use LDAP\Result;

use function PHPSTORM_META\sql_injection_subst;

class CRUDappointments extends Database
{
    public function Cappointments($value1, $value2, $value3,$value4)
    {
        $conn = $this->conn;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("INSERT INTO `appointments`(`client_id`,`jour`, `heure`, `statut`,`date`) VALUES ($value3,'$value1','$value2','waiting','$value4')");
        $stmt->execute();
    }
    public function Rappointments()
    {
        $conn = $this->conn;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT heure , jour, date  FROM appointments");
        $stmt->execute();
        $result = $stmt->fetchAll();
        echo json_encode($result);
    }
    public function RRappointments($value1)
    {
        $conn = $this->conn;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT *  FROM appointments where client_id='$value1'");
        $stmt->execute();
        $result = $stmt->fetchAll();
        echo json_encode($result);
    }
    
    public function Uappointments($value1, $value2, $value3, $value4)
    {
        $conn = $this->conn;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("UPDATE `appointments` SET `client_id`='$value1',`jour`='$value2',`heure`='$value3',`statut`='$value4'");
        $stmt->execute();
    }
    public function Dappointments($value1)
    {
        $conn = $this->conn;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("DELETE FROM `appointments` WHERE `id`=$value1");
        $stmt->execute();
    }
}
