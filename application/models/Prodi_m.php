<?php

class Prodi_m extends CI_Model{

    public function getAll(){
        $this->db->select('*');
        $this->db->from('tb_prodi');
        $this->db->join('tb_fakultas', 'tb_fakultas.fakultasID = tb_prodi.prodi_fakultasID');
        $this->db->order_by('prodiID', 'ASC');
        $query = $this->db->get();
        return $query;
    }


    
    public function getById($id){
        $this->db->select('*');
        $this->db->from('tb_prodi');
        $this->db->where('prodiID', $id);
        $query = $this->db->get();
        return $query;
    }

    public function getFakultasById($id){
        $this->db->select('*');
        $this->db->from('tb_prodi');
        $this->db->where('prodi_fakultasID', $id);
        $query = $this->db->get();
        return $query;
    }

    


    public function addProdi($post){
        $params = array(
            'prodiKD' => $post['prodiKD'],
            'prodiNama' => $post['prodiNama'],
            'prodi_fakultasID' => $post['prodiFakultasID'],
        );
        $this->db->insert('tb_prodi', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    public function editProdi($post){
        $params = array(
            'prodiKD' => $post['prodiKD'],
            'prodiNama' => $post['prodiNama'],
            'prodi_fakultasID' => $post['prodiFakultasID'],
        );
        $this->db->where('prodiID ', $post['prodiID']);
        $query = $this->db->update('tb_prodi',$params);
        return $query;
    }

    public function deleteProdi($id){
        $this->db->where('prodiID', $id);
        $this->db->delete('tb_prodi');
    }
}