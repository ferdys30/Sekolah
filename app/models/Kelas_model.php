<?php

class Kelas_model {
    private $table = 'kelas';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // query data kelas dan tampilkan seluruh data
    public function getAllKelas() {
        $this->db->query('SELECT * FROM '.$this->table.' 
                        INNER JOIN kategori ON kategori.id_kategori = kelas.id_kategori');
        return $this->db->resultSet();
    }

    // query data kelas sesuai dengan id kelas dan tampilkan satu data
    public function getKelasById($id) {
        // var_dump($id);die;
        $this->db->query('SELECT * FROM '.$this->table.' 
                            INNER JOIN kategori ON kategori.id_kategori = kelas.id_kategori 
                            WHERE kelas.id_kelas=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getDetailKelasById($id) {
        // var_dump($id);die;
        $this->db->query('SELECT * FROM '.$this->table.' 
                            LEFT JOIN kategori ON kategori.id_kategori = kelas.id_kategori 
                            LEFT JOIN mentor ON mentor.id_profile_mentor = kelas.id_mentor 
                            WHERE kelas.id_kelas=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    //untuk halaman admin mencari apakah mentor sudah daftar
    public function getKelasByIdMentor($id) {
        $this->db->query('SELECT * FROM '.$this->table.' WHERE id_mentor=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getKelasByIdUser($id) {
        // var_dump($id);die;
        $this->db->query('SELECT *, COUNT(data_user.id_kelas) AS total_data_user,
                                (SELECT COUNT(materi.id_kelas) FROM materi WHERE materi.id_kelas = kelas.id_kelas) AS total_materi
                            FROM data_user
                            LEFT JOIN kelas ON data_user.id_kelas = kelas.id_kelas
                            LEFT JOIN kategori ON kelas.id_kategori = kategori.id_kategori
                            WHERE data_user.id_profile = :id
                            GROUP BY data_user.id_kelas, data_user.id_data_user, data_user.id_profile, data_user.tgl_pendaftaran;
                            ');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    //digunakan untuk mentor mencari data
    public function getKelasByKode() {
        // var_dump($_POST);die;
        $keyword = $_POST['keyword'];

        $query = 'SELECT * FROM '.$this->table.' 
                    INNER JOIN kategori ON kategori.id_kategori = kelas.id_kategori 
                    WHERE kode_kelas LIKE :keyword AND kelas.id_mentor IS NULL';

        $this->db->query($query);
        $this->db->bind('keyword', $keyword);
        return $this->db->single();
    }

    // query data kelas sesuai dengan id kategori dan tampilkan satu data, digunakan pada halaman kategori
    public function getKelasByKategoriId($id) {
        $this->db->query('SELECT kelas.id_kelas,kelas.thumbnail,kelas.nama_kelas,kategori.*, COUNT(data_user.id_kelas) AS total_data_user,
                            (SELECT COUNT(materi.id_kelas) FROM materi WHERE materi.id_kelas = kelas.id_kelas) AS total_materi
                             FROM '.$this->table.' 
                                LEFT JOIN data_user ON kelas.id_kelas = data_user.id_kelas
                                LEFT JOIN kategori ON kategori.id_kategori = kelas.id_kategori
                                WHERE kelas.id_kategori=:id
                                GROUP BY kelas.id_kelas, kelas.nama_kelas');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    // menambah data
    public function tambahDataKelas($data) {
        $kode_kelas = $data['kode_kelas'];

        try {
            // Start a transaction
            $this->db->beginTransaction();

            // Check if kode_kelas is unique
            if($this->cekKodeKelas($kode_kelas)) {
                // Kode_kelas is unique, proceed with the insertion
                $query = "INSERT INTO kelas 
                            VALUES 
                            ('', :id_kategori, NULL, :nama_kelas, :detail, :thumbnail, :detail_program, :deskripsi, NULL, :kode_kelas)";

                $data['thumbnail'] = $this->tambahGambar();

                $this->db->query($query);
                $this->db->bind('id_kategori', $data['id_kategori']);
                $this->db->bind('nama_kelas', $data['nama_kelas']);
                $this->db->bind('detail', $data['detail']);
                $this->db->bind('thumbnail', $data['thumbnail']);
                $this->db->bind('detail_program', $data['detail_program']);
                $this->db->bind('deskripsi', $data['deskripsi']);
                $this->db->bind('kode_kelas', $data['kode_kelas']);

                // Execute the query
                $this->db->execute();

                // Commit the transaction
                $this->db->commit();
            } else {
                // Kode_kelas is not unique, rollback the transaction
                $this->db->rollBack();
                echo "Error: kode_kelas must be unique.";
            }
        } catch (PDOException $e) {
            // Handle any exceptions that occurred during the transaction
            $this->db->rollBack();
            echo "Error: ".$e->getMessage();
        }
    }
    private function cekKodeKelas($kode_kelas) {
        // Query to check if kode_kelas is unique
        $query = "SELECT COUNT(*) AS count FROM kelas WHERE kode_kelas = :kode_kelas";
        $this->db->query($query);
        $this->db->bind('kode_kelas', $kode_kelas);
        $result = $this->db->single();

        return $result['count'] == 0; // If count is 0, kode_kelas is unique
    }

    //menghapus data
    public function hapusDataKelas($id) {
        $query = "DELETE FROM kelas WHERE id_kelas=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    //mengubah data
    public function ubahDataKelas($data) {

        $query = "UPDATE kelas 
                    SET 
                    id_kategori= :id_kategori, 
                    nama_kelas= :nama_kelas, 
                    detail= :detail, 
                    thumbnail= :thumbnail,
                    detail_program = :detail_program,
                    deskripsi= :deskripsi,
                    kode_kelas= :kode_kelas
                    WHERE id_kelas = :id_kelas
                    "; //nama_kelas= :nama_kelas kiri database kanan data yang di bind


        $fotolama = $data['e_thumbnail'];

        if($_FILES['thumbnail']['error'] === 4) {
            $data['thumbnail'] = $fotolama;
        } else {
            echo "Error code: ".$_FILES['thumbnail']['error'];
            $tempat = "public/img/asset/kelas/".$fotolama;
            unlink($tempat);
            $data['thumbnail'] = $this->tambahGambar();
        }
        // var_dump($data);die;

        $this->db->query($query);
        $this->db->bind('id_kelas', $data['id_kelas']);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->bind('nama_kelas', $data['nama_kelas']); //$data[]'nama'] dari name form
        $this->db->bind('detail', $data['detail']);
        $this->db->bind('thumbnail', $data['thumbnail']);
        $this->db->bind('detail_program', $data['detail_program']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('kode_kelas', $data['kode_kelas']);

        $this->db->execute();

        return $this->db->rowCount();

    }

    //search data
    public function cariDataKelas() {
        $keyword = $_POST['keyword'];

        $query = "SELECT * FROM kelas WHERE nama_kelas LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resultSet();
    }

    //gambar
    public function tambahGambar() {
        $namafile = $_FILES['thumbnail']['name'];
        $ukuranfile = $_FILES['thumbnail']['size'];
        $error = $_FILES['thumbnail']['error'];
        $tmpname = $_FILES['thumbnail']['tmp_name'];

        // cek apakah ada gambar yang diupload
        if($error === 4) {
            return false;
        }

        // cek yang diupload ekstensinya apkah gambar atau bukan
        $ekstensigambarValid = ['jpg', 'png', 'jpeg'];
        $ekstensigambar = explode('.', $namafile); // sebagai pemisah antara nama file dengan ekstensi
        //  contohnya ferdy.png maka menjadi ['ferdy','png']
        $ekstensigambar = strtolower(end($ekstensigambar)); // strtolower merubah nama file menjadi lowercase/ huruf kecil
        // end mengambil explode yang paling akhir

        if(!in_array($ekstensigambar, $ekstensigambarValid)) { // melakukan pengecekan string didalam array
            // fungsi ini menghasilkan true jika ada false jika tidak
            return false;
        }

        // cek jika ukurannya terlalu besar
        if($ukuranfile > 5000000000) { //dalam bentuk byte
            return false;
        }

        //lolos pengecekan gambar siap diupload

        // generate nama gambar random baruu
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $ekstensigambar;

        // mengirim kedalam directory 
        move_uploaded_file($tmpname, 'public/img/assets/kelas/'.$namafilebaru);

        return $namafilebaru;
    }

}
?>