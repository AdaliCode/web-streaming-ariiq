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
    public function addDataVideo($data)
    {
        $query = "INSERT INTO videos VALUES ('', :title, :vid_type, :vid_release, :synopsis, :episodes, :cover)";

        $this->db->query($query);
        $this->db->bind('title', $data['title']);
        $this->db->bind('vid_type', $data['vid_type']);
        $this->db->bind('vid_release', $data['vid_release']);
        $this->db->bind('synopsis', $data['synopsis']);
        $this->db->bind('episodes', $data['episodes']);
        $this->db->bind('cover', $data['cover']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
