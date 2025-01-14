<?php

class User_model{
    private $table = 'data_user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //untuk menampilkan data user pada halaman admin
    public function getAllUser()
    {
        $this->db->query('SELECT * FROM '. $this->table . ' 
                            INNER JOIN  profile ON '.$this->table.'.id_profile=profile.id_profile
                            INNER JOIN  kelas ON '.$this->table.'.id_kelas=kelas.id_kelas
                            INNER JOIN  kategori ON kelas.id_kategori=kategori.id_kategori');
        return $this->db->resultSet();
    }

    //untuk melihat data user
    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM '. $this->table . ' 
                            INNER JOIN  profile ON '.$this->table.'.id_profile=profile.id_profile 
                            INNER JOIN  kelas ON '.$this->table.'.id_kelas=kelas.id_kelas
                            INNER JOIN  kategori ON kelas.id_kategori=kategori.id_kategori
                            WHERE '.$this->table.'.id_data_user=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    //mengambil data user dari id_kelas
    public function getUserByIdKelas($id)
    {
        $this->db->query('SELECT data_user.*,profile.*
                            FROM data_user
                            INNER JOIN profile ON data_user.id_profile = profile.id_profile
                            INNER JOIN kelas ON data_user.id_kelas = kelas.id_kelas
                            INNER JOIN kategori ON kelas.id_kategori = kategori.id_kategori
                            LEFT JOIN materi ON kelas.id_kelas = materi.id_kelas WHERE data_user.id_kelas = :id
                            GROUP BY data_user.id_data_user, data_user.id_kelas, data_user.id_profile;
                            ');

        $this->db->bind('id',$id);
        return $this->db->resultSet();
    }

    public function cariUserByIdKelas($id,$keyword)
    {
        $this->db->query('SELECT * FROM '. $this->table . ' 
                            INNER JOIN  profile ON '.$this->table.'.id_profile=profile.id_profile 
                            INNER JOIN  kelas ON '.$this->table.'.id_kelas=kelas.id_kelas
                            INNER JOIN  kategori ON kelas.id_kategori=kategori.id_kategori
                            WHERE '.$this->table.'.id_kelas=:id AND profile.nama_user LIKE :keyword');

        $this->db->bind('id',$id);
        $this->db->bind('keyword',"%$keyword%");
        return $this->db->resultSet();
    }

    public function ubahDataProfile($data){
        try {
            $this->db->beginTransaction(); // Mulai transaksi
            // var_dump($data);die;
            $query = "UPDATE profile
                        SET 
                        nama_mentor = :nama_mentor, 
                        foto_mentor = :foto_mentor,
                        email = :email,
                        pekerjaan = :pekerjaan,
                        pengalaman = :pengalaman,
                        ig = :ig,
                        linkedin = :linkedin,
                        git = :git 
                        WHERE id_profile = :id_profile";

            $fotolama = $data['e_foto_mentor'];
        
            if ($_FILES['foto_mentor']['error'] === 4) {
                $data['foto_mentor'] = $fotolama;
            } else {
                echo "Error code: " . $_FILES['foto_mentor']['error'];
                $tempat = "public/img/asset/" . $fotolama;
                unlink($tempat);
                $data['foto_mentor'] = $this->tambahGambar();
            }

            // var_dump($data);die;
            $this->db->query($query);
            $this->db->bind('id_profile_mentor', $data['id_profile_mentor']); //$data[]'nama'] dari name form
            $this->db->bind('nama_mentor', $data['nama_mentor']); //$data[]'nama'] dari name form
            $this->db->bind('foto_mentor', $data['foto_mentor']); //$data[]'nama'] dari name form
            $this->db->bind('email', $data['email']); //$data[]'nama'] dari name form
            $this->db->bind('pekerjaan', $data['pekerjaan']); 
            $this->db->bind('pengalaman',$data['pengalaman'] ); 
            $this->db->bind('ig', $data['ig']); 
            $this->db->bind('linkedin', $data['linkedin']); 
            $this->db->bind('git', $data['git']); 

            $this->db->execute();

            $id_table1 = $this->db->getLastInsertId();

            $query2 = "UPDATE login SET
                        username = :username,
                        password = :password
                        WHERE id_profile = :id_profile";

            $this->db->query($query2);

            $role = 2;
            $this->db->bind('id_profile_mentor', $id_table1); 
            $this->db->bind('username',$data['username'] ); 
            $this->db->bind('password',password_hash($data['password'], PASSWORD_DEFAULT) ); 
            $this->db->execute();

            $this->db->commit();
        } catch (PDOException $e) {
            $this->db->rollBack(); // Rollback jika terjadi kesalahan
            die("Error: " . $e->getMessage());
        }

    }

    public function hapusDataUser($id)
    {
        // $query ="DELETE FROM kelas WHERE id_profile=:id";
        $query ="DELETE FROM data_user  WHERE id_data_user =:id";

        $this->db->query($query);
        $this->db->bind('id',$id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    // public function hapusDataUser($id)
    // {
    //     // $query ="DELETE FROM kelas WHERE id_profile=:id";
    //     $query ="DELETE login, profile FROM login INNER JOIN profile ON login.id_profile=profile.id_profile WHERE login.id_profile AND profile.id_profile =:id";

    //     $this->db->query($query);
    //     $this->db->bind('id',$id);
    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }

    //search pada user
    public function cariDataUser()
    {
        $keyword = $_POST['keyword'];
        $pilihan = $_POST['pilihan'];

        $query = "SELECT * FROM data_user 
                    INNER JOIN profile ON data_user.id_profile=profile.id_profile 
                    INNER JOIN kelas ON data_user.id_kelas=kelas.id_kelas 
                    INNER JOIN kategori ON kelas.id_kategori=kategori.id_kategori 
                        WHERE profile.nama_user LIKE :keyword AND
                              kelas.id_kelas LIKE :pilihan";

        $this->db->query($query);
        $this->db->bind('keyword',"%$keyword%");
        $this->db->bind('pilihan',"%$pilihan%");
        
        return $this->db->resultSet();
    }

    public function tambahGambar(){
        $namafile = $_FILES['foto_mentor']['name'];
        $ukuranfile = $_FILES['foto_mentor']['size'];
        $error = $_FILES['foto_mentor']['error'];
        $tmpname = $_FILES['foto_mentor']['tmp_name'];
    
        // cek apakah ada gambar yang diupload
        if ($error === 4) {
            return false;
        }
    
        // cek yang diupload ekstensinya apkah gambar atau bukan
        $ekstensigambarValid = ['jpg', 'png', 'jpeg'];
        $ekstensigambar = explode('.', $namafile); // sebagai pemisah antara nama file dengan ekstensi
        //  contohnya ferdy.png maka menjadi ['ferdy','png']
        $ekstensigambar = strtolower(end($ekstensigambar)); // strtolower merubah nama file menjadi lowercase/ huruf kecil
        // end mengambil explode yang paling akhir
    
        if (!in_array($ekstensigambar, $ekstensigambarValid)) { // melakukan pengecekan string didalam array
            // fungsi ini menghasilkan true jika ada false jika tidak
            return false;
        }
    
        // cek jika ukurannya terlalu besar
        if ($ukuranfile > 5000000000) { //dalam bentuk byte
            return false;
        }
    
        //lolos pengecekan gambar siap diupload
    
        // generate nama gambar random baruu
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $ekstensigambar;
    
        // mengirim kedalam directory 
        move_uploaded_file($tmpname, 'public/img/profile/' . $namafilebaru);
    
        return $namafilebaru;
    }
}
?>