<?php 

//required headers
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//include database file
include_once 'mongodb_config.php';

$dbname ='toko';
$collection = 'barang';

//DB connection
$db = new DbManager($collection);
$conn = $db->getConnection();


//insert record
$delete = $conn->deleteOne($_POST);


//verify
if ($delete->getDeletedCount()) {
    echo json_encode(
        array("message" => "Record successfully deleted")
    );
} else {
    echo json_encode(
        array("message" => "Error while deleting record")
    );
}

?>