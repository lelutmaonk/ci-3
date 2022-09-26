<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->db->get('t_user_menu')->result_array();

		$this->form_validation->set_rules('menu', 'Menu Name', 'required|trim');

		if($this->form_validation->run() == false){
			$this->load->view('user/header_user', $data);
			$this->load->view('user/sidebar_user', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('user/footer_user');
		}else{
			$this->db->insert('t_user_menu', ['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
            New menu has been created.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('menu');
		}	
	}

	public function submenu(){

		$data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model', 'menu');
		$data['submenu'] = $this->menu->getSubMenu();
		$data['menu'] = $this->db->get('t_user_menu')->result_array();
	
		$this->form_validation->set_rules('title', 'Sub Menu Title', 'required|trim');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required|trim');
		$this->form_validation->set_rules('icon', 'Icon', 'required|trim');

		if($this->form_validation->run() == false){
			$this->load->view('user/header_user', $data);
			$this->load->view('user/sidebar_user', $data);
			$this->load->view('submenu/index', $data);
			$this->load->view('user/footer_user');
		}else{
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->insert('t_user_sub_menu', $data);
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
            New sub menu has been created.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('menu/submenu');
		}
		
	}
	
}
