<?php
class logout extends controller
{
    public function __construct()
    {
        $this->model('Database');
        $crud = $this->model('user');
        $crud->logout();
    }
}
