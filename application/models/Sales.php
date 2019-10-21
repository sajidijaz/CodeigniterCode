<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Model {
    private $table = "sales";


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

}
