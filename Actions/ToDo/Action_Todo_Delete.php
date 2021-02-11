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
        unset($json_a['list'][$id]);
        setJsonFile('db.json',$json_a);
    }
}

$tstObj = new Action_Todo_Delete();

$tstObj->deleteItem(0);


?>