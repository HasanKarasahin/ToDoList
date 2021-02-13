<?php

include_once "../../functions.php";
include_once "../ToDo/Action.php";
include_once "../../Model/ToDo/Item.php";


class Action_Todo_Update extends Action {

    function updateItem($id,$newItem) {
        $json_a = getDataFromJsonFile("db.json");
        //$json_a['list'][$id]=$newItem;

        foreach ($json_a['list'] as $key => $value) {
          if($id==$json_a['list'][$key]['id']){
              $json_a['list'][$key]=$newItem;
             break;
          }
      }


        setJsonFile('db.json',$json_a);
      }
}

$tstObj = new Action_Todo_Update();

$newItem = new Item();

$newItem->set_Id($_POST['id']);
$newItem->set_toDo($_POST['toDo']);
$newItem->set_endDate($_POST['endDate']);

$tstObj->updateItem($_POST['id'],$newItem);


header('Location: /',true);



?>