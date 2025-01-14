<?php

class Tools_model{
    private $table = 'tools';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getToolsById($id)
    {
        $this->db->query('SELECT * FROM '. $this->table.' WHERE id_tools=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    public function getToolsByIdKelas($id)
    {
        $this->db->query('SELECT * FROM '. $this->table.' WHERE id_kelas=:id');
        $this->db->bind('id',$id);
        return $this->db->resultSet();
    }

    public function getToolsByIdMentor($id)
    {
        $this->db->query('SELECT * FROM '. $this->table.'
                            INNER JOIN kelas ON kelas.id_kelas = '. $this->table.'.id_kelas 
                            WHERE kelas.id_mentor=:id');
        $this->db->bind('id',$id);
        return $this->db->resultSet();
    }

    public function cariToolsByIdMentor($id,$keyword)
    {
        $this->db->query('SELECT * FROM '. $this->table.'
                            INNER JOIN kelas ON kelas.id_kelas = '. $this->table.'.id_kelas 
                            WHERE kelas.id_mentor=:id AND tools.nama_tools LIKE :keyword');
        $this->db->bind('id',$id);
        $this->db->bind('keyword',"%$keyword%");
        return $this->db->resultSet();
    }

    // menambah data
    public function tambahDataTools($data){
        // var_dump($data);die;
        $query = "INSERT INTO ". $this->table." 
                    VALUES 
                    ('', :id_kelas, :nama_tools, :link_download, :gambar)";

        $data['gambar'] = $this->tambahGambar();

        $this->db->query($query);
        $this->db->bind('id_kelas', $data['id_kelas']); //$data[]'nama'] dari name form
        $this->db->bind('nama_tools', $data['nama_tools']); //$data[]'nama'] dari name form
        $this->db->bind('link_download', $data['link_download']); 
        $this->db->bind('gambar', $data['gambar']);

        $this->db->execute();

        return $this->db->rowCount();

    }

    //menghapus data
    public function hapusDataTools($id)
    {
        $query ="DELETE FROM ". $this->table." WHERE id_tools=:id";
        $this->db->query($query);
        $this->db->bind('id',$id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    //mengubah data
    public function ubahDataTools($data){
        // var_dump($_FILES);die;
        $query = "UPDATE ". $this->table." 
                    SET 
                    nama_tools = :nama_tools,
                    link_download = :link_download,
                    gambar = :gambar
                    WHERE id_tools = :id_tools
                    ";//nama_kelas= :nama_kelas kiri database kanan data yang di bind


        $filelama = $data['e_gambar'];
        
        if ($_FILES['gambar']['error'] === 4) {
            $data['gambar'] = $filelama;
        } else {
            echo "Error code: " . $_FILES['gambar']['error'];
            $tempat = "public/img/assets/tools/" . $filelama;
            unlink($tempat);
            $data['gambar'] = $this->tambahGambar();
        }
        // var_dump($data);die;

        $this->db->query($query);
        $this->db->bind('id_tools', $data['id_tools']); //$data[]'nama'] dari name form
        $this->db->bind('nama_tools', $data['nama_tools']); //$data[]'nama'] dari name form
        $this->db->bind('link_download', $data['link_download']); 
        $this->db->bind('gambar', $data['gambar']);

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function tambahGambar(){
        $namafile = $_FILES['gambar']['name'];
        $ukuranfile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpname = $_FILES['gambar']['tmp_name'];
    
        // cek apakah ada gambar yang diupload
        if ($error === 4) {
            return false;
        }
    
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
        move_uploaded_file($tmpname, 'public/img/assets/tools/' . $namafilebaru);
    
        return $namafilebaru;
    }
}
?>