<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 19/02/2018
 * Time: 22:06
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct(){
        parent::__construct();
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function index()
    {
        if($this->session->has_userdata('user')){
            $data['user'] = $this->session->userdata('user');
        } else {
            $data['user'] = array(
                'id' => 1,
                'name' => 'Anonymous',
                'email' => 'anonymous@gmail.com',
                'phone' => '0983397580'
            );
        }
        $data['content'] = 'backend/simpla-admin/articles/index';
        $data['active'] = 'admin-articles';
        $this->load->view('backend/layouts/main-layout',isset($data)? $data : null);
    }

    public function listarticle(){
        if($this->session->has_userdata('user')){
            $data['user'] = $this->session->userdata('user');
            $data['content'] = 'backend/simpla-admin/articles/list';
            $data['active'] = 'admin-articles';
            $data['item_active'] = 'articles-list';
            $data['articles'] = $this->db->get('articles')->result_array();
            $this->load->view('backend/layouts/main-layout',isset($data)? $data : null);
        } else {
            redirect('admin/login');
        }
    }

    public function view(){
        if($this->session->has_userdata('user')){
            $data['user'] = $this->session->userdata('user');
        } else {
            $data['user'] = array(
                'id' => 1,
                'name' => 'Anonymous',
                'email' => 'anonymous@gmail.com',
                'phone' => '0983397580'
            );
        }
        $data['content'] = 'backend/simpla-admin/articles/list';
        $data['active'] = 'admin-view';
        $this->load->view('backend/layouts/main-layout', isset($data)?$data: null);
    }

    public function add(){
        if($this->session->has_userdata('user')){
            $data['user'] = $this->session->userdata('user');
        } else {
            $data['user'] = array(
                'id' => 1,
                'name' => 'Anonymous',
                'email' => 'anonymous@gmail.com',
                'phone' => '0983397580'
            );
        }
        $data['content'] = 'backend/simpla-admin/articles/add';
        $data['active'] = 'admin-articles';
        $data['item_active'] = 'articles-add';
        $this->load->view('backend/layouts/main-layout', isset($data)?$data: null);
    }
}
