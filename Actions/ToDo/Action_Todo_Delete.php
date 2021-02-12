<?php

include_once "../../functions.php";
include_once "../ToDo/Action.php";


class Action_Todo_Delete extends Action {

    public $itemArr;
    public $item;

    function __construct() {
    }

    function deleteItem($id) {
        $json_a = getDataFromJsonFile("db.json");
        //unset($json_a['list'][$id]);
        setJsonFile('db.json',$json_a);
    }

    function updateItem($id) {
        $json_a = getDataFromJsonFile("db.json");


        foreach ($json_a['list'] as $key => $value) {
            if(1==$json_a['list'][$key]['status']){
                $json_a['list'][$key]['status']="0";
               break;
            }
        }

        setJsonFile('db.json',$json_a);
      }

}


//POST ILE GELSIN

$tstObj = new Action_Todo_Delete();

$tstObj->updateItem($_POST["id"]);


?>