<?php
class User_model extends CI_Model
{
    public function get_all_user()
    {

        $query = $this->db->get_where('users', 'delete_status != "delete"');

        return $query->result();
    }

    public function insert_user($Username, $Password, $Email, $Status)
    {
        $data = array(
            'username' => $Username,
            'password' => $Password,
            'email' => $Email,
            'status' => $Status
        );

        $this->db->insert('users', $data);

        return true;
    }

    public function get_id_user($Uid) // get_id_user() for sent data to show_user_editForm()
    {
        $query = $this->db->get_where('users', array('uid' => $Uid));
        return $query->row_array();
    }

    public function update_user($Uid, $Username, $Password, $Email, $Status)
    {
        $data = array(
            'username' => $Username,
            'password' => $Password,
            'email' => $Email,
            'status' => $Status
        );
        $this->db->where('uid', $Uid);
        $this->db->update('users', $data);

        return true;
    }

    public function delete_user($Uid)
    {
        $data = array(
            'uid' => $Uid,
            'delete_status' => 'delete'
        );
        $this->db->where('uid', $Uid);
        $this->db->update('users', $data);
    }
}
