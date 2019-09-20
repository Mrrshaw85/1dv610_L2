<?php
  require_once('models/LoginModel.php');

  class Controller {
    public $model;

    public function __construct() {
      $this->models = new Model();
    }
  }