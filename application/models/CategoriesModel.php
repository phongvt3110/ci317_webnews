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
                'type' => 'successful',
                'message' => 'Them du lieu thanh cong'
            ];
        } else {
            return [
                'type' => 'error',
                'message' => 'Khong co du lieu duoc them vao'
            ];
        }
    }

    public function update($cat){
        $this->db->update($this->tablename,$cat,['id'=> $cat['id']]);
        if($this->db->affected_rows()){
            return [
                'type' => 'successful',
                'message' => 'Cap nhat du lieu thanh cong'
            ];
        } else {
            return [
                'type' => 'error',
                'message' => 'Khong cap nhat duoc du lieu'
            ];
        }
    }

    public function delete($id){
//        $this->db->delete($this->tablename, ['id'=> $id]);
        $this->db->where(['id'=>$id])->delete($this->tablename);
        if($this->db->affected_rows()){
            return [
                'type' => 'successful',
                'message' => 'Xoa du lieu thanh cong'
            ];
        } else {
            return [
                'type' => 'error',
                'message' => 'Khong xoa duoc du lieu nao'
            ];
        }
    }

    public function deletelist($listId){
        $this->db->where_in('id',$listId)->delete($this->tablename);
        $flag = $this->db->affected_rows();
        if($flag > 0){
            return [
                'type' => 'successful',
                'message' => 'Xoa ('.$flag.') du lieu thanh cong'
            ];
        } else {
            return [
                'type' => 'error',
                'message' => 'Khong xoa duoc du lieu nao'
            ];
        }
    }

    public function publishedlist($listId) {
        $this->db->where_in('id',$listId)->update($this->tablename,['publish' => 'published']);
        $flag = $this->db->affected_rows();
        if($flag > 0){
            return [
                'type' => 'successful',
                'message' => 'Published ('.$flag.') du lieu thanh cong'
            ];
        } else {
            return [
                'type' => 'error',
                'message' => 'Khong publish duoc du lieu'
            ];
        }
    }

    public function unpublishedlist($listId) {
        $this->db->where_in('id',$listId)->update($this->tablename,['publish' => 'unpublished']);
        $flag = $this->db->affected_rows();
        if($flag > 0){
            return [
                'type' => 'successful',
                'message' => 'Unpublished ('.$flag.') du lieu thanh cong'
            ];
        } else {
            return [
                'type' => 'error',
                'message' => 'Khong co du lieu nao bi unpublished'
            ];
        }
    }

    public function total(){
        return $this->db->count_all($this->tablename);
    }
}