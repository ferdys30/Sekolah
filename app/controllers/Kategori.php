<?php

class Kategori extends Controller{
    protected $data = [];

    public function __construct()
    {
        if (isset ($_SESSION['id_profile'])) {
            $this->data['login'] = $this->model('Auth_model')->getLoginById($_SESSION['id_profile']);
        }
        Flasher::flash();
    }

    // public function index()
    // {
    //     //mempersiapkan data yang digunakan
    //     $data['judul'] = "Kelas";
    //     $data['Kelas'] = $this->model('Kelas_model')->getAllKelas();

    //     //menampilkan view
    //     $this->view('admin/componens/header',$data);
    //     $this->view('admin/kelas/index',$data);
    //     $this->view('admin/componens/footer',$data);
    // }


    //tambah kategori
    public function tambah(){
        if ( $this->model('Kategori_model')->tambahDataKategori($_POST) > 0) { //memanggil Kategori_model untuk mengolah data
            Flasher::seFlash('Kategori','Berhasil','ditambahkan','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/admin/data_kelas');
            exit;
        }
        else {
            Flasher::seFlash('Kategori','Gagal','ditambahkan','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/admin/data_kelas');
            exit;
        }
    }

    //ubah data
    public function ubah(){
        if ( $this->model('Kategori_model')->ubahDataKategori($_POST) > 0) { //memanggil Kategori_model untuk mengolah data
            Flasher::seFlash('Kategori','Berhasil','diubah','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/admin/data_Kelas');
            exit;
        }
        else {
            Flasher::seFlash('Kategori','Gagal','diubah','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/admin/data_Kelas');
            exit;
        }
    }

    //get data
    public function getUbah()
    {
        echo json_encode( $this->model('Kategori_model')->getKategoriById($_POST['id']));
    }

    //detail kategori
    public function detail($id)
    {
        //set session  navbarr
        $data['judul'] = "Kategori";
        if (isset ($_SESSION['id_profile'])) {
            $data['login'] = $this->data['login'];
            //melakukan pengecekan apakah user sudah masuk kelas atau belum
            $data['user_daftar'] = $this->model('Pendaftaran_model')->getDataUserById($_SESSION['id_profile']);

        }else{
            $data['user_daftar']['id_kelas'] = [];
        }
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori();


        // display halaman kategori dan menampilkan data sesuai ID
        $data['detail_kategori'] = $this->model('Kategori_model')->getKategoriById($id);        
        
        // menampilkan jumlah data kelas yang sesuai dengan id nya
        $data['kelas'] = $this->model('Kelas_model')->getKelasByKategoriId($id);
        // var_dump($data['kelas']);die;

        //untuk modal
        if (isset ($_SESSION['id_profile'])) {
            $data['data_user'] = $this->model('Pendaftaran_model')->getPendaftarById($_SESSION['id_profile']);
        }

        // var_dump($data['login']);die;

        // var_dump($data['kelas']);die;
        //menampilkan view
        $this->view('componens/header',$data);
        $this->view('user/kategori/index',$data);
        $this->view('componens/footer',$data);
    }

    public function hapus($id){
        if ( $this->model('Kategori_model')->hapusDataKategori($id) > 0) { //memanggil Kategori_model untuk mengolah data
            Flasher::seFlash('Kategori','Berhasil','dihapus','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/admin/data_kelas/');
            exit;
        }
        else {
            Flasher::seFlash('Kategori','Gagal','dihapus','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/admin/data_kelas/');
            exit;
        }
    }
}