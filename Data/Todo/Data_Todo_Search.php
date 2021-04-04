<?php

include_once __DIR__."/../../functions.php";
include_once __DIR__."/../../dbConecttion.php";

//header('Content-type: application/json');

$data = getTodos(0,$_POST['data']);
if($data!=false){
    $arrViews = array();
    $rowCount = 1;
    foreach ($data as $key => $value) {
        array_push($arrViews, "<tr data-item-id=" . $value['id'] . "> <td>" . $rowCount . "</td> <td> " . $value['todo'] . " </td> <td> " . $value['createdDate'] . " </td> <td> " . $value['endDate'] . " </td> <td> " . ($value['done'] == 1 ? 'Yapıldı' : 'Yapılmadı') . " </td> <td> " . getButtonsViews($value['id'], ['delete', 'update']) . " </td> </tr>");
        $rowCount++;
    }
    print_r($arrViews);
}else{
    print_r(json_encode("Data Yok"));
}

/*
if($data!=false){
    $arrViews = array();
    $rowCount = 1;
    foreach ($data as $key => $value) {
        array_push($arrViews, "<tr data-item-id=" . $value['id'] . "> <td>" . $rowCount . "</td> <td> " . $value['todo'] . " </td> <td> " . $value['createdDate'] . " </td> <td> " . $value['endDate'] . " </td> <td> " . ($value['done'] == 1 ? 'Yapıldı' : 'Yapılmadı') . " </td> <td> " . getButtonsViews($value['id'], ['delete', 'update']) . " </td> </tr>");
        $rowCount++;
    }
    print_r($arrViews);
}else{
    print_r("Data Yok");
}*/


?>