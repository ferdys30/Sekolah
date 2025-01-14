<?php

class Materi extends Controller{
    protected $data = [];

    // public function __construct()
    // {
    //     if (isset ($_SESSION['id_profile_mentor'] )) {
    //         $this->data['login'] = $this->model('Auth_model')->getLoginByIdMentor($_SESSION['id_profile_mentor']);
    //     }elseif(isset ($_SESSION['id_profile'])){
    //         $this->data['login'] = $this->model('Auth_model')->getLoginById($_SESSION['id_profile']);
    //     }
    //     else {
    //         header('Location: ' . BASEURL .'/auth/index');
    //     }
    //     Flasher::flash();
    // }
    public function basisdata()
    {
        //mempersiapkan data yang digunakan
        // $data['judul'] = "Materi";
        // $data['login'] = $this->data['login'];
        // $data['materi'] = $this->model('Materi_model')->getMateriByIdkelas($id);
        // $data['kelas'] = $this->model('Kelas_model')->getKelasById($id);
        // $data['jawaban'] = $this->model('Penugasan_model')->getPenugasanByIdKelasUser($id,$data['login']['id_profile']);
        // var_dump($data['materi']);die;
        // $data['nama'] = $nama;
        // $data['pekerjaan'] = $pekerjaan;
        // $data['umur'] = $umur;

        //menampilkan view
        // $this->view('user/componens/header',$data);
        $this->view('user/materi/1');
        // $this->view('user/componens/footer',$data);
    }
    public function pemogramangrafis()
    {
        //mempersiapkan data yang digunakan
        // $data['judul'] = "Materi";
        // $data['login'] = $this->data['login'];
        // $data['materi'] = $this->model('Materi_model')->getMateriByIdkelas($id);
        // $data['kelas'] = $this->model('Kelas_model')->getKelasById($id);
        // $data['jawaban'] = $this->model('Penugasan_model')->getPenugasanByIdKelasUser($id,$data['login']['id_profile']);
        // var_dump($data['materi']);die;
        // $data['nama'] = $nama;
        // $data['pekerjaan'] = $pekerjaan;
        // $data['umur'] = $umur;

        //menampilkan view
        // $this->view('user/componens/header',$data);
        $this->view('user/materi/2');
        // $this->view('user/componens/footer',$data);
    }


    // menambahkan data Materi
    public function tambah(){
        if ( $this->model('Materi_model')->tambahDataMateri($_POST) > 0) { //memanggil Materi_model untuk mengolah data
            Flasher::seFlash('Materi','Berhasil','ditambahkan','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/materi');
            exit;
        }
        else {
            Flasher::seFlash('Materi','Gagal','ditambahkan','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/materi');
            exit;
        }
    }

    // menghapus data Materi
    public function hapus($id){
        if ( $this->model('Materi_model')->hapusDataMateri($id) > 0) { //memanggil materi_model untuk mengolah data
            Flasher::seFlash('Materi','Berhasil','dihapus','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/materi');
            exit;
        }
        else {
            Flasher::seFlash('Materi','Gagal','dihapus','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/materi');
            exit;
        }
    }

    // mengambil data Materi sesuai dengan ID
    public function getUbah()
    {
        echo json_encode( $this->model('Materi_model')->getMateriById($_POST['id']));
    }

    // mengubah data Materi sesuai id yang dipilih
    public function ubah(){
        if ( $this->model('Materi_model')->ubahDataMateri($_POST) > 0) { //memanggil Materi_model untuk mengolah data
            Flasher::seFlash('Materi','Berhasil','diubah','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/materi');
            exit;
        }
        else {
            Flasher::seFlash('Materi','Gagal','diubah','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/materi');
            exit;
        }
    }
    
}