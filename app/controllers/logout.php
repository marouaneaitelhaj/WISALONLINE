<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type');
class logout extends controller
{
    public function __construct()
    {
        $this->model('Database');
        $crud = $this->model('user');
        $crud->logout();
    }
}
