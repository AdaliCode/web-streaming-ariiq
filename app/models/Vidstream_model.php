<?php
class Vidstream_model
{

    private $table = 'videos'; // database handler
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllvideos()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function getVideoById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');

        // Binding dimaksudkan sebagai pengikatan (association) antara suatu entity dengan atributnya
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}
