<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile_m extends CI_Model
{

    protected $table = 'tb_profile';

    public function getData()
    {
        $read = $this->db->select('*')->from($this->table)->get()->result();
        return $read;
    }

    public function tambahData($data)
    {
        $add = $this->db->insert($this->table, $data);

        if ($add) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function updateData($id, $data)
    {
        $update = $this->db->where('id', $id)->update($this->table, $data);
        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deleteById($id)
    {
        $delete = $this->db->delete('tb_profile', array('id' => $id));

        if ($delete) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getUser($imei)
    {
        $read = $this->db->select('*')->where('imei',$imei)->get('tb_user')->row_array();
        return $read;
    }

    public function getLogin($imei)
    {
        $login = $this->db->select('*')->where('imei',$imei)->order_by('login_time','DESC')->get('tb_login')->result();
        return $login;
    }
}

/* End of file Profile_m.php */
