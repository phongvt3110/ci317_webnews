<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 19/02/2018
 * Time: 22:06
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
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
        $data['content'] = 'backend/simpla-admin/categories/index';
        $data['active'] = 'admin-categories';
        $this->load->view('backend/layouts/main-layout',isset($data)? $data : null);
    }

    public function listcat(){
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
        $data['content'] = 'backend/simpla-admin/categories/listcat';
        $data['active'] = 'admin-categories';
        $data['item_active'] = 'categories-list';
        $data['categories'] = $this->db->get('categories')->result_array();
        $this->load->view('backend/layouts/main-layout', isset($data)?$data: null);
    }

    public function add(){
        if($this->session->has_userdata('user')){
            $data['user'] = $this->session->userdata('user');
            $data['content'] = 'backend/simpla-admin/categories/add';
            $data['active'] = 'admin-categories';
            $data['item_active'] = 'categories-add';
            if($this->input->post('submit') == 'Thêm mới'){
                $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required');
                $this->form_validation->set_rules('description', 'Mô tả chung', 'trim|required');
//                $this->form_validation->set_error_delimiters('<div
//                        class="notification error png_bg">
//				            <a href="#" class="close"><img src="public/simpla-admin/resources/images/icons/cross_grey_small.png"
//				            title="Close this notification" alt="close" /></a>
//				            <div>', '</div></div>');
                if ($this->form_validation->run() == true)
                {
                    $title = $this->input->post('title');
                    $description = $this->input->post('description');
                    $this->db->insert('categories',['title' => $title,'description' => $description]);
                    redirect('categories/index');
                } else {
                    $this->load->view('backend/layouts/main-layout', isset($data)?$data: null);
                }
            } else if($this->input->post('submit') == 'Cập nhật') {
                redirect('categories/index');
            } else {
                $this->load->view('backend/layouts/main-layout', isset($data)?$data: null);
            }
        } else {
            redirect('admin/login');
        }
    }

    public function edit(){
        $id = $this->input->get('id');
        $cat = $this->db->get_where('categories',['id' => $id])->first_row();
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
        $data['content'] = 'backend/simpla-admin/categories/add';
        $data['active'] = 'admin-categories';
        $data['cat'] = (array)$cat;
        $data['mode'] = 'edit';
        $this->load->view('backend/layouts/main-layout', isset($data)?$data: null);
    }
}
