<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $this->load->helper('url');
//        $this->load->database();
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function index()
    {
        $data['meta_title'] = 'Home page';
        $data['content'] = 'layouts/content';
        $data['footer'] = 'layouts/footer';
        $data['header'] = 'layouts/header';
        $data['active'] = 'home-page';
        $this->load->view('layouts/main_layout',isset($data)? $data : null);
    }

    public function fullwidth(){
        $data['meta_title'] = 'Full width';
        $data['content'] = 'home/pages/full-width';
        $data['footer'] = 'layouts/footer';
        $data['header'] = 'layouts/header';
        $data['active'] = 'full-width';
        $this->load->view('layouts/main_layout',isset($data)? $data : null);
    }

    public function styledemo(){
        $data['meta_title'] = 'Style demo';
        $data['content'] = 'home/pages/style-demo';
        $data['footer'] = 'layouts/footer';
        $data['header'] = 'layouts/header';
        $data['active'] = 'style-demo';
        $this->load->view('layouts/main_layout',isset($data)? $data : null);
    }

    public function test(){
        echo base_url();
        echo '<br>current url:' . current_url();
        echo '<br>'. APPPATH;
        echo '<br>' . getcwd();
        echo '<br>' .  __DIR__;
        echo '<br>' . basename(getcwd());
        echo '<br>' . dirname(getcwd());
    }

    public function params($params= null){
       $data = json_decode(base64_decode($params),true);
       print_r($data);
       echo '<br>';
       echo $data['id'];
       echo '<br>' . $data['name'];
        //echo base64_encode(json_encode(['id'=>1234,'name'=>'kunsipxanh']));
    }
    public function paramget(){
        $id = $this->input->get('id');
        $name = $this->input->get('name');
        if(isset($id)) echo $id; else echo 'id is null';
        if(isset($name)) echo $name; else echo 'name is null';
    }
    public function testdb(){
        $result = $this->db->select('title,description,content')
                        ->from('articles')
                        ->where(['id'=> 2])
                        ->get()
                        ->result_array();
        foreach ($result as $row){
            echo $row['title'] . '<br>';
            echo $row['description'] . '<br>';
            echo $row['content'];
        }
        $this->output->enable_profiler(true);
    }

    public function testemail(){
        $this->load->library('email');
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $this->email->from('vtphong651043@gmail.com', 'Phongvt');
        $this->email->to('xembongda0218@gmail.com');
        $this->email->cc('phongvt3110@gmail.com');
        $this->email->bcc('');

        $this->email->subject('Email Test on ' . date('d-m-Y H:i:s'));
        $this->email->message('Testing the email class.' . date('d-m-Y H:i:s'));

        //Send mail
        if($this->email->send()){
            $this->session->set_flashdata("email_sent","Email sent successfully.");
            echo 'Email sent successfully.';
        }
        else {
            $this->session->set_flashdata("email_sent","Error in sending Email.");
            echo 'Error in sending Email.';
        }
    }
}