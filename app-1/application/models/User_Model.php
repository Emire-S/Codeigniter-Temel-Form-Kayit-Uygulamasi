<?php
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    /* tabloya veri ekleme işlemi */
    public function add($data= array())
    {
      return $this->db->insert("users", $data);
    }

    //tablodaki tüm kayıtların getirilmesi

    public function get_all($order = "id DESC")
    {
        return $this->db->order_by($order)->get("users")->result();
    }

    //tablodaki şarta göre kayıtların getirilmesi

    public function get ($param = array())
    {
        return $this->db->where($param)->get("users")->row();
    }
}


?>