<?php
session_start();
class Login extends Controller
{

    public function index()
    {
        if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
            $id = $_COOKIE['id'];
            $key = $_COOKIE['key'];

            // ambil username berdasarkan id
            $result = $this->model('User_model')->getUserById($id);

            // cek cookie dan username, bukan cookie yang dicopy
            if ($key === hash('sha256', $result['username'])) {
                $_SESSION['login'] = true;
            }
        }
        if (isset($_SESSION["login"])) {
            header("Location: " . BASEURL);
            exit;
        }
        $data['title'] = 'Login';
        // $this->view('templates/header-php/login'); // header php
        $this->view('templates/header', $data); //buat method view yang ada di controller
        $this->view('login', $data);
        $this->view('templates/footer');
    }

    // post
    public function login()
    {
        if ($this->model('User_model')->login($_POST) > 0) {
            echo
            "<script>
                alert('Selesai Login');
                document.location.href = '../';
            </script>
        ";
        } else {
            echo
            "<script>
                document.location.href = '../login';
             </script>
            ";
        }

        // cek adakah username di table users
        // $result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username' ");

        // mysqli_num_rows ngecek berapa baris yang dikembalikan dari query
        // if (mysqli_num_rows($result) === 1) {
        //     // cek password
        //     $row = mysqli_fetch_assoc($result);
        //     if (password_verify($password, $row["password"])) { // password_verify ngecek sama apa gak dengan di db, kebalikan password_hash
        //         header("Location: index.php");
        //         exit;
        //     }
        // }
        // $error = true;
    }

    // post
    public function logout()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();
        setcookie('id', '', time() - 3600);
        setcookie('key', '', time() - 3600);

        header("Location: " . BASEURL . "/login");
        exit;
    }
}
