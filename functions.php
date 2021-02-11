<?php 

function getDataFromJsonFile($jsonFileName){
    $filename = '../../assets/jsonfiles/'.$jsonFileName;
    $json_b = array('sonuc'=>-1);
    
    if(file_exists($filename)){
        $string = file_get_contents($filename);
        return json_decode($string, true);
    }
    return $json_b;
}

function setJsonFile($jsonFileName,$data){
    $filename = '../../assets/jsonfiles/'.$jsonFileName;
    if(file_exists($filename)){
        file_put_contents($filename, json_encode($data));
        return true;
    }else{
        return false;
    }
}

function getButtonsViews($itemId,$arrButtons){

    //degişkeni daha iyi yere konumlandır.
    $arrButtonsView=array('update'=>"<button type='button' class='btn btn-secondary btn-update' data-item-id=".$itemId.">Update</button>",
                          'delete'=>"<button type='button' class='btn btn-danger btn-delete' data-item-id=".$itemId.">Delete</button>");

    $temp="";                      
    foreach ($arrButtons as $key => $value) {
        $temp .= $arrButtonsView[$arrButtons[$key]];
    }    
    return $temp;
}



?>