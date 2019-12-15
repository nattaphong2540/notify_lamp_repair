<?php
class User_model extends CI_Model
{

    public function validate($username, $password)
    {
        // จัดเตรียมเงื่อนไขเพื่อเอาไปคิวรี่ข้อมูล
        $condition = array('username' =>  $username, 'password' => $password);
        // เรียกใช้การคิวรี่ของ Codeigniter 
        $this->db->select('status, email');
        $this->db->from('users');
        $this->db->where($condition);
        $query = $this->db->get();
        // ตรวจสอบผลลัพธ์ที่ได้จากการคิวรี่ 
        // ถ้าเจอ $query->num_rows() ต้องมากกว่า 0 นอกจากนั้นแสดงว่าไม่เจอ
        if ($query->num_rows() > 0) {
            $result_query =  $query->result();
            // เหตุผลที่ใส่ [0] $query->result() จะ return ชนิดข้อมูลเป็น array แต่อยากให้มันเป็น json ธรรมดาเลยใส่[0] เพื่ออ้างอิงสมาชิกตัวแรกของ array ที่เป็น json
            $return_data = array('data' => $result_query[0], 'status' => true, 'msg' => "ล็อกอินสำเร็จ");
        } else {
            // ถ้า $query->num_rows() น้อยกว่าหรือเท่ากับ 0 แสดงว่ามีอะไรผิดพลาด
            $return_data = array('status' => false, 'msg' => "ล็อกอินไม่สำเร็จ");
        }
        return $return_data;
    }
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
