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
         // ** form validation set //
         $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
         $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if($this->form_validation->run() == FALSE){
            $data['title'] = 'Login';
            $this->load->view('auth/header_auth', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/footer_auth');
        }else{
            // ** validation success //
            $this->_login();
        }
	}

    private function _login(){
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        $user       = $this->db->get_where('t_user', ['email' => $email])->row_array();

        // ** if the the user exists //
        if($user){
             // ** if the user active //
             if($user['is_active'] == 1){
                if(password_verify($password, $user['password'])){
                     // ** if the password true //
                     $data = [
                        'email'     => $user['email'],
                        'role_id'   => $user['role_id']
                     ];
                     $this->session->set_userdata($data);
                     if($user['role_id'] == 1){
                        redirect('admin');
                     }else{
                        redirect('user');
                     }
                }else{
                     // ** if the password false //
                    $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Your password is wrong
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                    redirect('auth');
                }
                
             }else{
                 // ** if the user not active //
                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Your account has not been activated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('auth');
             }
             
        }else{
            // ** if the user doesn't exist //
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Your email is not registered.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('auth');
        }
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
                'name'          => htmlspecialchars($this->input->post('name', TRUE)),
                'email'         => htmlspecialchars($this->input->post('email', TRUE)),
                'image'         => 'default.png',
                'password'      => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
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

    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
        You have been logout.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('auth');
    }

    public function blocked(){
        $this->load->view('404');
    }

}
