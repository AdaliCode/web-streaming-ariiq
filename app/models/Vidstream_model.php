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
    public function upload()
    {
        // menginput bio gambar pada $_FILES
        $namaFile = $_FILES['cover']['name'];
        $ukuranFile = $_FILES['cover']['size'];
        $error = $_FILES['cover']['error'];
        $tmpName = $_FILES['cover']['tmp_name']; //tmp name itu tempat penyimpanan sementara
        // cek apakah tidak ada gambar (error 4 itu errornya kalau gak ada gambar)
        if ($error === 4) {
            echo "<script> alert('pilih gambar dulu') </script>";
            return false;
        }
        // ekstensi file
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile); //explode itu memecah string berdasar delimiter
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script> alert('bukan gambar itu!" . $namaFile . "') </script>";
            return false;
        }
        // ukurannya besar kah?
        if ($ukuranFile > 10000000000) {
            # code...
            echo "<script>
        alert('Ukurannya terlalu besar!')
        </script>";
            return false;
        }
        // lolos
        // harus buat dulu manual foldernya
        // generate nama gambar baru, walaupun tampilannya sama
        $namaFileBaru = uniqid(); // uniqid() untuk string random
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName,  'img/' . $namaFileBaru);
        return $namaFileBaru;
    }
    public function store($data)
    {
        $title = htmlspecialchars($data["title"]);
        $vid_release = htmlspecialchars($data["vid_release"]);
        $vid_type = htmlspecialchars($data["vid_type"]);
        $synopsis = htmlspecialchars($data["synopsis"]);
        $episodes = htmlspecialchars($data["episodes"]);
        // isi semua sebelum upload
        if (!$title || !$vid_release || !$vid_type || !$synopsis || !$episodes) {
            echo "<script>
            alert('Isi dulu semua!')
            </script>";
            return false;
        }
        // upload gambar
        $gambar = $this->upload();
        if (!$gambar) {
            return false;
        }
        $query = "INSERT INTO videos (title, vid_type, vid_release, synopsis, episodes, cover) VALUES (:title, :vid_type, :vid_release, :synopsis, :episodes, :cover)";

        $this->db->query($query);
        $this->db->bind('title', $title);
        $this->db->bind('vid_type', $vid_type);
        $this->db->bind('vid_release', $vid_release);
        $this->db->bind('synopsis', $synopsis);
        $this->db->bind('episodes', $episodes);
        $this->db->bind('cover', $gambar);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
