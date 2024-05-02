<?php
class User_model
{

    private $table = 'users'; // database handler
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');

        // Binding dimaksudkan sebagai pengikatan (association) antara suatu entity dengan atributnya
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function getUserByUsername($username)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username=:username');

        // Binding dimaksudkan sebagai pengikatan (association) antara suatu entity dengan atributnya
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    public function addUser($data)
    {
        $query = "INSERT INTO {$this->table} VALUES ('', :username, :password)";

        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function register($data)
    {
        // inputan harus diisi
        $username = strtolower(stripslashes($data["username"])); // stripslashes menghilangkan char "_"
        if (empty(trim($username)) || empty($data['password']) || empty($data['password2'])) {
            echo
            "<script>
                alert('Tolong Isi Semua Data!');
             </script>
            ";
            return false;
        }
        // cek username ada atau tidak
        $data_user = $this->getUserByUsername($username);
        if ($data_user) {
            echo
            "<script>
                    alert('Username sudah terdaftar!');
                </script>
                ";
            return false;
        }
        // konfirmasi password samain
        if ($data['password'] !== $data['password2']) {
            echo
            "<script>
                    alert('tolong samakan konfimasi Passwordnya!');
                </script>
                ";
            return false;
        }

        $data['username'] = $username;
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT); // algotritma yang disetting default
        $this->addUser($data);
        return true;
    }

    public function login($data)
    {
        $username = $data["username"];
        $password = $data["password"];
        // cek input semua apa belum
        if (empty($username) || empty($password)) {
            echo
            "<script>
                alert('Tolong Isi Semua Data!');
             </script>
            ";
            return false;
        }
        // cek username bener atau salah
        $data_user = $this->getUserByUsername($username);
        if (!$data_user) {
            echo
            "<script>
                alert('Username atau password salah!');
            </script>
            ";
            return false;
        }
        // cek pass bener atau salah
        if (!password_verify($password, $data_user["password"])) {
            echo
            "<script>
                alert('pass salah!');
            </script>
            ";
            return false;
        }
        $_SESSION["login"] = true;
        // cek remember me
        if (isset($_POST['remember'])) {
            # buat cookie
            setcookie('id', $data_user['id'], time() + 60);
            setcookie('key', hash('sha256', $data_user['username']), time() + 60);
        }
        return true;
    }
}
