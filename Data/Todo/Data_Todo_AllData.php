<?php

include_once "../../functions.php";

$json_a = getDataFromJsonFile("db.json");

if(isset($json_a['sonuc']) && $json_a['sonuc']=-1){
    //TO-DO buraya error sayfasına gidiş eklenecek.
}else{
    $rowCount=1;
    $arrCount = count($json_a['list']);
    $arrViews=[];
    rsort($json_a['list']);
    foreach ($json_a['list'] as $key=>$value) {
        if($value['status']==1){
            array_push($arrViews,"<tr data-item-id=".$value['id']."> <td>". $rowCount ."</td> <td> ".$value['toDo']." </td> <td> ".$value['createdTime']." </td> <td> ".$value['endDate']." </td> <td> ".($value['done']==1?'Yapıldı':'Yapılmadı')." </td> <td> ".getButtonsViews($value['id'],['delete','update'])." </td> </tr>");
            $rowCount++;
        }
    }
    
    print_r($arrViews);
}

?>