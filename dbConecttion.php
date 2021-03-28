<?php
include_once "db/Connection.php";
include_once "Model/ToDo/Item.php";

function addTodo(Item $data) {
    try {
        $dbh = Connection::getInstance()->getConnection();

        $sql = " CALL `sp_AddTodo`(:todo,:endDate,@result);";

        $stmt = $dbh->prepare($sql);

        $todo = $data->get_toDo();
        $endDate = $data->get_endDate();

        $stmt->bindParam(':todo', $todo, PDO::PARAM_STR,32);
        $stmt->bindParam(':endDate', $endDate, PDO::PARAM_STR,10);

        $stmt->execute();

        $stmt->closeCursor();

        $row = $dbh->query("SELECT @result AS result")->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return $row !== false ? $row['result'] : null;
        }
    } catch (PDOException $e) {
        die("Error occurred:" . $e->getMessage());
    }
    return null;
}

function getTodos(){
    try {
        $dbh = Connection::getInstance()->getConnection();

        $sql="CALL `sp_GetTodos`();";
        $arr = array();

        foreach ($dbh->query($sql) as $row) {

            array_push($arr,array(
                "id"=>$row['id'],
                "todo"=>$row['todo'],
                "createdDate"=>$row['createdDate'],
                "done"=>$row['done'],
                "endDate"=>$row['endDate']
            ));

        }
        return $arr;

    } catch (PDOException $e) {
        print_r($e->getMessage());
        die("Error occurred:" . $e->getMessage());
    }
    return null;
}

function deleteTodo($id){
    try {
        $dbh = Connection::getInstance()->getConnection();

        $sql = " CALL `sp_DeleteTodo`(:id);";

        $stmt = $dbh->prepare($sql);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT,32);

        $stmt->execute();

        $stmt->closeCursor();
    } catch (PDOException $e) {
        print_r($e->getMessage());
        exit();
        die("Error occurred:" . $e->getMessage());
    }
    return null;
}

function updateTodo($id,Item $newData){
    try {
        $dbh = Connection::getInstance()->getConnection();

        $sql = " CALL `sp_UpdateTodo`(:id,:todo,:endDate);";

        $stmt = $dbh->prepare($sql);

        $todo=$newData->get_toDo();
        $endDate=$newData->get_endDate();

        $stmt->bindParam(':id', $id, PDO::PARAM_INT,32);
        $stmt->bindParam(':todo', $todo, PDO::PARAM_STR,32);
        $stmt->bindParam(':endDate', $endDate, PDO::PARAM_STR,32);

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