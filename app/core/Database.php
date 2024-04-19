<?php
class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;

    // untuk koneksi
    public function __construct()
    {
        // data source name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => pdo::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option); // optimasi koneksi
        } catch (PDOException $e) {
            //throw $th;
            die($e->getMessage());
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    // bind supaya aman, agar sql tidak injection
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            # code...
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function resultSet()
    {
        // tampilin semua data
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC); // tampilan array associative
    }
    public function single()
    {
        // tampilin satu data
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC); // tampilan array associative
    }
}
