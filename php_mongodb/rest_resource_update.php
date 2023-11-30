<?php 

//required headers
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//include database file
include_once 'mongodb_config.php';

$dbname ='toko';
$collections = 'barang';

//DB connection
$db = new DbManager($collections);
$conn = $db->getConnection();


// ['_id' => $_POST['_id']], ['$set' => [$_POST]]
$update = $conn->updateOne(['kode' => $_POST['kode']], ['$set' => ['nama' => $_POST['nama'],'harga' => $_POST['harga'] ] ]);

// var_dump($_POST);
// die();

//var_dump($conn->findOne(['_id' => new MongoDB\BSON\ObjectId("$mongoId")]));
//die();

//verify
if ($update->getModifiedCount()) {
    echo json_encode(
        array("message" => "Record successfully updated")
    );
} else {
    echo json_encode(
        array("message" => "Error while updating record")
    );
}
?>