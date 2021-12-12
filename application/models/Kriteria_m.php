<?php

class Kriteria_m extends CI_Model{

    public function getAll(){
        $this->db->select('*');
        $this->db->from('tb_kriteria');
        $this->db->order_by('kriteriaID', 'ASC');
        $query = $this->db->get();
        return $query;
    }

  

    
    public function getById($id){
        $this->db->select('*');
        $this->db->from('tb_kriteria');
        $this->db->where('kriteriaID', $id);
        $query = $this->db->get();
        return $query;
    }

    

    public function addKriteria($post){
        $params = array(
            'kriteriaKD' => $post['kriteriaKD'],
            'kriteriaDesk' => $post['kriteriaDesk'],
            'kriteriaBobot' => $post['kriteriaBobot'],
            'kriteriaAtribut' => $post['kriteriaAtribut'],
        );
        $query = $this->db->insert('tb_kriteria', $params);
        // $id = $this->db->insert_id();
        return $query;
    }

    public function editKriteria($post){
        $params = array(
            'kriteriaKD' => $post['kriteriaKD'],
            'kriteriaDesk' => $post['kriteriaDesk'],
            'kriteriaBobot' => $post['kriteriaBobot'],
            'kriteriaAtribut' => $post['kriteriaAtribut'],
        );
        $this->db->where('kriteriaID ', $post['kriteriaID']);
        $query = $this->db->update('tb_kriteria',$params);
        return $query;
    }

    public function deleteKriteria($id){
        $this->db->where('kriteriaID', $id);
        $this->db->delete('tb_kriteria');
    }
}