<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('Product_model');
    }

    public function index()
    {
        // echo 'hello';exit();
        header('Location: welcome/home');
    }
    public function new_product()
    {
        $this->template->set('title', 'Test');
        $this->template->load('template/light', 'product/new_product');
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

    public function show_product()
    {
        $products = $this->Product_model->get_all_product();

        $data = ['products' => $products];

        $this->template->set('title', 'All Products');
        $this->template->load('template/light', 'product/show_product', $data);

        return true;
    }
}
