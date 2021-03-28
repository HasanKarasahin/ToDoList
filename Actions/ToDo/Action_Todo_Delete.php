<?php

include_once "../../functions.php";
include_once "../../dbConecttion.php";
include_once "../ToDo/Action.php";


class Action_Todo_Delete extends Action {

    public $itemArr;
    public $item;

    function __construct() {
    }

    function deleteItem($id) {
        print_r($id);
        deleteTodo($id);
    }

}


//POST ILE GELSIN

$tstObj = new Action_Todo_Delete();

$tstObj->deleteItem($_POST["id"]);


?>