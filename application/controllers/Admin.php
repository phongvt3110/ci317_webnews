<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 19/02/2018
 * Time: 22:06
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
        $this->load->model('UserModel');
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function index()
    {
        if($this->session->has_userdata('user')){
            $data['user'] = $this->session->userdata('user');
            $data['remember'] = $this->session->userdata('remember');
            $data['content'] = 'backend/simpla-admin/home/index';
            $data['active'] = 'admin-homepage';
            $this->load->view('backend/layouts/main-layout',isset($data)? $data : null);
        } else {
            redirect('admin/login');
        }
    }

    public function login(){
        if($this->input->get('error') == 'login_wrongpass'){
            $data['loginfailed'] = 'The password you entered is wrong <br /> Please try again';
        } else if($this->input->get('error') == 'login_wronguser') {
            $data['loginfailed'] = 'The username you entered is wrong <br /> Please try again';
        }
        $this->load->view('backend/simpla-admin/home/login',isset($data)? $data : null);
    }

    public function submited(){
        if($this->input->post('submit') == 'Sign in'){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $remember = $this->input->post('remember');
            $user = $this->UserModel->getByName($username);
            if(isset($user)){
                if($this->UserModel->checkPassword($password,$user->password)){
                    $this->session->set_userdata('user', (array)$user);
                    $this->session->set_userdata('remember', $remember);
                    redirect('admin/index');
                } else {
                    redirect('admin/login?error=login_wrongpass', 'refresh');
                }
            } else {
                redirect('admin/login?error=login_wronguser', 'refresh');
            }
        }
    }

    public function signout(){
        $this->session->sess_destroy();
        redirect('admin/login');
    }

    public function register(){
        echo 'register';
    }

    public function test(){
        $this->load->view('backend/simpla-admin/example',isset($data)? $data : null);
    }

    public function passgen($pass){
		$this->load->library('Passwordgen');
		echo $this->passwordgen->genpass($pass);
	}
}
