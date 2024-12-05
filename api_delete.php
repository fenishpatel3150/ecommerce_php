<?php


header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json");

include("config/config.php");

$c1 = new Config();

if ($_SERVER['REQUEST_METHOD'] == "DELETE") {

    $res = file_get_contents("php://input");
    parse_str($res,$data);
    $id = $data["id"];
    $result = $c1->removeProduct($id);

    if($result)
    {
        $arr['status']='Product deleted Successfully !';
    }
    else{
        $arr['error']= 'failed to delete product !';
    }
} else {
    $arr['err'] = "Only DELETE method is allowed !!";
}



echo json_encode($arr);
?>