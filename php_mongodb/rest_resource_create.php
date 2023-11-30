<?php 

//required headers
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//include database file
include_once 'mongodb_config.php';

$collection = 'barang';

//DB connection
$db = new DbManager($collection);
$conn = $db->getConnection();


//insert record
$insert = $conn->insertOne($_POST);


//verify
if ($insert->getInsertedId()) {
    echo json_encode(
        array("message" => "Record successfully created")
    );
} else {
    echo json_encode(
        array("message" => "Error while creating record")
    );
}

?>