<?php
class Register extends Controller
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
        $data['title'] = 'Register';
        // $this->view('templates/header-php/Register'); // header php
        $this->view('templates/header', $data); //buat method view yang ada di controller
        $this->view('register', $data);
        $this->view('templates/footer');
    }

    public function register()
    {
        if ($this->model('User_model')->register($_POST) > 0) {
            echo
            "<script>
                alert('Username sudah didaftarkan! Silahkan Login jika berkenan!');
                document.location.href = '../login';
            </script>
        ";
        } else {
            echo
            "<script>
                document.location.href = '../register';
             </script>
            ";
        }
    }
}
