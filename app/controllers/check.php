<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type');
class check extends controller{
    public function __construct(){
        $this->model('Database');
        var_dump($_SESSION);
    }
}