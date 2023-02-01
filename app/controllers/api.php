<?php
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
class  api extends controller{
    public function Cavailability(){
        echo "kjsdhqjksd";
        $data = json_decode(file_get_contents("php://input"));
        $this->model('Database');
        $crud = $this->model('CRUDavailability');
        $crud->Cavailability($data[0],$data[1],$data[2],$data[3]);
    }
    public function Ravailability(){
        $this->model('Database');
        $crud = $this->model('CRUDavailability');
        $crud->Ravailability();
    }
    public function Uavailability(){
        $data = json_decode(file_get_contents("php://input"));
        $this->model('Database');
        $crud = $this->model('CRUDavailability');
        $crud->Uavailability($data[0],$data[1],$data[2]);
    }
    public function Davailability(){
        $data = json_decode(file_get_contents("php://input"));
        $this->model('Database');
        $crud = $this->model('CRUDavailability');
        $crud->Davailability($data[0]);
    }
    public function Cappointments(){
        $data = json_decode(file_get_contents("php://input"));
        $this->model('Database');
        $crud = $this->model('CRUDappointments');
        $crud->Cappointments($data[0],$data[1],$data[2],$data[3]);
    }
    public function Rappointments(){
        $this->model('Database');
        $crud = $this->model('CRUDappointments');
        $crud->Rappointments();
    }
    public function Uappointments(){
        $data = json_decode(file_get_contents("php://input"));
        $this->model('Database');
        $crud = $this->model('CRUDappointments');
        $crud->Uappointments($data[0],$data[1],$data[2]);
    }
    public function Dappointments(){
        $data = json_decode(file_get_contents("php://input"));
        $this->model('Database');
        $crud = $this->model('CRUDappointments');
        $crud->Dappointments($data[0]);
    }
}