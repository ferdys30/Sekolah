<?php

class Mentor_model {
    private $table = 'mentor';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    //mengambil seluruh data pada db mentor
    public function getAllMentor() {
        $this->db->query('SELECT * FROM '.$this->table.'
                            INNER JOIN kelas ON mentor.id_profile_mentor = kelas.id_mentor 
                            INNER JOIN kategori ON kelas.id_kategori=kategori.id_kategori');
        return $this->db->resultSet();
    }

    //mengambil seluruh data pada db mentor
    public function getMentorBelumMasuk() {
        $this->db->query('SELECT * FROM '.$this->table.'
                            LEFT JOIN kelas 
                            ON '.$this->table.'.id_profile_mentor = kelas.id_mentor
                            WHERE kelas.id_mentor IS NULL');
        return $this->db->resultSet();
    }

    //untuk edit data
    public function getMentorById($id) {
        $this->db->query('SELECT * FROM '.$this->table.' 
                            INNER JOIN login ON login.id_profile_mentor = mentor.id_profile_mentor
                            WHERE mentor.id_profile_mentor=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    //menampilkan jumlah data keseluruhan
    public function getJumlahMentor() {
        $query = "SELECT *, count(mentor.id_profile_mentor) as total FROM mentor";
        $this->db->query($query);
        return $this->db->single();
    }

    //tambah data kelas
    public function tambahDataMentor($data) {
        try {
            $this->db->beginTransaction(); // Mulai transaksi
            // var_dump($data);die;
            $query = "INSERT INTO ".$this->table."
                        VALUES 
                        ('', :nama_mentor, :foto_mentor, :email, :pekerjaan, :pengalaman, :ig, :linkedin, :git)";

            $data['foto_mentor'] = $this->tambahGambar();

            $this->db->query($query);
            $this->db->bind('nama_mentor', $data['nama_mentor']); //$data[]'nama'] dari name form
            $this->db->bind('foto_mentor', $data['foto_mentor']); //$data[]'nama'] dari name form
            $this->db->bind('email', $data['email']); //$data[]'nama'] dari name form
            $this->db->bind('pekerjaan', $data['pekerjaan']);
            $this->db->bind('pengalaman', $data['pengalaman']);
            $this->db->bind('ig', $data['ig']);
            $this->db->bind('linkedin', $data['linkedin']);
            $this->db->bind('git', $data['git']);

            $this->db->execute();

            $id_table1 = $this->db->getLastInsertId();

            $query2 = "INSERT INTO login (id_login, id_profile, id_profile_mentor, username, password, id_role)
                        VALUES 
                        ('', NULL, :id_profile_mentor, :username, :password, :id_role)";

            $this->db->query($query2);

            $role = 2;
            $this->db->bind('id_profile_mentor', $id_table1);
            $this->db->bind('username', $data['username']);
            $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
            $this->db->bind('id_role', $role);
            $this->db->execute();

            $this->db->commit();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            $this->db->rollBack(); // Rollback jika terjadi kesalahan
            die("Error: ".$e->getMessage());
        }

    }

    // ubah data mentor
    public function ubahDataMentor($data) {
        // var_dump($data);die;
        try {
            $this->db->beginTransaction(); // Mulai transaksi
            // var_dump($data);die;
            $query = "UPDATE ".$this->table."
                        SET 
                        nama_mentor = :nama_mentor, 
                        foto_mentor = :foto_mentor,
                        email = :email,
                        pekerjaan = :pekerjaan,
                        pengalaman = :pengalaman,
                        ig = :ig,
                        linkedin = :linkedin,
                        git = :git 
                        WHERE id_profile_mentor = :id_profile_mentor";

            $fotolama = $data['e_foto_mentor'];

            if($_FILES['foto_mentor']['error'] === 4) {
                $data['foto_mentor'] = $fotolama;
            } else {
                echo "Error code: ".$_FILES['foto_mentor']['error'];
                if($fotolama === "1.png") {
                    $data['foto_mentor'] = $this->tambahGambar();
                } else {
                    $tempat = "public/img/asset/".$fotolama;
                    unlink($tempat);
                    $data['foto_mentor'] = $this->tambahGambar();
                }
            }

            // var_dump($data);die;
            $this->db->query($query);
            $this->db->bind('id_profile_mentor', $data['id_profile_mentor']); //$data[]'nama'] dari name form
            $this->db->bind('nama_mentor', $data['nama_mentor']); //$data[]'nama'] dari name form
            $this->db->bind('foto_mentor', $data['foto_mentor']); //$data[]'nama'] dari name form
            $this->db->bind('email', $data['email']); //$data[]'nama'] dari name form
            $this->db->bind('pekerjaan', $data['pekerjaan']);
            $this->db->bind('pengalaman', $data['pengalaman']);
            $this->db->bind('ig', $data['ig']);
            $this->db->bind('linkedin', $data['linkedin']);
            $this->db->bind('git', $data['git']);

            $this->db->execute();

            $query2 = "UPDATE login SET
                        username = :username,
                        password = :password
                        WHERE id_profile_mentor = :id_profile_mentor";

            $this->db->query($query2);

            $this->db->bind('id_profile_mentor', $data['id_profile_mentor']);
            $this->db->bind('username', $data['username']);
            $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
            $this->db->execute();

            $this->db->commit();

            return $this->db->rowCount();

        } catch (PDOException $e) {
            $this->db->rollBack(); // Rollback jika terjadi kesalahan
            die("Error: ".$e->getMessage());
        }

    }

    //menghapus data mentor
    public function hapusDataMentor($id) {
        try {
            $this->db->beginTransaction();
            // var_dump($id);die;
            // $query ="DELETE FROM kelas WHERE id_profile=:id";
            $query = 'DELETE FROM mentor WHERE id_profile_mentor =:id';

            $this->db->query($query);
            $this->db->bind('id', $id);
            $this->db->execute();

            $query = "UPDATE kelas 
                    SET 
                    id_mentor = NULL
                    WHERE id_mentor = :id";

            $this->db->query($query);
            $this->db->bind('id', $id);
            $this->db->execute();

            $this->db->commit();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            $this->db->rollBack(); // Rollback jika terjadi kesalahan
            die("Error: ".$e->getMessage());
        }
    }

    //search pada mentor
    public function cariDataMentor() {
        $keyword = $_POST['keyword'];
        $pilihan = $_POST['pilihan'];

        // var_dump($pilihan);die;
        $query = "SELECT * FROM kelas
                    INNER JOIN mentor ON mentor.id_profile_mentor = kelas.id_mentor 
                    INNER JOIN kategori ON kelas.id_kategori=kategori.id_kategori 
                        WHERE mentor.nama_mentor LIKE :keyword AND
                              kelas.id_kelas LIKE :pilihan";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        $this->db->bind('pilihan', "%$pilihan%");

        return $this->db->resultSet();
    }

    //untuk tambah gambar
    public function tambahGambar() {
        $namafile = $_FILES['foto_mentor']['name'];
        $ukuranfile = $_FILES['foto_mentor']['size'];
        $error = $_FILES['foto_mentor']['error'];
        $tmpname = $_FILES['foto_mentor']['tmp_name'];

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
        move_uploaded_file($tmpname, 'public/img/profile/'.$namafilebaru);

        return $namafilebaru;
    }
}
?>