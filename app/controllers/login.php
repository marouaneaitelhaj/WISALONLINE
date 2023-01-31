<?php
class login extends controller
{
    public function __construct()
    {
        if (!isset($_COOKIE["user"])) {
            $data = json_decode(file_get_contents("php://input"));
            $this->model('Database');
            $crud = $this->model('user');
            $crud->login($data[0]);
        } else {
            var_dump($_COOKIE);
        }
    }
}
