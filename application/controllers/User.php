<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_log_in();
	}
	
	public function index()
	{
		$data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('user/header_user', $data);
		$this->load->view('user/sidebar_user', $data);
		$this->load->view('user/index', $data);
		$this->load->view('user/footer_user');
	}
}
