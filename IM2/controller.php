<?php
  require_once "./database.php";

  class baseController extends Database{
    public function __construct()
    {
        parent::__construct();
    }

    public function getErrMsg(){
        return parent::getErrMsg();
    }
    public function getState(){
        return parent::getState();
    }
    public function getDb(){
        return parent::getDb();
    }
  }

?>