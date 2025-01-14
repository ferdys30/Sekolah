<?php

class About extends Controller{
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
        //navbarr
        $data['judul'] = "About Us";
        if (isset ($_SESSION['id_profile'])) {
            $data['login'] = $this->data['login'];
        }
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori();
        
        //menampilkan view
        $this->view('componens/header',$data);
        $this->view('user/about/index',$data);
        $this->view('componens/footer',$data);
    }
}
?>