<?php

//include_once "../Model.php";

class Item {
// Properties
public $id;
public $toDo;
public $createdTime;
public $endDate;
public $status;

function __construct() {
    $this->createdTime=getdate();
    $this->status='1';
}

// Methods
function set_id($id) {
  $this->id = $id;
}
function get_id() {
  return $this->id;
}

  function set_toDo($toDo) {
    $this->toDo = $toDo;
  }
  function get_toDo() {
    return $this->toDo;
  }

  function get_createdTime() {
    return $this->createdTime;
  }

  function set_endDate($endDate) {
    $this->endDate = $endDate;
  }
  function get_endDate() {
    return $this->endDate;
  }

  function set_status($status) {
    $this->status = $status;
  }
  function get_status() {
    return $this->status;
  }
}


?>