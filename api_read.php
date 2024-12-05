<?php


header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");

include("config/config.php");

$c1 = new Config();

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $res = $c1->selectDatabase();
    $arr = [];
    while ($data = mysqli_fetch_assoc($res)) {
        array_push($arr, $data);
    }
} else {
    $arr['err'] = "Only GET method is allowed !!";
}



echo json_encode($arr);
?>