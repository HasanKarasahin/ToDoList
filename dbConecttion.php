<?php
include_once "db/Connection.php";
include_once "Model/ToDo/Item.php";

function addTodo(Item $data)
{
    try {
        $dbh = Connection::getInstance()->getConnection();

        $sql = " CALL `sp_AddTodo`(:prmTodo,:prmEndDate);";

        $stmt = $dbh->prepare($sql);

        $todo = $data->get_toDo();
        $endDate = $data->get_endDate();

        $stmt->bindParam(':prmTodo', $todo, PDO::PARAM_STR, 300);
        $stmt->bindParam(':prmEndDate', $endDate, PDO::PARAM_STR, 10);

        $stmt->execute();

        $stmt->closeCursor();

    } catch (PDOException $e) {
        die("Error occurred:" . $e->getMessage());
    }
    return null;
}

function getTodos($id=0,$searchData='NULL')
{
    try {
        $dbh = Connection::getInstance()->getConnection();

        $sql = " CALL `sp_GetTodos`(:prmId,:prmSearch);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':prmId', $id, PDO::PARAM_INT, 32);
        $stmt->bindParam(':prmSearch', $searchData, PDO::PARAM_STR, 10);
        $stmt->execute();

        $arr = array();
        $arrDb = $stmt->fetchAll();

        if($arrDb != '') {
            foreach ($arrDb as $row) {
                array_push($arr, array(
                    "id" => $row['id'],
                    "todo" => $row['todo'],
                    "createdDate" => $row['createdDate'],
                    "done" => $row['done'],
                    "endDate" => $row['endDate'],
                    "endDateFormat" => $row['endDateFormat']
                ));
            }
        }else{
            return false;
        }

        return $arr;

    } catch (PDOException $e) {
        print_r($e->getMessage());
        die("Error occurred:" . $e->getMessage());
    }
    return false;
}

function getTodo($id){

}

function deleteTodo($id)
{
    try {
        $dbh = Connection::getInstance()->getConnection();

        $sql = " CALL `tododb`.`sp_DeleteTodo`(:prmId);";

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':prmId', $id, PDO::PARAM_INT, 32);

        $stmt->execute();

        $stmt->closeCursor();
    } catch (PDOException $e) {
        print_r($e->getMessage());
        exit();
        die("Error occurred:" . $e->getMessage());
    }
    return null;
}

function updateTodo($id, Item $newData)
{
    try {
        $dbh = Connection::getInstance()->getConnection();

        $sql = " CALL `sp_UpdateTodo`(:prmId,:prmTodo,:prmEndDate);";

        $stmt = $dbh->prepare($sql);

        $todo = $newData->get_toDo();
        $endDate = $newData->get_endDate();

        $stmt->bindParam(':prmId', $id, PDO::PARAM_INT, 32);
        $stmt->bindParam(':prmTodo', $todo, PDO::PARAM_STR, 300);
        $stmt->bindParam(':prmEndDate', $endDate, PDO::PARAM_STR, 32);

        $stmt->execute();

        $stmt->closeCursor();
    } catch (PDOException $e) {
        print_r($e->getMessage());
        exit();
        die("Error occurred:" . $e->getMessage());
    }
    return null;
}


//$r = getTodos();
//print_r($r);
//exit();