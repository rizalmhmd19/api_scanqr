<?php
defined('BASEPATH') or exit('No direct script access allowed');


use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Auth extends \Restserver\Libraries\REST_Controller
{
	// public function __construct()
	// {
	// 	parent::__construct();
	// 	// $this->load->model('Auth_m','auth');
	// }

	public function index_post()
	{
		$imei = $this->input->post('imei');
		$otp = rand(11111,99999);
		$getotp = $this->db->where('imei',$imei)->update('tb_user',['otp' => $otp]);
		$user = $this->db->select('username,level,imei,otp')->where('imei',$imei)->get('tb_user')->result();

		if ($user) {
			$res = [
				'message' => 'Success',
				'data' => $user
			];
			$this->response($res,REST_Controller::HTTP_OK);
		} else {
			$res = [
				'message' => 'Failed',
				'data' => 'IMEI Tidak Terdaftar'
			];
			$this->response($res,REST_Controller::HTTP_OK);
		}
	}
}