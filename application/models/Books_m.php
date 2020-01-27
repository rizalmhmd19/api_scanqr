<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books_m extends CI_Model {

public function getData()
	{
		$this->db->select('*');
		$this->db->from('tb_books');
		return $this->db->get()->result();
	}	

	public function insert($username,$book)
	{
		$store = $this->db->insert('tb_books',
		[
			'username' => $username,
			'bookname' => $book
		]
		);

		if ($store) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	public function update($id,$username,$book)
	{
		$update = $this->db->where('id',$id)->update('tb_books',
		[
			'username' => $username,
			'bookname' => $book
		]
		);

		if ($update) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	public function delete($id)
	{
		$delete = $this->db->delete('tb_books',['id' => $id]);

		if ($delete) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	public function uploadimg($image)
	{
		$upload = $this->db->set('picture',$image)->insert('tb_books');

		if ($upload) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	public function search($username)
	{
		$search = $this->db->select('*')->where('username',$username)->result_array();

		return $search;
	}

	public function hapus($id)
	{
		return $this->db->delete('tb_books')->where('id',$id);
	}

}

/* End of file Books_m.php */
/* Location: ./application/models/Books_m.php */