<?php

include_once __DIR__."/../../functions.php";
include_once __DIR__."/../../dbConecttion.php";
include_once __DIR__."/../Action.php";
include_once __DIR__."/../../Model/ToDo/Item.php";


class Action_Todo_Update extends Action
{

    function updateItem($id, $newItem)
    {
        updateTodo($id, $newItem);
    }
}

$tstObj = new Action_Todo_Update();

$newItem = new Item();

$newItem->set_Id($_POST['id']);
$newItem->set_toDo($_POST['toDo']);
$newItem->set_endDate($_POST['endDate']);

$tstObj->updateItem($_POST['id'], $newItem);


?>