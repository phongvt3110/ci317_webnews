<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 11/03/2018
 * Time: 21:32
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
    }
    public function listuser(){
        echo 'list';
    }
    public function add($user){
        echo 'add user';
    }
}