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
            $data['content'] = 'backend/simpla-admin/categories/index';
            $data['active'] = 'admin-categories';
            $this->load->view('backend/layouts/main-layout',isset($data)? $data : null);
        } else {
            redirect('admin/login');
        }
    }

    public function listcat(){
        if($this->session->has_userdata('user')){
            $data['user'] = $this->session->userdata('user');
            $data['content'] = 'backend/simpla-admin/categories/listcat';
            $data['active'] = 'admin-categories';
            $data['item_active'] = 'categories-list';
            $data['categories'] = $this->db->get('categories')->result_array();
            $this->load->view('backend/layouts/main-layout', isset($data)?$data: null);
        } else {
            redirect('admin/login');
        }
    }

    public function add(){
        if($this->session->has_userdata('user')){
            $data['user'] = $this->session->userdata('user');
            $data['content'] = 'backend/simpla-admin/categories/add';
            $data['active'] = 'admin-categories';
            $data['item_active'] = 'categories-add';
            if($this->input->post('submit') == 'Thêm mới'){
                $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required|min_length[5]|max_length[255]|callback__title');
                $this->form_validation->set_rules('description', 'Mô tả chung', 'trim|required|min_length[5]|max_length[255]');
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
                    redirect('categories/listcat');
                } else {
                    $this->load->view('backend/layouts/main-layout', isset($data)?$data: null);
                }
            } else if($this->input->post('submit') == 'Cập nhật') {
                $id = $this->input->post('id');
                $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required|min_length[5]|max_length[255]|callback__title');
                $this->form_validation->set_rules('description', 'Mô tả chung', 'trim|required|min_length[5]|max_length[255]');
                if ($this->form_validation->run() == true)
                {
                    $title = $this->input->post('title');
                    $description = $this->input->post('description');
                    $updated_at  = date('Y-m-d H:i:s');
                    $this->db->update('categories',['title' => $title,'description' => $description, 'updated_at' => $updated_at],['id'=>$id]);
                    redirect('categories/listcat');
                } else {
                    $cat = $this->db->get_where('categories',['id' => $id])->first_row();
                    $data['content'] = 'backend/simpla-admin/categories/add';
                    $data['active'] = 'admin-categories';
                    $data['mode'] = 'edit';
                    $data['cat'] = (array)$cat;
                    $this->load->view('backend/layouts/main-layout', isset($data)?$data: null);
                }
            } else {
                $this->load->view('backend/layouts/main-layout', isset($data)?$data: null);
            }
        } else {
            redirect('admin/login');
        }
    }

    public function edit(){
        if($this->session->has_userdata('user')){
            $data['user'] = $this->session->userdata('user');
            $id = $this->input->get('id');
            $cat = $this->db->get_where('categories',['id' => $id])->first_row();
            $data['content'] = 'backend/simpla-admin/categories/add';
            $data['active'] = 'admin-categories';
            $data['mode'] = 'edit';
            $data['cat'] = (array)$cat;
            $this->load->view('backend/layouts/main-layout', isset($data)?$data: null);
        } else {
            redirect('admin/login');
        }
    }

    public function delete(){
        if($this->session->has_userdata('user')){
            $data['user'] = $this->session->userdata('user');
            $id = $this->input->get('id');
            $this->db->delete('categories',['id' => $id]);
            redirect('categories/listcat');
        } else {
            redirect('admin/login');
        }
    }

    public function _title($value = ''){
        $data = ['admin','Admin','administrator','Administrator'];
        if(in_array($value, $data)) {
            $this->form_validation->set_message('_title',$value . ' Không thể dùng làm Tiêu đề');
            return false;
        }
        return true;
    }
}
