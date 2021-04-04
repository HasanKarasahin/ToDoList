<?php
include_once __DIR__."/../../functions.php";
include_once __DIR__."/../../dbConecttion.php";
include_once __DIR__."/../Action.php";
include_once __DIR__."/../../Model/ToDo/Item.php";


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