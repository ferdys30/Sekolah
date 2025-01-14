<?php

class Kategori_model{
    private $table = 'kategori';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //query data atau menjalankan query dan hasil seluruh data
    public function getAllKategori()
    {
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }

    //query data atau menjalankan query dan hasil hanya 1 data sesuai id
    public function getKategoriById($id)
    {
        $this->db->query('SELECT * FROM '. $this->table.' WHERE id_kategori =:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    //menghitung jumlah kelas yang ada pada kategori tertentu
    // public function getJumlahKelasKategori()
    // {
    //     $query = "SELECT *, count(kelas.id_kategori) as total FROM kelas INNER JOIN kategori WHERE kategori.id_kategori = kelas.id_kategori GROUP BY kelas.id_kategori ";
    //     $this->db->query($query);
    //     return $this->db->resultSet();
    // }

    //tambah kategori baru
    public function tambahDataKategori($data){
        // var_dump($_FILES);die;
        $query = "INSERT INTO kategori 
                    VALUES 
                    ('', :nama_kategori, :hero_deskripsi, :hero_gambar)";

        $data['hero_gambar'] = $this->tambahGambar();

        $this->db->query($query);
        $this->db->bind('nama_kategori', $data['nama_kategori']); //$data[]'nama'] dari name form
        $this->db->bind('hero_deskripsi', $data['hero_deskripsi']); 
        $this->db->bind('hero_gambar',$data['hero_gambar'] ); 

        $this->db->execute();

        return $this->db->rowCount();
    }

    //ubah data
    public function ubahDataKategori($data){
        // var_dump($data);die;
        
        $query = "UPDATE ".$this->table." 
                    SET 
                    nama_kategori= :nama_kategori, 
                    hero_deskripsi= :hero_deskripsi, 
                    hero_gambar= :hero_gambar
                    WHERE id_kategori = :id_kategori
                    ";//nama_kelas= :nama_kelas kiri database kanan data yang di bind


        $fotolama = $data['e_hero_gambar'];
        
        if ($_FILES['hero_gambar']['error'] === 4) {
            $data['hero_gambar'] = $fotolama;
        } else {
            echo "Error code: " . $_FILES['hero_gambar']['error'];
            $tempat = "public/img/assets/kategori/" . $fotolama;
            unlink($tempat);
            $data['hero_gambar'] = $this->tambahGambar();
        }

        $this->db->query($query);
        $this->db->bind('nama_kategori', $data['nama_kategori']); //$data[]'nama'] dari name form
        $this->db->bind('hero_deskripsi', $data['hero_deskripsi']); 
        $this->db->bind('hero_gambar',$data['hero_gambar'] ); 
        $this->db->bind('id_kategori',$data['K_id_kategori'] ); 

        $this->db->execute();

        return $this->db->rowCount();

    }

    //menghapus data by id
    public function hapusDataKategori($id)
    {
        // $query ="DELETE FROM kelas WHERE id_profile=:id";
        $query ="DELETE FROM ". $this->table." WHERE id_kategori =:id";

        $this->db->query($query);
        $this->db->bind('id',$id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    // search data atau mencari data sesuai field keyword
    public function cariDataKategori(){
        $keyword = $_POST['keyword'];

        $query = "SELECT * FROM ". $this->table . " WHERE nama_kategori LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword',"%$keyword%");
        
        return $this->db->resultSet();
    }

    //gambar
    public function tambahGambar(){
        $namafile = $_FILES['hero_gambar']['name'];
        $ukuranfile = $_FILES['hero_gambar']['size'];
        $error = $_FILES['hero_gambar']['error'];
        $tmpname = $_FILES['hero_gambar']['tmp_name'];
    
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
        move_uploaded_file($tmpname, 'public/img/assets/kategori/' . $namafilebaru);
    
        return $namafilebaru;
    }
}
?>