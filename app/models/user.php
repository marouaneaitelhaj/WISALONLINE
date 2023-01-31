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
                $cookie_name = "user";
                $cookie_value = $value1;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            } else {
                // echo "la";
            }
        }
    }
    public function signup($value1, $value2)
    {
        $conn = $this->conn;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $uniqid = uniqid();
        $stmt = $conn->prepare("INSERT INTO `clients`(`nom`, `numéro_tel`, `reference`) VALUES ('$value1','$value2', '$uniqid')");
        $stmt->execute();
    }
    public function logout(){
        unset($_COOKIE["user"]);
        setcookie("user", "", time() - 3600, "/");
        echo "done";
    }
}
