<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('User_model');
        //$this->load->model('Login_model');
    }

    public function index()
    {
        // echo 'hello';exit();
        header('Location: login/show_login');
    }

    public function show_login()
    {
        $this->load->view('login/show_login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $database_check = $this->User_model->validate($username, $password);
        $this->session->name = $database_check['data']->firstname . " " . $database_check['data']->lastname;
        // $_SESSION['name'] = $database_check['data']->firstname . " " . $database_check['data']->lastname;
        echo json_encode($database_check);
    }
}
