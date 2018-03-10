<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 09/03/2018
 * Time: 00:28
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model{
    protected $id = '';
    protected $name = '';
    protected $email = '';
    protected $phone = '';
    protected $password = '';
    protected $created_at = '';
    protected $updated_at = '';
    protected $tablename = 'users';
    public function __construct(){
        parent::__construct();
        $this->load->library('Passwordgen');
    }
    public function get(){
        return $this->db->get($this->tablename)->result_array();
    }
    public function getByName($name){
        return $this->db->get_where($this->tablename,['name'=>$name])->first_row();
    }
    public function checkPassword($passwordchecked,$password){
        if($this->passwordgen->verify_pass($passwordchecked, $password)) return true;
        else return false;
    }
}