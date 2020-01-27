<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	var $tes;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('ciqrcode');
	}


	public function index()
	{
		header('Access-Control-Allow-Origin: *');
		$alphaNum = "1234567890";
		$image_name = substr(str_shuffle(str_repeat($alphaNum, 5)), 0, 7).'.png';
		$this->generate($image_name);
		$data['qr_code'] = $image_name;

		$this->load->view('login',$data);		
	}


	public function generate($image_name)
	{
		$config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = 'assets/'; //string, the default is application/cache/
        $config['errorlog']     = 'assets/'; //string, the default is application/logs/
        $config['imagedir']     = 'assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $params['data'] = "http://192.168.2.72/Api/sign";
        // $params['data'] = "http://192.168.100.6/Api/sign";
        $params['level'] = 'H';
        $params['size'] = 12;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name;
        $this->ciqrcode->generate($params);
    }

    public function sign()
    {
    	header('Access-Control-Allow-Origin: *');
    	$imei = $this->input->post('imei');
    	if ($imei) {
    		$otp = rand(11111,99999);
    		$getotp = $this->db->where('imei',$imei)->update('tb_user',['otp' => $otp]);
    		$user = $this->db->select('username,level,imei,otp,is_login')->where('imei',$imei)->get('tb_user')->row_array();


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
    		}
    	} else {
    		$res = [
    			'message' => 'Empty',
    		];
    	}

    	echo json_encode($res);
    }

    public function set_login(){

    	$a = $this->session->userdata('abc');
    	$res = [
    		'is_logged_in' => $a
    	];
    	header('Access-Control-Allow-Origin: *');
    	echo json_encode($res);
    }

    public function active()
    {
    	header('Access-Control-Allow-Origin: *');
    	$otp = $this->input->post('otp');
		// $imei = $this->session->userdata('imei');
    	$active = $this->db->select('*')->where('otp',$otp)->get('tb_user')->row_array();

    	if ($active != null) {
    		$imei = $active['imei'];
    		$profile = $this->db->select('*')->where('imei',$imei)->get('tb_user')->row_array();
    		$update = $this->db->where(['otp' => $otp, 'imei' => $imei])->update('tb_user',['is_login' => 1]);
    		$login = $this->db->select('is_login')->where('imei',$imei)->get('tb_user')->result_array();
			// var_dump($login);
    		if ($update) {
    			$res = [
    				'message' => 'Success',
    				'data' => $login
    			];
    			$insert = $this->db->insert('tb_login',array('imei'=>$imei));
    			$sess = [
    				'username' 	=> $profile['username'],
    				'email'		=> $profile['email'],
    				'level'		=> $profile['level'],
    				'imei'		=> $profile['imei'],
    				'is_logged' => TRUE
    			];
    			if ($insert) {
    				$this->session->set_userdata($sess);
    				$this->db->where('imei',$imei)->update('tb_user',['otp'=> 0]);
    			}
    		} else {
    			$res = [
    				'message' => 'Success',
    				'data' => ['is_login' => '0']
    			];
    		}
    	} else {
    		$res = [
    			'message' => 'Failed'
    		];
    	}


    	echo json_encode($res);

    }

    public function logout()
    {
    	$logout = $this->db->where('imei',$this->session->userdata('imei'))->update('tb_user',['is_login'=>0]);
    	$this->session->sess_destroy();
    	redirect('login');
    }

    public function log_menu()
    {	
    	header('Access-Control-Allow-Origin: *');

    	$imei = $this->input->post('imei');
    	$menu = $this->input->post('menu');

    	$store = $this->db->insert('tb_log_mn',['imei' => $imei, 'menu' => $menu]);
        $sel = $this->db->select_max('id')->where(['imei' => $imei, 'menu' => $menu])->get('tb_log_mn')->result();
        echo json_encode(['message' => 'Success',
            'data' => $sel]);
    }

    public function end_menu()
    {
        header('Access-Control-Allow-Origin: *');
        $id = $this->input->post('id');

        $update = $this->db->update('tb_log_mn',['end_time' => date('Y/m/d H:i:s a', time())],['id' => $id]);
        echo json_encode(['message' => 'Success']);
    }



}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */