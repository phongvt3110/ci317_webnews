<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 09/03/2018
 * Time: 00:05
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class ArticlesModel extends CI_Model{
    protected $id = '';
    protected $title = '';
    protected $description = '';
    protected $catid = '';
    protected $created_at = '';
    protected $updated_at = '';
    protected $tablename = 'articles';

    public function __construct()
    {
        parent::__construct();
    }
    public function get(){
        return $this->db->get($this->tablename)->result_array();
    }
    public function find($id){
        return $this->db->get_where($this->tablename,['id'=>$id])->first_row();
    }
    public function insert($article){
        $this->db->insert($this->tablename,$article);
        return $this->db->affected_rows();
    }
    public function update($article){
        $this->db->update($this->tablename,$article,['id'=>$article['id']]);
        return $this->db->affected_rows();
    }
    public function delete($id){
        $this->db->delete($this->tablename,['id'=> $id]);
        return $this->db->affected_rows();
    }
    public function count(){
        return $this->db->count_all($this->tablename);
    }
}