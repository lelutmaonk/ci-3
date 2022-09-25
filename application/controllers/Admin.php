<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('user/header_user', $data);
		$this->load->view('user/sidebar_user', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('user/footer_user');
	}
}
