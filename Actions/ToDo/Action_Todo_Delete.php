<?php

include_once __DIR__."/../../functions.php";
include_once __DIR__."/../../dbConecttion.php";
include_once __DIR__."/../Action.php";


class Action_Todo_Delete extends Action
{

    public $itemArr;
    public $item;

    function __construct()
    {
    }

    function deleteItem($id)
    {
        deleteTodo($id);
    }

}


//POST ILE GELSIN

$tstObj = new Action_Todo_Delete();

//$tstObj->deleteItem($_POST["id"]);
$tstObj->deleteItem($_POST["id"]);


?>