<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type');
class FromKeyToId extends controller
{
    public function __construct()
    {
        $data = json_decode(file_get_contents("php://input"));
        $this->model('Database');
        $crud = $this->model('user');
        $crud->FromKeyToId($data[0]);
    }
}
