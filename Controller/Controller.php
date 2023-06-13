<?php
include_once('Model/Model.php');

class Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function invoke()
    {
        if (isset($_GET['home'])) {
            $this->model->home();
        } else if (isset($_GET['users'])) {
            $this->model->users();
        } else if (isset($_GET['products'])) {
            $this->model->products();
        } else {
            $this->model->home();
        }
    }
}
