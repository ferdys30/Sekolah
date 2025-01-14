<?php

class Dashboard extends Controller{
    protected $data = [];

    public function __construct()
    {
        if (isset ($_SESSION['id_profile'])) {
            $this->data['login'] = $this->model('Auth_model')->getLoginById($_SESSION['id_profile']);
        }
        Flasher::flash();
    }

    public function index()
    {
        
        //judul, data session login, navbarrr
        $data['judul'] = "Dashboard";
        if (isset ($_SESSION['id_profile'])) {
            $data['login'] = $this->data['login']; //ambil data user untuk mengetahui data usernya
            //melakukan pengecekan apakah user sudah masuk kelas atau belum
            $data['user_daftar'] = $this->model('Pendaftaran_model')->getDataUserById($_SESSION['id_profile']);
            
        }else{
            $data['user_daftar']['id_kelas'] = [];
        }
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori();

        // menghitung jumlah kelas yang ada di kategori
        // $data['jml_kelas_kategori'] = $this->model('Kategori_model')->getJumlahKelasKategori();

        //menampilkan kelas terbaik
        $data['terbaik'] = $this->model('Pendaftaran_model')->getJumlahTerbanyak();


        //review aplikasi digiskill
        $data['review'] = $this->model('Penilaian_model')->getAllPenilaian();
        // var_dump($data['data_user']);
        // var_dump($data['terbaik']);die;
        
        //menampilkan view
        $this->view('componens/header',$data);
        $this->view('user/index',$data);
        $this->view('componens/footer',$data);
    }
}
?>