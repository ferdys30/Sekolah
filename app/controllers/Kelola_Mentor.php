<?php

class Kelola_Mentor extends Controller{
    protected $data = [];

    public function __construct()
    {
        if (isset ($_SESSION['id_profile_mentor'])) {
            $this->data['login'] = $this->model('Auth_model')->getLoginByIdMentor($_SESSION['id_profile_mentor']);
        }
        Flasher::flash();
    }
    
    // public function index()
    // {
    //     //mempersiapkan data yang digunakan
    //     $data['judul'] = "Dashboard";
    //     if (isset ($_SESSION['id_profile_mentor'])) {
    //         $data['login'] = $this->data['login'];
    //     }
    //     // var_dump($_SESSION['id_profile_mentor']);die;
    //     if (isset($_POST['keyword'])) {
    //         $data['kelas'] = $this->model('Kelas_model')->getKelasByKode();
    //     }

    //     if (isset ($_SESSION['id_profile_mentor'])) {
    //         $data['data_mentor'] = $this->model('Mentor_model')->getMentorById($_SESSION['id_profile_mentor']);
    //     }

    //     // $data['nama'] = $nama;
    //     // $data['pekerjaan'] = $pekerjaan;
    //     // $data['umur'] = $umur;

    //     //menampilkan view
    //     $this->view('mentor/componens/header',$data);
    //     $this->view('mentor/index',$data);
    //     $this->view('mentor/componens/footer',$data);
    // }

    //data user
    

    //data kelas
    

    //tambah mentor
    public function tambah(){
        if ( $this->model('Mentor_model')->tambahDataMentor($_POST) > 0) { //memanggil Mentor_model untuk mengolah data
            Flasher::seFlash('Mentor','Berhasil','ditambahkan','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/admin/data_mentor');
            exit;
        }
        else {
            Flasher::seFlash('Mentor','Gagal','ditambahkan','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/admin/data_mentor');
            exit;
        }
    }

    public function getUbah()
    {
        echo json_encode( $this->model('Mentor_model')->getMentorById($_POST['id']));
    }

    // mengubah data kelas sesuai id yang dipilih
    public function ubah(){
        if ( $this->model('Mentor_model')->ubahDataMentor($_POST) > 0) { //memanggil Mentor_model untuk mengolah data
            Flasher::seFlash('Mentor','Berhasil','diubah','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/admin/data_mentor');
            exit;
        }
        else {
            Flasher::seFlash('Mentor','Gagal','diubah','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/admin/data_mentor');
            exit;
        }
    }

    public function hapus($id){
        if ( $this->model('Mentor_model')->hapusDataMentor($id) > 0) { //memanggil User_model untuk mengolah data
            Flasher::seFlash('Mentor','Berhasil','dihapus','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/admin/data_mentor');
            exit;
        }
        else {
            Flasher::seFlash('Mentor','Gagal','dihapus','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/admin/data_mentor');
            exit;
        }
    }
    }
?>