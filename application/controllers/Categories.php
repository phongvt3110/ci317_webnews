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
        $this->load->model('CategoriesModel');
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

    public function listcat($page = 0){
        if($this->session->has_userdata('user')){
            $this->load->library('pagination');
            $data['user'] = $this->session->userdata('user');
            $data['content'] = 'backend/simpla-admin/categories/listcat';
            $data['active'] = 'admin-categories';
            $data['item_active'] = 'categories-list';
            $data['categories'] = $this->CategoriesModel->get();  //$this->db->get('categories')->result_array();
            $pagingconfig['base_url'] = 'http://news.dev/admin/categories/listcat/';
            $pagingconfig['total_rows'] = $this->CategoriesModel->total();
            $pagingconfig['per_page'] = 5;
            $pagingconfig['use_page_numbers'] = TRUE;
            $this->pagination->initialize($pagingconfig);
            $data['listcategories'] = $this->pagination->create_links();
            $this->load->view('backend/layouts/main-layout', isset($data)?$data: null);
        } else {
            redirect('admin/login');
        }
    }

    public function applyaction(){
        if($this->session->has_userdata('user')){
            $submit = $this->input->post('submit');
            $action = $this->input->post('action');
            if(isset($submit) && $submit == 'Apply to selected'){
                $checkboxlist = $this->input->post('checkbox');
                if($action == 'delete'){
                    if(is_array($checkboxlist)){
                        $flag = $this->CategoriesModel->deletelist($checkboxlist);
                        $this->session->set_flashdata('flashdata_message',$flag);
                    }
                } else if($action == 'published') {
                    if(is_array($checkboxlist)){
                        $flag = $this->CategoriesModel->publishedlist($checkboxlist);
                        $this->session->set_flashdata('flashdata_message',$flag);
                    }
                } else if($action == 'unpublished') {
                    if(is_array($checkboxlist)){
                        $flag = $this->CategoriesModel->unpublishedlist($checkboxlist);
                        $this->session->set_flashdata('flashdata_message',$flag);
                    }
                } else {
                    $flag = [
                        'type' => 'successful',
                        'message' => 'Ban phai chon action'
                    ];
                    $this->session->set_flashdata('flashdata_message',$flag);
                }
            }
            $data['user'] = $this->session->userdata('user');
            $data['content'] = 'backend/simpla-admin/categories/listcat';
            $data['active'] = 'admin-categories';
            $data['item_active'] = 'categories-list';
            $data['categories'] = $this->CategoriesModel->get();  //$this->db->get('categories')->result_array();
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
                if ($this->form_validation->run() == true)
                {
                    $title = $this->input->post('title');
                    $description = $this->input->post('description');
                    $flag = $this->CategoriesModel->insert(['title' => $title,'description' => $description]);
                    $this->session->set_flashdata('flashdata_message',$flag);
                    redirect('admin/categories/listcat');
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
                    $flag = $this->CategoriesModel->update(['id' => $id,'title' => $title,'description' => $description, 'updated_at' => $updated_at]);
                    $this->session->set_flashdata('flashdata_message',$flag);
                    redirect('admin/categories/listcat');
                } else {
                    $cat = $this->CategoriesModel->find($id);
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
            $cat = $this->CategoriesModel->find($id);
            $data['content'] = 'backend/simpla-admin/categories/add';
            $data['active'] = 'admin-categories';
            $data['mode'] = 'edit';
            $data['cat'] = (array)$cat;
            $this->load->view('backend/layouts/main-layout', isset($data)?$data: null);
        } else {
            redirect('admin/login');
        }
    }

    public function delete($id = 0){
        if($this->session->has_userdata('user')){
            $cat = $this->CategoriesModel->find($id);
            $submit = $this->input->post('submit');
            if(isset($cat) && count($cat) >0){
                if(isset($submit)){
                    if($submit == 'Xóa danh mục'){
                        $flag = $this->CategoriesModel->delete($cat->id);
                        $this->session->set_flashdata('flashdata_message',$flag);
                        redirect('admin/categories/listcat');
                    } else if($submit == 'Hủy bỏ'){
                        $flag = [
                            'type' => 'successful',
                            'message' => 'Ban da huy thao tac xoa danh muc'
                        ];
                        $this->session->set_flashdata('flashdata_message',$flag);
                        redirect('admin/categories/listcat');
                    }
                } else {
                    $data['user'] = $this->session->userdata('user');
                    $data['cat'] = (array)$cat;
                    $data['content'] = 'backend/simpla-admin/categories/delete';
                    $this->load->view('backend/layouts/main-layout', isset($data)?$data: null);
                }
            } else {
                $flag = [
                    'type' => 'successful',
                    'message' => 'Danh muc khong ton tai'
                ];
                $this->session->set_flashdata('flashdata_message',$flag);
                redirect('admin/categories/listcat');
            }
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
