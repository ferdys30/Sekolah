<?php 

class Admin extends Controller{
    protected $data = [];

    public function __construct()
    {
        if (isset ($_SESSION['id_profile'])) {
            $this->data['login'] = $this->model('Auth_model')->getLoginById($_SESSION['id_profile']);
        }
        if (!isset($_SESSION['id_role']) || $_SESSION['id_role'] !== 1) {
            header("Location: " . BASEURL . "/Dashboard/index");
        }
        Flasher::flash();
        
    }

    public function index()
    {
        //data untuk navbar
        $data['judul'] = "Dashboard Admin";
        if (isset ($_SESSION['id_profile'])) {
            $data['login'] = $this->data['login'];
        }

        $data['jml_user'] = $this->model('Pendaftaran_model')->getJumlahPendaftar();// jumlah user keseluruhan
        $data['jml_mentor'] = $this->model('Mentor_model')->getJumlahMentor();// jumlah user keseluruhan

        // menghitung jumlah orang yang mendaftar pada kategori tertentu
        $data['user_bykategori'] = $this->model('Pendaftaran_model')->getJumlahPendaftarByKategori();

        //menampilkan data user detail yang mendaftar
        $data['pndf_kelas'] = $this->model('Pendaftaran_model')->hitungPendaftarKelas();
        
        
        // var_dump($data);die;
        //menghitung jumlah mentor yang terdaftar


        //menampilkan view
        $this->view('admin/componens/header',$data);
        $this->view('admin/index',$data);
        $this->view('admin/componens/footer',$data);
    }


    public function data_user(){
        //data untuk navbar
        $data['judul'] = "Data User";
        if (isset ($_SESSION['id_profile'])) {
            $data['login'] = $this->data['login'];
        }

        
        if (isset($_POST['keyword'])||isset($_POST['pilihan'])) {
            $data['user'] = $this->model('User_model')->cariDataUser();
        }else {
            $data['user'] = $this->model('User_model')->getAllUser();
        }

        //mengambil data kelas
        $data['kelas']= $this->model('Kelas_model')->getAllKelas();


        //menampilkan view
        $this->view('admin/componens/header',$data);
        $this->view('admin/user/index',$data);
        $this->view('admin/componens/footer',$data);
    }

    public function data_kelas()
    {
        //data untuk navbar
        $data['judul'] = "Data Kelas";
        if (isset ($_SESSION['id_profile'])) {
            $data['login'] = $this->data['login'];
        }

        //menampilkan data kelas
        if (isset($_POST['keyword'])) {
            $data['kelas'] = $this->model('Kelas_model')->cariDataKelas();
        }else {
            $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        }

        //data kategori
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori();
        
        
        //menampilkan view
        $this->view('admin/componens/header',$data);
        $this->view('admin/kelas/index',$data);
        $this->view('admin/componens/footer',$data);
    }

    public function data_mentor()
    {
        //data untuk navbar
        $data['judul'] = "Data Mentor";
        if (isset ($_SESSION['id_profile'])) {
            $data['login'] = $this->data['login'];
        }

        //data yang ditampilkan
        if (isset($_POST['keyword'])||isset($_POST['pilihan'])) {
            $data['mentor'] = $this->model('Mentor_model')->cariDataMentor();
            $data['b_mentor'] = $this->model('Mentor_model')->getMentorBelumMasuk();
        }else {
            $data['mentor'] = $this->model('Mentor_model')->getAllMentor();
            $data['b_mentor'] = $this->model('Mentor_model')->getMentorBelumMasuk();
        }
        
        //mengambil data kelas
        $data['kelas']= $this->model('Kelas_model')->getAllKelas();

        //menampilkan view
        $this->view('admin/componens/header',$data);
        $this->view('admin/mentor/index',$data);
        $this->view('admin/componens/footer',$data);
    }

}
?>