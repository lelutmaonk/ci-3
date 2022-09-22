<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
        $this->load->view('auth/header_auth');
		$this->load->view('auth/login');
        $this->load->view('auth/footer_auth');
	}

    public function registration()
	{
        $this->load->view('auth/header_auth');
		$this->load->view('auth/registration');
        $this->load->view('auth/footer_auth');
	}

}
