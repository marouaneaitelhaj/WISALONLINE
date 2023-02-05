<?php
class user extends Database
{
    public function login($value1)
    {
        $conn = $this->conn;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT reference FROM clients");
        $stmt->execute();
        $result = $stmt->fetchAll();
        for ($i = 0; $i < count($result); $i++) {
            if ($value1 == $result[$i]["reference"]) {
                die("1");
            } else {
                echo 0;
            }
        }
    }
    public function FromKeyToId($value1)
    {
        $conn = $this->conn;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT `id` FROM clients WHERE `reference`='$value1'");
        $stmt->execute();
        $result = $stmt->fetchAll();
        echo json_encode($result);
    }
    public function signup($value1, $value2)
    {
        $conn = $this->conn;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $uniqid = uniqid();
        $stmt = $conn->prepare("INSERT INTO `clients`(`nom`, `numéro_tel`, `reference`) VALUES ('$value1','$value2', '$uniqid')");
        $stmt->execute();
    }
    public function logout()
    {
        session_destroy();
    }
}
