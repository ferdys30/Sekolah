<?php

class Kelas extends Controller {
    protected $data = [];

    public function __construct() {
        if(isset($_SESSION['id_profile'])) {
            $this->data['login'] = $this->model('Auth_model')->getLoginById($_SESSION['id_profile']);
        }
        Flasher::flash();
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

    //user view detail kelas 
    public function detail($id) {
        // var_dump($id);die;
        //judul,navbarrr,session login
        $data['judul'] = "Kelas";
        if(isset($_SESSION['id_profile'])) {
            $data['login'] = $this->data['login'];
            //melakukan pengecekan apakah user sudah masuk kelas atau belum
            $data['user_daftar'] = $this->model('Pendaftaran_model')->getDataUserById($_SESSION['id_profile']);
            // var_dump($data['user_daftar']);die;
        } else {
            $data['user_daftar']['id_kelas'] = [];
        }
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori();

        // menampilkan kelas sesuai dengan id kelas yang ada
        $data['Kelas'] = $this->model('Kelas_model')->getDetailKelasById($id);
        // var_dump($data['Kelas']);die;

        // menampilkan jumlah materi sesuai dengan id kelas kelas yang ada
        // $data['jml_materi'] = $this->model('Materi_model')->getJumlahMateriById($id);

        // menampilkan jumlah materi sesuai dengan id kelas kelas yang ada
        $data['materi'] = $this->model('Materi_model')->getMateriByIdkelas($id);

        // var_dump($data['user_daftar']);die;

        //mengambil data tools
        $data['tools'] = $this->model('Tools_model')->getToolsByIdKelas($id);

        //mengambil data review dari idkleas
        $data['review'] = $this->model('Penilaian_model')->getPenilaianByIdKelas($id);

        // if (empty($data['Kelas']) || empty($data['jml_materi']) || empty($data['materi'])|| empty($data['tools'])|| empty($data['review'])) {
        //     // Jika salah satu data kosong, tampilkan halaman awal
        //     header('Location: ' . BASEURL.'/Dashboard'); // Ganti BASEURL dengan URL halaman awal Anda
        //     exit();
        // }

        // var_dump($data['tools']);die;
        //untuk modal
        if(isset($_SESSION['id_profile'])) {
            $data['data_user'] = $this->model('Pendaftaran_model')->getPendaftarById($_SESSION['id_profile']);
        }

        // view yang ditampilkan
        $this->view('componens/header', $data);
        $this->view('user/detail_kelas/index', $data);
        // $this->view('componens/footer',$data);
    }

    // menambahkan data kelas
    public function tambah() {
        if($this->model('Kelas_model')->tambahDataKelas($_POST) > 0) { //memanggil kelas_model untuk mengolah data
            Flasher::seFlash('Kelas', 'Berhasil', 'ditambahkan', 'success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: '.BASEURL.'/admin/data_kelas');
            exit;
        } else {
            Flasher::seFlash('Kelas', 'Gagal', 'ditambahkan cek Kode Kelas atau form lainnya', 'danger'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: '.BASEURL.'/admin/data_kelas');
            exit;
        }
    }

    // menghapus data kelas
    public function hapus($id) {
        if($this->model('Kelas_model')->hapusDataKelas($id) > 0) { //memanggil kelas_model untuk mengolah data
            Flasher::seFlash('Kelas', 'Berhasil', 'dihapus', 'success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: '.BASEURL.'/admin/data_kelas/');
            exit;
        } else {
            Flasher::seFlash('Kelas', 'Gagal', 'dihapus', 'danger'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: '.BASEURL.'/admin/data_kelas/');
            exit;
        }
    }

    // mengambil data kelas sesuai dengan ID
    public function getUbah() {
        echo json_encode($this->model('Kelas_model')->getKelasById($_POST['id']));
    }

    // mengubah data kelas sesuai id yang dipilih
    public function ubah() {
        if($this->model('Kelas_model')->ubahDataKelas($_POST) > 0) { //memanggil kelas_model untuk mengolah data
            Flasher::seFlash('Data Kelas', 'Berhasil', 'diubah', 'success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: '.BASEURL.'/admin/data_Data ');
            exit;
        } else {
            Flasher::seFlash('Data Kelas', 'Gagal', 'diubah', 'danger'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: '.BASEURL.'/admin/data_kelas');
            exit;
        }
    }

}