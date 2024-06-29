<?php 

class user_model extends CI_Model{
    public function ambil_data($idu)
    {
        $this->db->where('username',$idu);
        return $this->db->get('pengguna')->row();
    }

    public function ambil_data_by_id($idu)
    {
        $this->db->where('idu',$idu);
        return $this->db->get('pengguna')->row();
    }

    public function jumlah_pengguna(){
        return $this->db->count_all('pengguna');
    }

    public function get_all(){
        $this->db->select('pengguna.idu, pengguna.username, pengguna.email, pengguna.hak_akses');
        $this->db->from('pengguna');
        $result = $this->db->get();
        return $result->result();
    }

    public function tambah_pengguna($data){
        return $this->db->insert('pengguna', $data);
    }

    public function cek_duplikat_pengguna($idu){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('idu', $idu);
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function hapus($id){
        $this->db->where('idu', $id);
        $this->db->delete('pengguna');
    }

    public function update($data, $id){
        $this->db->where('idu', $id);
        $this->db->update('pengguna', $data);
    }
}
?>