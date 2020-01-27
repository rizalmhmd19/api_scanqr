<?php
defined('BASEPATH') or exit('No direct script access allowed');


use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Books extends \Restserver\Libraries\REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Books_m', 'books');
	}

	public function index_get()
	{
		$books = $this->books->getData();
		$this->response($books, REST_Controller::HTTP_OK);
	}

	public function index_post()
	{
		$insert = $this->books->insert($this->input->post('username'), $this->input->post('book'));
		if ($insert) {
			$res['message'] = 'Success';
		} else {
			$res['message'] = 'Failed';
		}
		$this->response($res, REST_Controller::HTTP_OK);
	}

	public function update_post()
	{
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$book = $this->input->post('book');

		$update = $this->books->update($id, $username, $book);

		if ($update) {
			$res['message'] = 'Success';
		} else {
			$res['message'] = 'Failed';
		}
		$this->response($res, REST_Controller::HTTP_OK);
	}

	public function upload_post()
	{
		$image = $_FILES['image']['name'];
		$imagepath = base_url('assets/img/') . $image;
		move_uploaded_file($_FILES['image']['tmp_name'], $imagepath);
		$this->books->uploadimg($image);
	}

	public function search_get()
	{
		$searchname = $this->input->get('search');
		$search = $this->books->search($searchname);

		$this->response($search, REST_Controller::HTTP_OK);
	}

	public function delete_delete()
	{
		$id = $this->input->get('id');
		$this->books->hapus($id);
	}
}

/* End of file Books.php */
/* Location: ./application/controllers/Books.php */
