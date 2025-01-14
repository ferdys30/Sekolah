<?php

class Penilaian_model{
    private $table = 'penilaian';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPenilaian()
    {
        $this->db->query('SELECT * FROM '. $this->table.' INNER JOIN profile WHERE profile.id_profile = '. $this->table.'.id_profile');
        return $this->db->resultSet();
    }

    // kelas saya
    // public function getPenilaianByIdProfile($id)
    // {
    //     $this->db->query('SELECT * FROM '. $this->table.' INNER JOIN profile WHERE profile.id_profile = '. $this->table.'.id_profile AND '. $this->table.'.id_profile = :id');
    //     $this->db->bind('id',$id);
    //     return $this->db->single();
    // }

    // detail kelas 
    public function getPenilaianByIdKelas($id)
    {
        $this->db->query('SELECT * FROM '. $this->table.' 
                        LEFT JOIN data_user ON data_user.id_data_user = '. $this->table.'.id_data_user
                        LEFT JOIN profile ON profile.id_profile = '. $this->table.'.id_profile
                        LEFT JOIN kelas ON kelas.id_kelas = data_user.id_kelas 
                        WHERE data_user.id_kelas = :id');
        $this->db->bind('id',$id);
        return $this->db->resultSet();
    }

    // menampilkan nama user yang ingin review
    public function getDataByIdKelas($id)
    {
        // var_dump($id);die;
        $this->db->query('SELECT * FROM data_user
                        INNER JOIN kelas ON kelas.id_kelas = data_user.id_kelas
                        WHERE data_user.id_kelas = :id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    public function tambahDataPenilaian($data)
    {
        // var_dump($data);die;
        $query = "INSERT INTO ". $this->table ." 
                    VALUES 
                    ('', :id_profile, :id_data_user, :komentar_user, :asal_instansi)";


        $this->db->query($query);
        $this->db->bind('id_profile', $data['id_profile']); //$data[]'nama'] dari name form
        $this->db->bind('id_data_user', $data['id_data_user']); //$data[]'nama'] dari name form
        $this->db->bind('komentar_user', $data['komentar_user']);
        $this->db->bind('asal_instansi', $data['asal_instansi']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
?>