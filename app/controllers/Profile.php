<?php

class Profile extends Controller{
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
        //mempersiapkan data yang digunakan
        $data['judul'] = "Profile Saya";
        $data['login'] = $this->data['login'];
        // var_dump($data['login']);die;

        //menampilkan view
        $this->view('user/componens/header',$data);        
        $this->view('user/profile/index',$data);
        $this->view('user/componens/footer',$data);
    }

    // user view detail kelas 
    public function kelas_saya()
    {
        //judul,navbarrr,session login
        $data['judul'] = "Kelas Saya";
        $data['login'] = $this->data['login'];
        $data['kelas'] = $this->model('Kelas_model')->getKelasByIdUser($_SESSION['id_profile']);
        // var_dump($data['kelas']);die;
        
        // view yang ditampilkan
        $this->view('user/componens/header',$data);
        $this->view('user/profile/kelas_saya',$data);
        $this->view('user/componens/footer',$data);
    }
}