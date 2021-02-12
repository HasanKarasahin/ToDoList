<?php
include_once "../../functions.php";
include_once "../ToDo/Action.php";
include_once "../../Model/ToDo/Item.php";


class Action_Todo_Add extends Action {
  
    function addItem($item) {
      $json_a = getDataFromJsonFile("db.json");
      $item->set_Id(count($json_a['list'])+1);
      array_push($json_a['list'],(Array)($item));
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
  $tstObj->display("<tr> <td> ".$item->get_Id()." </td> <td> ".$item->get_toDo()."</td> <td> 17.03.1996 </td> <td> ".$item->get_endDate()." </td> <td> Yapılmadı </td> <td> ".getButtonsViews($item->get_Id(),['delete'])." </td>");

?>