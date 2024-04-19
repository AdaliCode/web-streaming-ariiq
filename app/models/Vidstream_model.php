<?php
class Vidstream_model
{

    private $dbh; // database handler
    private $stmt;

    public function __construct()
    {
        // data source name
        $dsn = 'mysql:host=localhost;dbname=data_vidsstream_ariiq';

        try {
            $this->dbh = new PDO($dsn, 'root', ''); // handler PDO
        } catch (PDOException $e) {
            //throw $th;
            die($e->getMessage());
        }
    }

    public function getAllvideos()
    {
        // kalau pakai PDO, maka harus prepare dulu
        $this->stmt = $this->dbh->prepare("SELECT * FROM videos");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC); // fetch itu ambil
    }
}
