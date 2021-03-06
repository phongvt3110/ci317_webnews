<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 19/02/2018
 * Time: 22:06
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/Base_Controller.php';

class Articles extends Base_Controller {

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
        $this->load->model('ArticlesModel');
    }

    public function __destruct()
    {
        parent::__destruct();
        // TODO: Implement __destruct() method.
    }

    public function index()
    {
        if($this->session->has_userdata('user')){
            $data['user'] = $this->session->userdata('user');
            $data['content'] = 'backend/simpla-admin/articles/index';
            $data['active'] = 'admin-articles';
            $this->load->view('backend/layouts/main-layout',isset($data)? $data : null);
        } else {
            redirect('admin/login');
        }
    }

    public function listarticle(){
        if($this->session->has_userdata('user')){
            $data['user'] = $this->session->userdata('user');
            $data['content'] = 'backend/simpla-admin/articles/list';
            $data['active'] = 'admin-articles';
            $data['item_active'] = 'articles-list';
            $data['articles'] = $this->ArticlesModel->get();
            $this->load->view('backend/layouts/main-layout',isset($data)? $data : null);
        } else {
            redirect('admin/login');
        }
    }

    public function view(){
        if($this->session->has_userdata('user')){
            $data['user'] = $this->session->userdata('user');
            $data['content'] = 'backend/simpla-admin/articles/list';
            $data['active'] = 'admin-view';
            $this->load->view('backend/layouts/main-layout', isset($data)?$data: null);
        } else {
            redirect('admin/login');
        }
    }

    public function add(){
        if($this->session->has_userdata('user')){
            $data['user'] = $this->session->userdata('user');
            $data['content'] = 'backend/simpla-admin/articles/add';
            $data['active'] = 'admin-articles';
            $data['item_active'] = 'articles-add';
            $this->load->view('backend/layouts/main-layout', isset($data)?$data: null);
        } else {
            redirect('admin/login');
        }
    }
}
