<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('phpmailer/src/Exception.php');
require_once('phpmailer/src/PHPMailer.php');
require_once('phpmailer/src/SMTP.php');
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
    public function signup($value1, $value2, $value3)
    {
        $conn = $this->conn;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $uniqid = uniqid();
        $stmt = $conn->prepare("INSERT INTO `clients`(`nom`, `numéro_tel`, `reference`, `email`) VALUES (:value1,:value2,:uniqid,:value3)");
        $stmt->bindParam(':value1', $value1);
        $stmt->bindParam(':value2', $value2);
        $stmt->bindParam(':uniqid', $uniqid);
        $stmt->bindParam(':value3', $value3);
        if ($stmt->execute()) {
            echo 'good';
        } else {
            echo 'bad';
        }

        // $stmt->execute();
        $email = new PHPMailer(true);
        $email->isSMTP();
        $email->Host = 'smtp.gmail.com';
        $email->SMTPAuth = true;
        $email->Username = 'marwane.opmi.00@gmail.com';
        $email->Password = 'puxqufrgetxrzhnd';
        $email->SMTPSecure = 'ssl';
        $email->Port = 465;
        $email->setFrom('marwane.opmi.00@gmail.com');
        $email->addAddress($value3);
        $email->Subject = 'Your Referance';
        $email->Body = 'Your Referance : ' . $uniqid;
        $email->send();
    }
    public function logout()
    {
        session_destroy();
    }
}
