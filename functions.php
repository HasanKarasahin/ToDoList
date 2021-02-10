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

?>