<?php

class Tools extends Controller{
    protected $data = [];

    public function __construct()
    {
        if (isset ($_SESSION['id_profile_mentor'])) {
            $this->data['login'] = $this->model('Auth_model')->getLoginByIdMentor($_SESSION['id_profile_mentor']);
        }
    }

    // public function index()
    // {
    //     //mempersiapkan data yang digunakan
    //     $data['judul'] = "Kelas";
    //     $data['Kelas'] = $this->model('Kelas_model')->getAllKelas();
    //     // $data['nama'] = $nama;
    //     // $data['pekerjaan'] = $pekerjaan;
    //     // $data['umur'] = $umur;

    //     //menampilkan view
    //     $this->view('admin/componens/header',$data);
    //     $this->view('admin/kelas/index',$data);
    //     $this->view('admin/componens/footer',$data);
    // }


    // menambahkan data Tools
    public function tambah(){
        if ( $this->model('Tools_model')->tambahDataTools($_POST) > 0) { //memanggil Tools_model untuk mengolah data
            Flasher::seFlash('Tools','Berhasil','ditambahkan','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/tools');
            exit;
        }
        else {
            Flasher::seFlash('Tools','Gagal','ditambahkan','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/tools');
            exit;
        }
    }

    // menghapus data Tools
    public function hapus($id){
        if ( $this->model('Tools_model')->hapusDataTools($id) > 0) { //memanggil Tools_model untuk mengolah data
            Flasher::seFlash('Tools','Berhasil','dihapus','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/tools');
            exit;
        }
        else {
            Flasher::seFlash('Tools','Gagal','dihapus','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/tools');
            exit;
        }
    }

    // mengambil data Tools sesuai dengan ID
    public function getUbah()
    {
        echo json_encode( $this->model('Tools_model')->getToolsById($_POST['id']));
    }

    // mengubah data Tools sesuai id yang dipilih
    public function ubah(){
        if ( $this->model('Tools_model')->ubahDataTools($_POST) > 0) { //memanggil Tools_model untuk mengolah data
            Flasher::seFlash('Tools','Berhasil','diubah','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/tools');
            exit;
        }
        else {
            Flasher::seFlash('Tools','Gagal','diubah','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/tools');
            exit;
        }
    }
    
}