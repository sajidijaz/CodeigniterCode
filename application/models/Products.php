<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Model {
    private $table = "products";

    /**
     * @param $data
     * @return bool
     */
    public function save($data){
        $this->db->insert($this->table,$data);
        if($this->db->affected_rows() > 0 ){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    /**
     * @param $data
     * @param $id
     */
    public function update($data, $id){
        $data['updated_at'] = date('Y-m-d h:i:s');
        $this->db->where(array('id'=>$id))
            ->update($this->table, $data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function exists($data){
        return $this->db->where($data)
            ->get($this->table)
            ->row_array();
    }

    /**
     * @param $term
     * @return mixed
     */
    public function search($term)
    {
        return $this->db->select('id,name')->like('name', $term, 'both')->get($this->table)->result_array();
    }

}
