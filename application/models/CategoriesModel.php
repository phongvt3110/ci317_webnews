<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 08/03/2018
 * Time: 22:35
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class CategoriesModel extends CI_Model {
    protected $title = '';
    protected $description = '';
    protected $created_at = '';
    protected $updated_at = '';
    protected $tablename = 'categories';

    public function __construct()
    {
        parent::__construct();
    }

    public function get(){
        return $this->db->get($this->tablename)->result_array();
    }

    public function getOffsetLimit($offset, $limit){
        return $this->db->get($this->tablename)->limit($limit, $offset)->result_array();
    }

    public function find($id){
        return $this->db->get_where($this->tablename, ['id'=> $id])->first_row();
    }

    public function insert($cat){
        $this->db->insert($this->tablename,$cat);
        return $this->db->affected_rows();
    }

    public function update($cat){
        $this->db->update($this->tablename,$cat,['id'=> $cat['id']]);
        return $this->db->affected_rows();
    }

    public function delete($id){
        $this->db->delete($this->tablename, ['id'=> $id]);
        return $this->db->affected_rows();
    }

    public function count(){
        return $this->db->count_all($this->tablename);
    }
}