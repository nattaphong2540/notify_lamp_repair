<?php
class Product_model extends CI_Model
{
    public function insert_product($data)
    {
        $query = $this->db->insert('products', $data);
        return ($query) ? $this->db->insert_id() : false;
    }

    public function get_id_product($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('products');
        return $query->result();
    }

    public function update_product($data, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('products', $data);
        return ($query) ? true : false;
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
