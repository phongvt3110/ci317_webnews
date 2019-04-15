<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 11/03/2018
 * Time: 21:32
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/Base_Controller.php';

class Users extends Base_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
    }
    public function __destruct() {
        parent::__destruct();
        // TODO: Implement __destruct() method.
    }
    public function listuser() {
        echo 'list';
    }
    public function add() {
        echo 'add user';
    }
}