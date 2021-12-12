<?php

class Mahasiswa_m extends CI_Model{

    public function getAll(){
        $this->db->select('*');
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_prodi', 'tb_prodi.prodiID = tb_mahasiswa.mahasiswa_prodiID');
        $this->db->order_by('mahasiswaID', 'ASC');
        $query = $this->db->get();
        return $query;
    }

  public function getById($id){
        $this->db->select('*');
        $this->db->from('tb_mahasiswa');
        $this->db->where('mahasiswaID', $id);
        $query = $this->db->get();
        return $query;
    }


    public function addMahasiswa($post){
        $params = array(
            'mahasiswaNim' => $post['mahasiswaNim'],
            'mahasiswaNama' => $post['mahasiswaNama'],
            'mahasiswa_prodiID' => $post['prodiMahasiswaID'],
        );
        $this->db->insert('tb_mahasiswa', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    public function editMahasiswa($post){
        $params = array(
            'mahasiswaNim' => $post['mahasiswaNim'],
            'mahasiswaNama' => $post['mahasiswaNama'],
            'mahasiswa_prodiID' => $post['prodiMahasiswaID'],
        );
        $this->db->where('mahasiswaID ', $post['mahasiswaID']);
        $query = $this->db->update('tb_mahasiswa',$params);
        return $query;
    }

    public function deleteMahasiswa($id){
        $this->db->where('mahasiswaID', $id);
        $this->db->delete('tb_mahasiswa');
    }
}