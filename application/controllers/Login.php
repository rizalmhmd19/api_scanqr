<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('api');
	}

	public function index()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// var_dump($password);
		// die;
		$user = $this->db->select('*')->from('tb_user')->where('username',$username)->get()->row_array();

		if ($user) {
			if (password_verify($password, $user['password'])) {
			$result = $this->db->select('username,level')->from('tb_user')->where('username',$username)->get()->result_array();
			}else{
				$result = [
				'message' => "Wrong Password"
			];
			}
		} else {
			$result = [
				'message' => "User is not registered"
			];
		}

		echo json_encode($result);
	}

	public function sign()
	{
		$imei = $this->input->post('imei');
		$insert = $this->db->insert('tb_login',array('imei'=>$this->input->post('imei')));
		$sess = array(
			'imei' => $imei
		);		
		$this->session->set_userdata($sess);
		$otp = rand(11111,99999);
		$getotp = $this->db->where('imei',$imei)->update('tb_user',['otp' => $otp]);
		$user = $this->db->select('username,level,imei,otp,is_login')->where('imei',$imei)->get('tb_user')->result();
		if ($user) {
			$res = [
				'message' => 'Success',
				'data' => $user
			];
		} else {
			$res = [
				'message' => 'Failed',
				'data' => 'IMEI Tidak Terdaftar'
			];
			$this->db->delete('tb_login',['imei' => $imei]);
		}
		echo json_encode($res);
	}

	public function active()
	{
		header('Access-Control-Allow-Origin: *');
		$otp = $this->input->post('otp');
		// $imei = $this->session->userdata('imei');
		$active = $this->db->select_max('imei')->get('tb_login')->row_array();
		$imei = $active['imei'];
		$update = $this->db->where(['otp' => $otp, 'imei' => $imei])->update('tb_user',['is_login' => 1]);
		$login = $this->db->select('is_login')->where('imei',$imei)->get('tb_user')->result_array();
		// var_dump($login);
		if ($update) {
			$res = [
			'message' => 'Success',
			'data' => $login
			];
		} else {
			$res = [
			'message' => 'Success',
			'data' => ['is_login' => '0']
		];
		}
		echo json_encode($res);

	}


}

/* End of file login.php */
/* Location: ./application/controllers/login.php */