<?php

class controller
{
    public function model($model)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }
    public function api($view, $data = [])
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        ob_get_clean();
        ob_start();
    }
}
