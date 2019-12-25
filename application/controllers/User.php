<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('User_model');
    }

    public function index()
    {
        // echo 'hello';exit();
        header('Location: welcome/home');
    }

    public function show_user()
    {
        $this->template->set('title', 'All Users');
        $this->template->load('template/light', 'user/show_user');
    }

    public function get_all_users() // Control get_all_user() and show user all
    {
        $users = $this->User_model->get_all_user();
        // success 
        if ($users !== null) {
            $return_datas['status'] = 1;
            $return_datas['data'] = $users;
        }
        // fail 
        else {
            $return_datas['status'] = 0;
            $return_datas['data'] = null;
        }
        // echo data
        echo json_encode($return_datas);
        # code...
    }

    public function new_user_form() // Control insert_user() and Insert Function()
    {
        $Username = $this->input->post("Username");
        $Password = $this->input->post("Password");
        $Email = $this->input->post("Email");
        $Status = $this->input->post("Status");

        $this->User_model->insert_user($Username, $Password, $Email, $Status);

        //header('Location: show_user');
        return true;
    }

    public function show_user_editForm() // Control get_id_user() and edit_user()
    {
        $Uid = $this->input->post("uid");
        $users = $this->User_model->get_id_user($Uid);
        echo json_encode($users);

        return true;
    }

    public function edit_user_form() // Control update_user() and update_user()
    {
        $Uid = $this->input->post("editUid");
        $Username = $this->input->post("editUsername");
        $Password = $this->input->post("editPassword");
        $Email = $this->input->post("editEmail");
        $Status = $this->input->post("editStatus");

        $this->User_model->update_user($Uid, $Username, $Password, $Email, $Status);

        //header('Location: show_product');
        return true;
    }

    public function delete_user_form() // Control delete_user() and submitDeleteUser()
    {
        $Uid = $this->input->post("Uid");
        $this->User_model->delete_user($Uid);
    }
}
