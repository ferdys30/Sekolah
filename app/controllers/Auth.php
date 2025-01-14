<?php

class Auth extends Controller
{

    public function __construct()
    {
        Flasher::flash();
    }

    public function index()
    {
        //mempersiapkan data yang digunakan
        $data['judul'] = "Login";

        //menampilkan view
        $this->view('auth/login', $data);
    }

    // halaman mendaftar
    public function regist()
    {
        //mempersiapkan data yang digunakan
        $data['judul'] = "Regist";

        //menampilkan view
        $this->view('auth/regist', $data);
    }

    // menambah/ registrasi
    public function tambah()
    {
        if ($this->model('Auth_model')->tambahDataUser($_POST) > 0) { //memanggil Auth_model untuk mengolah data
            Flasher::seFlash('Data', 'Berhasil', 'ditambahkan', 'success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL . '/auth/index');
            exit;
        } else {
            Flasher::seFlash('Data', 'Gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/auth/regist');
            exit;
        }
    }

    public function ubah()
    {
        if ($this->model('Auth_model')->ubahDataUser($_POST) > 0) { //memanggil Auth_model untuk mengolah data
            Flasher::seFlash('Data', 'Berhasil', 'Diubah', 'success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL . '/profile/index');
            exit;
        } else {
            Flasher::seFlash('Data', 'Gagal', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/profile/index');
            exit;
        }
    }


    // cek data atau login ke dalam aplikasi
    public function login()
    {
        // mengelola hasil POST yang diberikan 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            //pengecekan data login
            $user = $this->model('Auth_model')->login($username, $password);

            // jika ada jalankan perintah berikut
            if ($user) {
                // Login berhasil
                if ($_SESSION['id_role'] == 1) {
                    Flasher::seFlash('Admin', 'Berhasil', 'Masuk', 'success');
                    header("Location: " . BASEURL . "/Admin/index"); // Arahkan ke tampilan admin
                    exit;
                } elseif ($_SESSION['id_role'] == 2) {
                    Flasher::seFlash('Mentor', 'Berhasil', 'Masuk', 'success');
                    header("Location: " . BASEURL . "/Mentor/index"); // Arahkan ke tampilan mentor
                    exit;
                } elseif ($_SESSION['id_role'] == 3) {
                    Flasher::seFlash('', 'Berhasil', 'Masuk', 'success');
                    header("Location: " . BASEURL . "/Dashboard/index"); // Arahkan ke tampilan user
                    exit;
                }
            } else {
                // Tampilkan formulir login
                header("Location: " . BASEURL . "/auth/index");
                Flasher::seFlash('Mohon maaf anda', 'Gagal Masuk', 'Pastikan Username dan Password Benar', 'danger');
            }
        } else {
            // Tampilkan formulir login
            header("Location: " . BASEURL . "/auth/index");
        }
    }
    public function logout()
    {

        // Hapus semua data sesi
        session_unset();

        // Hancurkan sesi
        session_destroy();


        // Arahkan pengguna ke halaman login
        header("Location:" . BASEURL . "/dashboard/index"); // Ganti login.php dengan halaman login Anda
        exit();
    }
}
?>