<?php
class data extends controller{
    public function __construct()
    {
        $this->model('Database');
        $readperson = $this->model('crud');
        $this->senddata('data', ['readperson' => $readperson->readperson()]);
    }
}