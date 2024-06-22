<?php 

class user_model extends CI_Model{
    public function ambil_data($idu)
    {
        $this->db->where('username',$idu);
        return $this->db->get('pengguna')->row();
    }
}
?>