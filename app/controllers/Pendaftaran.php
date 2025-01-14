<?php

class Pendaftaran extends Controller{
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
    public function detail($id)
    {
        $data['judul'] = "Detail Pendaftaran";
        $data['data_user'] = $this->model('Pendaftaran_model')->getPendaftarById($id);

        $this->view('admin/componens/header',$data);
        $this->view('admin/detail_kelas/detail_mentor',$data);
    }

    public function tambah(){
        if ( $this->model('Pendaftaran_model')->tambahDataPendaftaran($_POST) > 0) { //memanggil kelas_model untuk mengolah data
            Flasher::seFlash('Anda','Berhasil','Memasuki Kelas','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/dashboard/index');
            exit;
        }
        else {
            Flasher::seFlash('Anda','Gagal','Memasuki Kelas','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'kelas');
            exit;
        }
    }

    public function tambahMentor(){
        if ( $this->model('Pendaftaran_model')->tambahDataPendaftaranMentor($_POST) > 0) { //memanggil kelas_model untuk mengolah data
            Flasher::seFlash('Anda Sebagai Mentor','Berhasil','Masuk Kelas','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/kelas');
            exit;
        }
        else {
            Flasher::seFlash('Anda Sebagai Mentor','Gagal','Masuk Kelas','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/index');
            exit;
        }
    }

    public function hapus($id){
        if ( $this->model('Mentor_model')->hapusDataMentor($id) > 0) { //memanggil User_model untuk mengolah data
            Flasher::seFlash('Mentor','Berhasil','dihapus','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/index');
            exit;
        }
        else {
            Flasher::seFlash('Mentor','Gagal','dihapus','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/mentor/index');
            exit;
        }
    }

    public function getUbah()
    {
        echo json_encode( $this->model('Pendaftaran_model')->getPendaftarByIdKelas($_POST['id']));
    }
}

?>