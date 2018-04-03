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

    public function listcat($currentpage = 1){
        if($this->session->has_userdata('user')){
            $this->load->library('pagination');
            $data['user'] = $this->session->userdata('user');
            $data['content'] = 'backend/simpla-admin/categories/listcat';
            $data['active'] = 'admin-categories';
            $data['item_active'] = 'categories-list';
            $pagingconfig['base_url'] = 'http://news.dev/admin/categories/listcat/';
            $pagingconfig['total_rows'] = $this->CategoriesModel->total();
            $pagingconfig['use_page_numbers'] = TRUE;
            $page = $pagingconfig['per_page'] = 5;

            $pagingconfig['full_tag_open'] = '<div class="pagination">';
            $pagingconfig['full_tag_close'] = '</div>';

            $pagingconfig['first_link'] = '&laquo; First';
            $pagingconfig['first_tag_open'] = '';
            $pagingconfig['first_tag_close'] = '';

            $pagingconfig['last_link'] = 'Last &raquo;';
            $pagingconfig['last_tag_open'] = '';
            $pagingconfig['last_tag_close'] = '';

            $pagingconfig['next_link'] = 'Next &raquo;';
            $pagingconfig['next_tag_open'] = '';
            $pagingconfig['next_tag_close'] = '>';

            $pagingconfig['prev_link'] = '&laquo; Previous';
            $pagingconfig['prev_tag_open'] = '';
            $pagingconfig['prev_tag_close'] = '';

            $pagingconfig['cur_tag_open'] = '<a class="number current">';
            $pagingconfig['cur_tag_close'] = '</a>';

            $pagingconfig['num_tag_open'] = '';
            $pagingconfig['num_tag_close'] = '';

            if($currentpage < 1){
                $currentpage = 1;
                redirect('admin/categories/listcat/'.$currentpage);
            }
            if($currentpage > ceil($pagingconfig['total_rows']/$page)){
                $currentpage =  ceil($pagingconfig['total_rows']/$page);
                redirect('admin/categories/listcat/'. $currentpage);
            }
            $data['categories'] = $this->CategoriesModel->getpage(($currentpage-1)*$page, $page);
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
            $redirect = $this->input->post('redirect');
            $redirect = (isset($redirect) && !empty($redirect))? base64_decode($redirect) : 'admin/categories/listcat';
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
//            $data['user'] = $this->session->userdata('user');
//            $data['content'] = 'backend/simpla-admin/categories/listcat';
//            $data['active'] = 'admin-categories';
//            $data['item_active'] = 'categories-list';
//            $data['categories'] = $this->CategoriesModel->get();
//            $this->load->view('backend/layouts/main-layout', isset($data)?$data: null);
            redirect($redirect);
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
                $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required|min_length[3]|max_length[255]|callback__title');
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
                $r = $this->input->post('redirect');
                $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required|min_length[3]|max_length[255]|callback__title');
                $this->form_validation->set_rules('description', 'Mô tả chung', 'trim|required|min_length[5]|max_length[255]');
                if ($this->form_validation->run() == true)
                {
                    $title = $this->input->post('title');
                    $description = $this->input->post('description');
                    $updated_at  = date('Y-m-d H:i:s');
                    $flag = $this->CategoriesModel->update(['id' => $id,'title' => $title,'description' => $description, 'updated_at' => $updated_at]);
                    $this->session->set_flashdata('flashdata_message',$flag);
                    if(isset($r)) redirect(base64_decode($r)); else
                        redirect('admin/categories/listcat');
                } else {
                    $cat = $this->CategoriesModel->find($id);
                    $data['content'] = 'backend/simpla-admin/categories/add';
                    $data['active'] = 'admin-categories';
                    $data['mode'] = 'edit';
                    $data['cat'] = (array)$cat;
                    if(isset($r)) $data['redirect'] = $r;
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
            $r = $this->input->get('r');
            $data['user'] = $this->session->userdata('user');
            $id = $this->input->get('id');
            $cat = $this->CategoriesModel->find($id);
            $data['content'] = 'backend/simpla-admin/categories/add';
            $data['active'] = 'admin-categories';
            $data['mode'] = 'edit';
            $data['cat'] = (array)$cat;
            if(isset($r)) $data['redirect'] = $r;
            $this->load->view('backend/layouts/main-layout', isset($data)?$data: null);
        } else {
            redirect('admin/login');
        }
    }

    public function togglepushlish($field = '', $id = 0 , $value = ''){
        if($this->session->has_userdata('user')){
            $r = $this->input->get('r');
            $data['user'] = $this->session->userdata('user');
            $cat = $this->CategoriesModel->find($id);
            $data['content'] = 'backend/simpla-admin/categories/listcat';
            $data['active'] = 'admin-categories';
            $data['mode'] = 'edit';
            if(!isset($cat) || count($cat) == 0) {
                $flag = [
                    'type' => 'error',
                    'message' => 'Danh muc khong ton tai'
                ];
                $this->session->set_flashdata('flashdata_message',$flag);
                redirect(base64_decode($r));
            }
            $data['cat'] = (array)$cat;
            $flag = $this->CategoriesModel->set($field, $cat->id, $value);
            $this->session->set_flashdata('flashdata_message',$flag);
            redirect(base64_decode($r));
        } else {
            redirect('admin/login');
        }
    }

    public function delete($id = 0){
        if($this->session->has_userdata('user')){
            $r = $this->input->get('r');
            $cat = $this->CategoriesModel->find($id);
            $submit = $this->input->post('submit');
            if(isset($cat) && count($cat) >0){
                if(isset($submit)){
                    $redirect = $this->input->post('redirect');
                    if($submit == 'Xóa danh mục'){
                        $flag = $this->CategoriesModel->delete($cat->id);
                        $this->session->set_flashdata('flashdata_message',$flag);
                        if(isset($redirect)) redirect(base64_decode($redirect)); else
                            redirect('admin/categories/listcat');
                    } else if($submit == 'Hủy bỏ'){
                        $flag = [
                            'type' => 'successful',
                            'message' => 'Ban da huy thao tac xoa danh muc'
                        ];
                        $this->session->set_flashdata('flashdata_message',$flag);
                        if(isset($redirect)) redirect(base64_decode($redirect)); else
                            redirect('admin/categories/listcat');
                    }
                } else {
                    $data['user'] = $this->session->userdata('user');
                    $data['cat'] = (array)$cat;
                    $data['content'] = 'backend/simpla-admin/categories/delete';
                    if(isset($r)) $data['redirect'] = $r;
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
