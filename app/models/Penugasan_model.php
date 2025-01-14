<?php

class Penugasan_model{
    private $table = 'penugasan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPenugasanById($id)
    {
        $this->db->query('SELECT * FROM '. $this->table.'
                                INNER JOIN profile ON penugasan.id_profile = profile.id_profile
                            WHERE id_penugasan=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    public function getPenugasanByIdKelas($id)
    {
        $this->db->query('SELECT * FROM '. $this->table.' WHERE id_kelas=:id');
        $this->db->bind('id',$id);
        return $this->db->resultSet();
    }

    public function getPenugasanByIdKelasUser($id,$id_user)
    {
        $this->db->query('SELECT * FROM '. $this->table.' WHERE id_kelas=:id AND id_profile = :id_user');
        $this->db->bind('id',$id);
        $this->db->bind('id_user',$id_user);
        return $this->db->resultSet();
    }

    public function getPenugasanByIdMentor($id,$id_kelas)
    {
        $this->db->query('SELECT * FROM '. $this->table.'
                            INNER JOIN profile ON penugasan.id_profile = profile.id_profile
                            INNER JOIN kelas ON kelas.id_kelas = '. $this->table.'.id_kelas 
                            WHERE kelas.id_mentor=:id AND '. $this->table.'.id_kelas= :id_kelas');
        $this->db->bind('id',$id);
        $this->db->bind('id_kelas',$id_kelas);
        return $this->db->resultSet();
    }

    // cari data
    public function cariPenugasanByIdMentor($id,$id_kelas,$keyword)
    {
        $this->db->query('SELECT * FROM '. $this->table.'
                            INNER JOIN profile ON penugasan.id_profile = profile.id_profile
                            INNER JOIN kelas ON kelas.id_kelas = '. $this->table.'.id_kelas 
                            WHERE kelas.id_mentor=:id AND '. $this->table.'.id_kelas= :id_kelas  AND  profile.nama_user LIKE :keyword');
        $this->db->bind('id',$id);
        $this->db->bind('id_kelas',$id_kelas);
        $this->db->bind('keyword',"%$keyword%");
        return $this->db->resultSet();
    }

    // menambah data
    public function tambahJawabanPenugasan($data){
        // var_dump($data);die;
        $query = "INSERT INTO ". $this->table ."
                    VALUE
                    ('', :id_kelas, :id_profile, :link_tugas_user, :waktu_pengumpulan, NULL, NULL)";

        date_default_timezone_set('Asia/Jakarta');
        $data['waktu_pengumpulan'] = date('Y-m-d H:i:s');
 
        $this->db->query($query);
        $this->db->bind('id_kelas', $data['id_kelas']); //$data[]'nama'] dari name form
        $this->db->bind('id_profile', $data['id_profile']);
        $this->db->bind('link_tugas_user', $data['link_tugas_user']);
        $this->db->bind('waktu_pengumpulan', $data['waktu_pengumpulan']);

        $this->db->execute();

        return $this->db->rowCount();

    }

    // menambah data
    public function ubahDataPenugasan($data){
        // var_dump($data);die;
        $query = "UPDATE kelas 
                    SET 
                    penugasan= :penugasan
                    WHERE id_kelas = :id_kelas";
 
        $this->db->query($query);
        $this->db->bind('id_kelas', $data['id_kelas']); //$data[]'nama'] dari name form
        $this->db->bind('penugasan', $data['penugasan']);

        $this->db->execute();

        return $this->db->rowCount();

    }

    // / menambah data
    public function tambahPenilaianPenugasan($data){
        // var_dump($data);die;
        $query = "UPDATE ". $this->table ."
                    SET
                    komentar_mentor = :komentar_mentor,
                    status = :status
                    WHERE id_penugasan = :id_penugasan ";

 
        $this->db->query($query);
        $this->db->bind('id_penugasan', $data['id_penugasan']); //$data[]'nama'] dari name form
        $this->db->bind('komentar_mentor', $data['komentar_mentor']);
        $this->db->bind('status', $data['status']);

        $this->db->execute();

        return $this->db->rowCount();

    }

    //menghapus data
    // public function hapusDataPenugasan($id)
    // {
    //     $query ="DELETE FROM '. $this->table.' WHERE id_Penugasan=:id";
    //     $this->db->query($query);
    //     $this->db->bind('id',$id);
    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }

    //mengubah data
    // public function ubahDataPenugasan($data){
    //     // var_dump($_FILES);die;
    //     $query = "UPDATE ". $this->table." 
    //                 SET 
    //                 nama_Penugasan = :nama_Penugasan,
    //                 link_download = :link_download,
    //                 gambar = :gambar
    //                 WHERE id_Penugasan = :id_Penugasan
    //                 ";//nama_kelas= :nama_kelas kiri database kanan data yang di bind


    //     $filelama = $data['e_gambar'];
        
    //     if ($_FILES['gambar']['error'] === 4) {
    //         $data['gambar'] = $filelama;
    //     } else {
    //         echo "Error code: " . $_FILES['gambar']['error'];
    //         $tempat = "public/img/assets/Penugasan/" . $filelama;
    //         unlink($tempat);
    //         $data['gambar'] = $this->tambahGambar();
    //     }
    //     // var_dump($data);die;

    //     $this->db->query($query);
    //     $this->db->bind('id_Penugasan', $data['id_Penugasan']); //$data[]'nama'] dari name form
    //     $this->db->bind('nama_Penugasan', $data['nama_Penugasan']); //$data[]'nama'] dari name form
    //     $this->db->bind('link_download', $data['link_download']); 
    //     $this->db->bind('gambar', $data['gambar']);

    //     $this->db->execute();

    //     return $this->db->rowCount();

    // }

    // public function tambahGambar(){
    //     $namafile = $_FILES['gambar']['name'];
    //     $ukuranfile = $_FILES['gambar']['size'];
    //     $error = $_FILES['gambar']['error'];
    //     $tmpname = $_FILES['gambar']['tmp_name'];
    
    //     // cek apakah ada gambar yang diupload
    //     if ($error === 4) {
    //         return false;
    //     }
    
    //     // cek apakah ada gambar yang diupload
    //     if ($error === 4) {
    //         return false;
    //     }
    
    //     // cek yang diupload ekstensinya apkah gambar atau bukan
    //     $ekstensigambarValid = ['jpg', 'png', 'jpeg'];
    //     $ekstensigambar = explode('.', $namafile); // sebagai pemisah antara nama file dengan ekstensi
    //     //  contohnya ferdy.png maka menjadi ['ferdy','png']
    //     $ekstensigambar = strtolower(end($ekstensigambar)); // strtolower merubah nama file menjadi lowercase/ huruf kecil
    //     // end mengambil explode yang paling akhir
    
    //     if (!in_array($ekstensigambar, $ekstensigambarValid)) { // melakukan pengecekan string didalam array
    //         // fungsi ini menghasilkan true jika ada false jika tidak
    //         return false;
    //     }
    
    //     // cek jika ukurannya terlalu besar
    //     if ($ukuranfile > 5000000000) { //dalam bentuk byte
    //         return false;
    //     }
    
    //     //lolos pengecekan gambar siap diupload
    
    //     // generate nama gambar random baruu
    //     $namafilebaru = uniqid();
    //     $namafilebaru .= '.';
    //     $namafilebaru .= $ekstensigambar;
    
    //     // mengirim kedalam directory 
    //     move_uploaded_file($tmpname, 'public/img/assets/Penugasan/' . $namafilebaru);
    
    //     return $namafilebaru;
    // }
}
?>