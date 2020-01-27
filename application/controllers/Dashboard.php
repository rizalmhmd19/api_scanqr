<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_m','profile');
	}

	public function index()
	{
		if ($this->session->userdata('is_logged')) {
			$user = $this->profile->getUser($this->session->userdata('imei'));
			$login = $this->profile->getLogin($this->session->userdata('imei'));
			$log_about = $this->db->select('*')->where(['imei' => $this->session->userdata('imei'),'menu' => 'About'])->get('tb_log_mn')->result();
			$log_prof = $this->db->select('*')->where(['imei' => $this->session->userdata('imei'),'menu' => 'Profile'])->get('tb_log_mn')->result();
			$data = [
				'title' => 'Dashboard',
				'user' => $user,
				'login' => $login,
				'about' => $log_about,
				'profile' => $log_prof,
				'jml_ab' => count($log_about),
				'jml_pr' => count($log_prof)
			];
			$this->load->view('dashboard',$data);
		} else {
			redirect('login');
		}
		
		
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */