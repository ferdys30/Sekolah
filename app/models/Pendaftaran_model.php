<?php

class Pendaftaran_model{
    private $table = 'data_user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    //menampilkan jumlah data detail dari tiap kelas
    public function hitungPendaftarKelas()
    {
        $this->db->query('SELECT *, count(data_user.id_kelas) as total FROM '. $this->table.' 
                        LEFT JOIN kelas ON data_user.id_kelas = kelas.id_kelas
                        LEFT JOIN kategori ON kelas.id_kategori = kategori.id_kategori GROUP BY kelas.id_kelas');
        return $this->db->resultSet();
    }

    // mengambil data id_profile untuk mendaftar kelas
    public function getPendaftarById($id)
    {
        $this->db->query('SELECT * FROM login 
                            INNER JOIN profile 
                            WHERE profile.id_profile = login.id_profile AND login.id_profile = :id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    // mengambil data id_profile untuk mendaftar kelas
    public function getDataUserById($id)
    {
        $this->db->query('SELECT id_kelas FROM ' . $this->table . ' WHERE id_profile = :id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    //menampilkan jumlah data yang tergabung berdasarkan kategori
    public function getJumlahPendaftarByKategori()
    {
        $query = "SELECT *, count(data_user.id_kelas) as total 
                    FROM kategori 
                    LEFT JOIN kelas ON kelas.id_kategori = kategori.id_kategori 
                    LEFT JOIN data_user ON kelas.id_kelas = data_user.id_kelas 
                    GROUP By kategori.id_kategori";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    //menampilkan jumlah data keseluruhan
    public function getJumlahPendaftar()
    {
        $query = "SELECT *, count(data_user.id_kelas) as total 
                    FROM data_user 
                    INNER JOIN kelas WHERE kelas.id_kelas = data_user.id_kelas";
        $this->db->query($query);
        return $this->db->single();
    }

    //getJumlahTerbanyak
    public function getJumlahTerbanyak()
    {
        $query = "SELECT kelas.thumbnail,kategori.nama_kategori, kelas.id_kelas, kelas.nama_kelas, COUNT(data_user.id_kelas) AS total_data_user,
                        (SELECT COUNT(materi.id_kelas) FROM materi WHERE materi.id_kelas = kelas.id_kelas) AS total_materi
                            FROM kelas
                            LEFT JOIN data_user ON kelas.id_kelas = data_user.id_kelas
                            LEFT JOIN kategori ON kelas.id_kategori = kategori.id_kategori
                            GROUP BY kelas.id_kelas, kelas.nama_kelas ORDER BY total_data_user DESC
                            LIMIT 3";
        $this->db->query($query);
        return $this->db->resultSet();
    }

 
    //search data
    public function cariDataPendaftaran(){
        $keyword = $_POST['keyword'];

        $query = "SELECT * FROM data_user INNER JOIN profile WHERE data_user.id_profile = profile.id_profile AND profile.nama_user LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword',"%$keyword%");
        
        return $this->db->resultSet();
    }

    public function tambahDataPendaftaran($data)
    {
        // var_dump($data);die;
        $query = "INSERT INTO ". $this->table ." 
                    VALUES 
                    ('', :id_kelas, :id_profile, :tgl_pendaftaran)";

        date_default_timezone_set('Asia/Jakarta');
        $data['tgl_pendaftaran'] = date('Y-m-d H:i:s');

        $this->db->query($query);
        $this->db->bind('id_kelas', $data['id_kelas']); //$data[]'nama'] dari name form
        $this->db->bind('id_profile', $data['id_profile']); //$data[]'nama'] dari name form
        $this->db->bind('tgl_pendaftaran', $data['tgl_pendaftaran']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tambahDataPendaftaranMentor($data)
    {
        // var_dump($data);die;
        $query = "UPDATE kelas 
                    SET 
                    id_mentor = :id_profile_mentor
                    WHERE id_kelas = :id_kelas";

        $this->db->query($query);
        $this->db->bind('id_profile_mentor', $data['id_profile_mentor']); //$data[]'nama'] dari name form
        $this->db->bind('id_kelas', $data['id_kelas']); //$data[]'nama'] dari name form

        $this->db->execute();

        return $this->db->rowCount();
    }
}
?>