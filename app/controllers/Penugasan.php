<?php

class Penugasan extends Controller{
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


    public function jawaban(){
        if ( $this->model('Penugasan_model')->tambahJawabanPenugasan($_POST) > 0) { //memanggil Tools_model untuk mengolah data
            Flasher::seFlash('Penugasan','Berhasil','ditambahkan','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/profile/kelas_saya');
            exit;
        }
        else {
            Flasher::seFlash('Penugasan','Gagal','ditambahkan','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/profile/kelas_saya');
            exit;
        }
    }
    public function tambahPenilaianUser(){
        // var_dump($_POST);die;
        if ( $this->model('Penugasan_model')->tambahPenilaianPenugasan($_POST) > 0) { //memanggil Tools_model untuk mengolah data
            Flasher::seFlash('Penugasan','Berhasil','ditambahkan','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/penilaian');
            exit;
        }
        else {
            Flasher::seFlash('Penugasan','Gagal','ditambahkan','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/penilaian');
            exit;
        }
    }


    // mengambil data Tools sesuai dengan ID
    public function getUbah()
    {
        echo json_encode( $this->model('Kelas_model')->getKelasById($_POST['id']));
    }

    // mengambil data Tools sesuai dengan ID
    public function getPenilaian()
    {
        echo json_encode( $this->model('Penugasan_model')->getPenugasanById($_POST['id']));
    }

    // menambah penugasan
    public function ubah(){
        if ( $this->model('Penugasan_model')->ubahDataPenugasan($_POST) > 0) { //memanggil Tools_model untuk mengolah data
            Flasher::seFlash('Penugasan','Berhasil','dihapus','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/materi');
            exit;
        }
        else {
            Flasher::seFlash('materi','Gagal','dihapus','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/materi');
            exit;
        }
    }
    
}