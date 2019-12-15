<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->library('session');
        $this->load->model('Product_model');
    }

    public function index()
    {
        // echo 'hello';exit();
        header('Location: welcome/home');
    }
    public function new_product()
    {
        $this->session->$_SESSION['TESTING'] = "A New Session";
        $this->session->testing = "e yung wha";
        $this->template->set('title', 'Test');
        $this->template->load('template/light', 'product/new_product', $_SESSION['TESTING']);
    }

    public function new_product_form()
    {
        $product_name = $this->input->post("product_name");
        $product_price = $this->input->post("product_price");
        $product_amount = $this->input->post("product_amount");

        $this->Product_model->insert_product($product_name, $product_price, $product_amount);

        //header('Location: show_product');
        return true;
    }

    public function show_product_editForm()
    {
        $product_id = $this->input->post("p_id");
        $products = $this->Product_model->get_id_product($product_id);
        echo json_encode($products);

        return true;
    }

    public function edit_product_form()
    {
        $product_id = $this->input->post("product_id");
        $product_name = $this->input->post("product_name");
        $product_price = $this->input->post("product_price");
        $product_amount = $this->input->post("product_amount");

        $this->Product_model->update_product($product_id, $product_name, $product_price, $product_amount);

        //header('Location: show_product');
        return true;
    }

    public function delete_product_form()
    {
        $product_id = $this->input->post("product_id");
        $this->Product_model->delete_product($product_id);
    }

    public function show_product()
    {
        $this->template->set('title', 'All Products');
        $this->template->load('template/light', 'product/show_product');
    }
    public function get_all_products()
    {
        $products = $this->Product_model->get_all_product();
        // success 
        if ($products !== null) {
            $return_datas['status'] = 1;
            $return_datas['data'] = $products;
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
}
