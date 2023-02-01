<?php
    header("Access-Control-Allow-Origin: *");
class signup extends controller{
    public function __construct(){
        $data = json_decode(file_get_contents("php://input"));
        $this->model('Database');
        $crud = $this->model('user');
        $crud->signup($data[0],$data[1]);
        var_dump($data);
    }
}