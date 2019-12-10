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

    public function get_id_product($id)
    {
        $query = $this->db->get_where('products', array('id' => $id));
        return $query->row_array();
    }

    public function update_product($id, $name, $price, $amount)
    {
        $data = array(
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'amount' => $amount
        );
        $this->db->where('id', $id);
        $this->db->update('products', $data);

        return true;
    }

    public function delete_product($id)
    {
        $data = array(
            'id' => $id,
            'status' => 'delete'
        );
        $this->db->where('id', $id);
        $this->db->update('products', $data);
    }

    public function get_all_product()
    {

        $query = $this->db->get_where('products', 'status != "delete"');

        return $query->result();
    }
}
