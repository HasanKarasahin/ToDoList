<?php

include_once __DIR__."/../../functions.php";
include_once __DIR__."/../../dbConecttion.php";

$data = getTodos();
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
}


?>