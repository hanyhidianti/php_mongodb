<?php 

//required headers
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");

//include database file
include_once 'mongodb_config.php';

$dbname = 'toko';
$collection = 'barang';

//DB connection
$db = new DbManager($collection);
$conn = $db->getConnection();

$result = $conn->find([]);

foreach ($result as $barang) {
    echo $barang['nama'], "\n";
}

?>