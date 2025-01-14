<?php

class Mentor extends Controller{
    protected $data = [];

    public function __construct()
    {
        //mengambil data mentor yang sudah login
        if (isset ($_SESSION['id_profile_mentor'])) {
            $this->data['login'] = $this->model('Auth_model')->getLoginByIdMentor($_SESSION['id_profile_mentor']);
            $this->data['kelas'] = $this->model('Kelas_model')->getKelasByIdMentor($_SESSION['id_profile_mentor']);
        }
        // var_dump($this->data['kelas']);die;       
        Flasher::flash(); 
    }

    
    public function index()
    {
        if (!$this->data['kelas']) {
           //mempersiapkan data yang digunakan
            $data['judul'] = "Dashboard";
            $data['login'] = $this->data['login'];// data mentor
            
            $data['kelas']= NULL;
            

            // var_dump($_SESSION['id_profile_mentor']);die;
            if (isset($_POST['keyword'])) {
                $data['kelas'] = $this->model('Kelas_model')->getKelasByKode();
                // var_dump($data['kelas']);die;
            }

            //menampilkan view
            // $this->view('mentor/componens/header',$data);
            $this->view('mentor/index',$data);
            // $this->view('mentor/componens/footer',$data);
        }else {
            //mempersiapkan data yang digunakan
            $data['judul'] = "Data User";
            $data['login'] = $this->data['login'];// data mentor

            // mengambil data kelas yang sama dengan id_mentor
            $data['kelas'] = $this->data['kelas'];

            
            

            //mengambil data user pada kelas yang sama dengan mentor
            if (isset($_POST['keyword'])) {
                $keyword = $_POST['keyword'];
                $data['user'] = $this->model('User_model')->cariUserByIdKelas($data['kelas']['id_kelas'], $keyword);
            } else {
                $data['user'] = $this->model('User_model')->getUserByIdKelas($data['kelas']['id_kelas']);
            }

            // var_dump($data['user']);die;

            //menampilkan view
            $this->view('mentor/componens/header',$data);
            $this->view('mentor/data_user/index',$data);
            $this->view('mentor/componens/footer',$data);
        }
        
    }

    //data user
    public function data_user()
    {
        //mempersiapkan data yang digunakan
        $data['judul'] = "Data User";
        $data['login'] = $this->data['login'];// data mentor

        // mengambil data kelas yang sama dengan id_mentor
        $data['kelas'] = $this->data['kelas'];

        
        

        //mengambil data user pada kelas yang sama dengan mentor
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
            $data['user'] = $this->model('User_model')->cariUserByIdKelas($data['kelas']['id_kelas'], $keyword);
        } else {
            $data['user'] = $this->model('User_model')->getUserByIdKelas($data['kelas']['id_kelas']);
        }

        // var_dump($data['user']);die;

        //menampilkan view
        $this->view('mentor/componens/header',$data);
        $this->view('mentor/data_user/index',$data);
        $this->view('mentor/componens/footer',$data);
    }

    //data kelas
    public function materi()
    {
        //mempersiapkan data yang digunakan
        $data['judul'] = "Materi";
        $data['login'] = $this->data['login'];// data mentor

        //mengambil judul kelas
        $data['kelas'] = $this->model('Kelas_model')->getKelasByIdMentor($_SESSION['id_profile_mentor']);

        
        // var_dump($data['kelas']);die;

        // mengambil data materi yang sama dengan id_mentor
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
            $data['materi'] = $this->model('Materi_model')->cariMateriByIdMentor($_SESSION['id_profile_mentor'],$keyword);
        } else{
            $data['materi'] = $this->model('Materi_model')->getMateriByIdMentor($_SESSION['id_profile_mentor']);
        }

        // var_dump($data['materi']);die;

        //menampilkan view
        $this->view('mentor/componens/header',$data);
        $this->view('mentor/materi/index',$data);
        $this->view('mentor/componens/footer',$data);
    }

    public function tools()
    {
        //mempersiapkan data yang digunakan
        $data['judul'] = "Tools";
        $data['login'] = $this->data['login'];// data mentor

        //mengambil judul kelas
        $data['kelas'] = $this->model('Kelas_model')->getKelasByIdMentor($_SESSION['id_profile_mentor']);

        

        // mengambil data tools yang sama dengan id_mentor
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
            $data['tools'] = $this->model('Tools_model')->cariToolsByIdMentor($_SESSION['id_profile_mentor'],$keyword);
        } else{
            $data['tools'] = $this->model('Tools_model')->getToolsByIdMentor($_SESSION['id_profile_mentor']);
        }

        // var_dump($data);die;

        //menampilkan view
        $this->view('mentor/componens/header',$data);
        $this->view('mentor/tools/index',$data);
        $this->view('mentor/componens/footer',$data);
    }

    public function penilaian()
    {
        //mempersiapkan data yang digunakan
        $data['judul'] = "Penilaian";
        $data['login'] = $this->data['login'];// data mentor

        //mengambil judul kelas
        $data['kelas'] = $this->model('Kelas_model')->getKelasByIdMentor($_SESSION['id_profile_mentor']);

        

        // mengambil data tools yang sama dengan id_mentor
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
            $data['penugasan'] = $this->model('Penugasan_model')->cariPenugasanByIdMentor($_SESSION['id_profile_mentor'],$data['kelas']['id_kelas'],$keyword);
        } else{
            $data['penugasan'] = $this->model('Penugasan_model')->getPenugasanByIdMentor($_SESSION['id_profile_mentor'],$data['kelas']['id_kelas']);
        }

        // var_dump($data['penugasan']);die;

        //menampilkan view
        $this->view('mentor/componens/header',$data);
        $this->view('mentor/penilaian/index',$data);
        $this->view('mentor/componens/footer',$data);
    }
    


}
?>