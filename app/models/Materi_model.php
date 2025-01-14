<?php

class Materi_model{
    private $table = 'materi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getMateriById($id)
    {
        $this->db->query('SELECT * FROM '. $this->table . ' WHERE id_materi=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    // public function getJumlahMateri()
    // {
    //     $query = "SELECT *, count(materi.id_kelas) as total FROM materi 
    //                 INNER JOIN kelas 
    //                 WHERE kelas.id_kelas = materi.id_kelas GROUP BY materi.id_kelas ORDER BY total DESC
    //                 LIMIT 3";
    //     $this->db->query($query);
    //     return $this->db->resultSet();
    // }

    // public function getJumlahMateriById($id)
    // {
    //     $query = "SELECT *, count(materi.id_kelas) as total FROM materi INNER JOIN kelas 
    //         WHERE kelas.id_kelas = materi.id_kelas AND materi.id_kelas = $id
    //         GROUP BY materi.id_kelas";
    //     $this->db->query($query);
    //     return $this->db->resultSet();
    // }

    //menampilkan data materi yang dipegang oleh mentor
    public function getMateriByIdMentor($id)
    {
        $this->db->query('SELECT * FROM '. $this->table.'
                            INNER JOIN kelas ON kelas.id_kelas = '. $this->table.'.id_kelas 
                            WHERE kelas.id_mentor=:id');
        $this->db->bind('id',$id);
        return $this->db->resultSet();
    }

    //untuk menampilkan isi materi sesuai dengan id_kelas
    public function getMateriByIdkelas($id)
    {
        $this->db->query('SELECT * FROM '. $this->table.'
                            LEFT JOIN kelas ON kelas.id_kelas = '. $this->table.'.id_kelas 
                            WHERE kelas.id_kelas=:id');
        $this->db->bind('id',$id);
        return $this->db->resultSet();
    }

    public function cariMateriByIdMentor($id,$keyword)
    {
        $this->db->query('SELECT * FROM '. $this->table.'
                            INNER JOIN kelas ON kelas.id_kelas = '. $this->table.'.id_kelas 
                            WHERE kelas.id_mentor=:id AND materi.judul LIKE :keyword');
        $this->db->bind('id',$id);
        $this->db->bind('keyword',"%$keyword%");
        return $this->db->resultSet();
    }

    // menambah data
    public function tambahDataMateri($data){
        // var_dump($data);die;
        $query = "INSERT INTO ". $this->table." 
                    VALUES 
                    ('', :id_kelas, :urutan_materi, :judul, :link_materi, :deskripsi_materi)";

        // $data['file_penugasan'] = $this->tambahPenugasan();

        $this->db->query($query);
        $this->db->bind('id_kelas', $data['id_kelas']); //$data[]'nama'] dari name form
        $this->db->bind('urutan_materi', $data['urutan_materi']); //$data[]'nama'] dari name form
        $this->db->bind('judul', $data['judul']); 
        $this->db->bind('link_materi',$data['link_materi'] ); 
        $this->db->bind('deskripsi_materi', $data['deskripsi_materi']); 

        $this->db->execute();

        return $this->db->rowCount();

    }

    //menghapus data
    public function hapusDataMateri($id)
    {
        $query ="DELETE FROM ". $this->table." WHERE id_materi=:id";
        $this->db->query($query);
        $this->db->bind('id',$id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    //mengubah data
    public function ubahDataMateri($data){
        // var_dump($data);die;
        $query = "UPDATE ". $this->table."
                    SET 
                    urutan_materi = :urutan_materi,
                    judul = :judul,
                    link_materi = :link_materi,
                    deskripsi_materi = :deskripsi_materi
                    WHERE id_materi = :id_materi
                    ";//nama_kelas= :nama_kelas kiri database kanan data yang di bind


        // $filelama = $data['e_file_penugasan'];
        
        // if ($_FILES['file_penugasan']['error'] === 4) {
        //     $data['file_penugasan'] = $filelama;
        // } else {
        //     echo "Error code: " . $_FILES['file_penugasan']['error'];
        //     $tempat = "public/file/" . $filelama;
        //     unlink($tempat);
        //     $data['file_penugasan'] = $this->tambahPenugasan();
        // }
        // var_dump($data);die;

        $this->db->query($query);
        $this->db->bind('id_materi', $data['id_materi']); //$data[]'nama'] dari name form
        $this->db->bind('urutan_materi', $data['urutan_materi']); //$data[]'nama'] dari name form
        $this->db->bind('judul', $data['judul']); 
        $this->db->bind('link_materi',$data['link_materi'] ); 
        $this->db->bind('deskripsi_materi', $data['deskripsi_materi']); 

        $this->db->execute();

        return $this->db->rowCount();

    }

    // public function tambahPenugasan(){
    //     $namafile = $_FILES['file_penugasan']['name'];
    //     $ukuranfile = $_FILES['file_penugasan']['size'];
    //     $error = $_FILES['file_penugasan']['error'];
    //     $tmpname = $_FILES['file_penugasan']['tmp_name'];
    
    //     // cek apakah ada gambar yang diupload
    //     if ($error === 4) {
    //         return false;
    //     }
    
    //     // cek yang diupload ekstensinya apkah gambar atau bukan
    //     $ekstensiFileValid = ['pdf', 'docx'];
    //     $ekstensiFile = explode('.', $namafile); // sebagai pemisah antara nama file dengan ekstensi
    //     //  contohnya ferdy.png maka menjadi ['ferdy','png']
    //     $ekstensiFile = strtolower(end($ekstensiFile)); // strtolower merubah nama file menjadi lowercase/ huruf kecil
    //     // end mengambil explode yang paling akhir
    
    //     if (!in_array($ekstensiFile, $ekstensiFileValid)) { // melakukan pengecekan string didalam array
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
    //     $namafilebaru .= $ekstensiFile;
    
    //     // mengirim kedalam directory 
    //     move_uploaded_file($tmpname, 'public/file/' . $namafilebaru);
    
    //     return $namafilebaru;
    // }
}
?>