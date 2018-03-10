<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 08/03/2018
 * Time: 22:35
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class CategoriesModel extends CI_Model {
    protected $id = '';
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
        if($this->db->affected_rows()){
            return [
                'type' => 'insert_successful',
                'message' => 'Them du lieu thanh cong'
            ];
        } else {
            return [
                'type' => 'insert_error',
                'message' => 'Khong co du lieu duoc them vao'
            ];
        }
    }

    public function update($cat){
        $this->db->update($this->tablename,$cat,['id'=> $cat['id']]);
        if($this->db->affected_rows()){
            return [
                'type' => 'update_successful',
                'message' => 'Cap nhat du lieu thanh cong'
            ];
        } else {
            return [
                'type' => 'update_error',
                'message' => 'Khong cap nhat duoc du lieu'
            ];
        }
    }

    public function delete($id){
        $this->db->delete($this->tablename, ['id'=> $id]);
        if($this->db->affected_rows()){
            return [
                'type' => 'delete_successful',
                'message' => 'Xoa du lieu thanh cong'
            ];
        } else {
            return [
                'type' => 'delete_error',
                'message' => 'Khong xoa duoc du lieu nao'
            ];
        }
    }

    public function count(){
        return $this->db->count_all($this->tablename);
    }
}