<?php
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
            // if (isset($_POST['remember'])) {
            //     # buat cookie
            //     setcookie('key', hash('sha256', $_POST['username']), time() + 60, '/');
            // }
            // echo $_COOKIE['id'];
            // header('location: ' . BASEURL);
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
    }

    // post
    public function logout()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();
        setcookie('id', '', time() - 3600, '/');
        setcookie('key', '', time() - 3600, "/");

        header("Location: " . BASEURL . "/login");
        exit;
    }
}
