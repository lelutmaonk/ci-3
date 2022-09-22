<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['title'] = 'Login';

        $this->load->view('auth/header_auth', $data);
		$this->load->view('auth/login');
        $this->load->view('auth/footer_auth');
	}

    public function registration()
	{
        // ** form validation set //
        $this->form_validation->set_rules('name', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[t_user.email]', [
                                        'is_unique' => 'This email is already in use']);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
                                        'matches' => 'Password is not the same as Confirmation Password',
                                        'min_length' => 'Password to short ']);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|matches[password1]');

        if($this->form_validation->run() == FALSE){
            $data['title'] = 'Registration';
            $this->load->view('auth/header_auth', $data);
            $this->load->view('auth/registration');
            $this->load->view('auth/footer_auth');
        }else{
            $data = [
                'name'          => htmlspecialchars($this->input->post('name')),
                'email'         => htmlspecialchars($this->input->post('email')),
                'image'         => 'default.jpg',
                'password'      => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                'role_id'       => 2,
                'is_active'     => 1,
                'date_created'  => time()
            ];
            $this->db->insert('t_user', $data);
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Your Account Created Successfully, Please Login.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('auth');
        }
	}

}
