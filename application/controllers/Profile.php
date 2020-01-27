<?php
defined('BASEPATH') or exit('No direct script access allowed');


use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Profile extends \Restserver\Libraries\REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_m', 'profile');
    }

    public function index_get()
    {
        $read = $this->profile->getData();
        // print_r($read);
        // die;
        $this->response($read, REST_Controller::HTTP_OK);
    }

    public function dummy_post()
    {
        $data = [
            "name" => "Rizal",
            "email" => "zanxzhui@gmail.com",
            "age" => 23
        ];

        $this->db->insert('tb_profile', $data);
    }

    public function index_post()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $age = $this->input->post('age');

        $data = [
            'name' => $name,
            'email' => $email,
            'age' => $age
        ];

        $this->profile->tambahData($data);
        $res = [
            'message' => 'Success'
        ];
        $this->response($res, REST_Controller::HTTP_CREATED);
    }

    public function index_put($id = null)
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $age = $this->input->post('age');

        $data = [
            'name' => $name,
            'email' => $email,
            'age' => $age
        ];

        $this->profile->updateData($id, $data);
        $res = [
            'message' => 'Success'
        ];
        $this->response($res, REST_Controller::HTTP_OK);
    }

    public function index_delete($id = null)
    {
        $this->profile->deleteById($id);
        $res = [
            'message' => 'Success'
        ];
        $this->response($res, REST_Controller::HTTP_OK);
    }

    public function login_post()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

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
        $this->response($result,REST_Controller::HTTP_OK);
    }
}
