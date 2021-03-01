<?php
include_once("model/Model.php");

class Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function insertdata()
    {
        $result = $this->model->insert_data();
        include 'view/signup.php';
    }

    public function userlogin()
    {
        $result = $this->model->login();
        include 'view/login.php';
    }
}
