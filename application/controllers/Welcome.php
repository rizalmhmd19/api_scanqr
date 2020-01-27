<?php
defined('BASEPATH') or exit('No direct script access allowed');


use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Welcome extends \Restserver\Libraries\REST_Controller
{

	public function index_get()
	{
		$message = [
			'status' => TRUE,
			'message' => 'Api has connected'
		];

		$this->response($message,REST_Controller::HTTP_OK);
	}

	public function index_post()
	{

	}

	public function index_put()
	{

	}

	public function index_delete()
	{

	}
}