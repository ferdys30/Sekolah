<?php

class Penilaian extends Controller{
    // public function index()
    // {
    //     //mempersiapkan data yang digunakan
    //     $data['judul'] = "Mentor";
    //     $data['mentor'] = $this->model('Mentor_model')->getAllMentor();
    //     // $data['nama'] = $nama;
    //     // $data['pekerjaan'] = $pekerjaan;
    //     // $data['umur'] = $umur;

    //     //menampilkan view
    //     $this->view('admin/componens/header',$data);
    //     $this->view('admin/mentor/index',$data);
    //     $this->view('admin/componens/footer',$data);
    // }

    //user view detail mentor 
    // public function detail($id)
    // {
    //     $data['judul'] = "Detail Pendaftaran";
    //     $data['data_user'] = $this->model('Penilaian')->getPendaftarById($id);

    //     $this->view('admin/componens/header',$data);
    //     $this->view('admin/detail_kelas/detail_mentor',$data);
    // }

    public function tambah(){
        // var_dump($_POST);die;
        if ( $this->model('Penilaian_model')->tambahDataPenilaian($_POST) > 0) { //penilaian kelas
            Flasher::seFlash('Penilaian','Berhasil','ditambahkan','success'); 
            header('Location: ' . BASEURL .'/profile/kelas_saya');
            exit;
        }
        else {
            Flasher::seFlash('Penilaian','Gagal','ditambahkan','danger');
            header('Location: ' . BASEURL .'kelas');
            exit;
        }
    }

    //hapus penilaian user terhadap kelas
    public function hapus($id){
        if ( $this->model('Mentor_model')->hapusDataMentor($id) > 0) { //memanggil User_model untuk mengolah data
            Flasher::seFlash('Penilaian','Berhasil','dihapus','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/index');
            exit;
        }
        else {
            Flasher::seFlash('Penilaian','Gagal','dihapus','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/index');
            exit;
        }
    }

    public function getUbahPenilaian()
    {
        echo json_encode( $this->model('Penilaian_model')->getDataByIdKelas($_POST['id']));
    }
}

?>