<?php
include_once "../../functions.php";
include_once "../ToDo/Action.php";
include_once "../../Model/ToDo/Item.php";


class Action_Todo_Add extends Action {
    public $itemArr;
    public $item;
  
    function addItem($item) {
      $json_a = getDataFromJsonFile("db.json");
      $item->set_Id();
      array_push($json_a['list'],(Array)($this->item));
      setJsonFile('db.json',$json_a);
    }

    function createTr(){
        return null;
    }
  }

  $item = new Item();

  $item->set_toDo($_POST['toDo']);
  $item->set_endDate($_POST['endDate']);

  $tstObj = new Action_Todo_Add();
  $tstObj->addItem($item);
  $tstObj->display("<tr> <td> 1 </td> <td> ".$item->get_toDo()."</td> <td> 17.03.1996 </td> <td> ".$item->get_endDate()." </td> <td> Yapılmadı </td>");

?>