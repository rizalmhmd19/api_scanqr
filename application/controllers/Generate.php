<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('ciqrcode');
	}

	public function index()
	{
		$alphaNum = "1234567890";
        $image_name = substr(str_shuffle(str_repeat($alphaNum, 5)), 0, 7).'.png';
		$this->generate($image_name);
		$data['qr_code'] = $image_name;

		$this->load->view('qrcode',$data);
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

}

/* End of file Generate.php */
/* Location: ./application/controllers/Generate.php */