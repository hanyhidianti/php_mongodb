<?php
require_once __DIR__ . '/vendor/autoload.php';
use MongoDB\Client;
use MongoDB\Driver\ServerApi;
// use MongoDB\Laravel\Eloquent\Casts\ObjectId
// use MongoDB\BSON\ObjectId;
class DbManager
{
    //Database Configuration
    private $dbhost = 'localhost';
    private $dbport = '27017';
    
    private $database = 'toko';
    private $conn;

    function __construct($collection){
        // membuat koneksi ke mogo server
       try {
        $client = new MongoDB\Client('mongodb://127.0.0.1:27017');
        $this->conn = $client->selectDatabase($this->database)->selectCollection($collection);
       } catch(Exception $e) {
            printf($e->getMessage());
       }
    }

    function getConnection()
    {
        return $this->conn;

    }
}


?>