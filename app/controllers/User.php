<?php

class User extends Controller{
    // public function index()
    // {
    //     //mempersiapkan data yang digunakan
    //     $data['judul'] = "User";
    //     $data['user'] = $this->model('User_model')->getAllUser();
    //     // $data['nama'] = $nama;
    //     // $data['pekerjaan'] = $pekerjaan;
    //     // $data['umur'] = $umur;

    //     //menampilkan view
    //     $this->view('admin/componens/header',$data);
    //     $this->view('admin/user/index',$data);
    //     $this->view('admin/componens/footer',$data);
    // }

    //admin view detail user 
    public function getData()
    {
        echo json_encode( $this->model('User_model')->getUserById($_POST['id']));
    }

    public function hapus($id){
        if ( $this->model('User_model')->hapusDataUser($id) > 0) { //memanggil User_model untuk mengolah data
            Flasher::seFlash('User','Berhasil','dihapus','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/admin/Data_user');
            exit;
        }
        else {
            Flasher::seFlash('User','Gagal','dihapus','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/admin/Data_user');
            exit;
        }
    }

    // public function cari(){
    //     //mempersiapkan data yang digunakan
    //     $data['judul'] = "User";
    //     $data['user'] = $this->model('User_model')->cariDataUser();
    //     // $data['nama'] = $nama;
    //     // $data['pekerjaan'] = $pekerjaan;
    //     // $data['umur'] = $umur;

    //     //menampilkan view
    //     $this->view('admin/componens/header',$data);
    //     $this->view('admin/user/index',$data);
    //     $this->view('admin/componens/footer',$data);
    // }

}
?>