<?php
class Product_model extends CI_Model
{
    public function insert_product($name, $price, $amount)
    {
        $data = array(
            'name' => $name,
            'price' => $price,
            'amount' => $amount
        );

        $this->db->insert('products', $data);

        return true;
    }


    public function get_all_product()
    {
        $query = $this->db->get('products');

        return $query->result();
    }
}
