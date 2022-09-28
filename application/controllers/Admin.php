<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_log_in();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('user/header_user', $data);
		$this->load->view('user/sidebar_user', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('user/footer_user');
	}

	public function role(){
		$data['title'] = 'Role';
        $data['user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('t_user_role')->result_array();
		$this->load->view('user/header_user', $data);
		$this->load->view('user/sidebar_user', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('user/footer_user');
	}

	public function roleAccess($role_id){
		$data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('t_user_role', ['id' => $role_id])->row_array();
		$this->db->where('id !=',1);
		$data['menu'] = $this->db->get('t_user_menu')->result_array();
		$this->load->view('user/header_user', $data);
		$this->load->view('user/sidebar_user', $data);
		$this->load->view('admin/role_access', $data);
		$this->load->view('user/footer_user');
	}

	public function changeccess(){
		$menu_id= $this->input->post('menuId');
		$role_id= $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('t_user_access_menu', $data);

		if($result->num_rows()<1){
			$this->db->insert('t_user_access_menu', $data);
		}else{
			$this->db->delete('t_user_access_menu', $data);
		}
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Role Access Change.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
	}

}
