<?php
include_once "../../functions.php";
include_once "../../dbConecttion.php";
include_once "../ToDo/Action.php";
include_once "../../Model/ToDo/Item.php";


class Action_Todo_Add extends Action
{

    function addItem($item)
    {
        addTodo($item);
    }
}

$item = new Item();

$item->set_toDo($_POST['toDo']);
$item->set_endDate($_POST['endDate']);

$tstObj = new Action_Todo_Add();
$tstObj->addItem($item);
header('Location: /ToDoList');

?>