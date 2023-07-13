<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		if (isset($this->session->id)) {
			redirect('admin');
		} else {
			$value['company'] = $this->MAdmin->get_settings_record();
			$this->load->view('login/login', $value);
		}
	}

	public function check_login()
	{
		$this->form_validation->set_rules('user_name', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run()) {
			$username = $this->input->post('user_name', true);
			$password = $this->input->post('password', true);
			$user_details = $this->MAdmin->get_admin_details($username);
			if ($user_details) {
				if (password_verify($password, $user_details->password)) {
					//$type = $this->MAdmin->get_type_record($user_details->id);
					$session = array(
						'id' => $user_details->id,
						'name' => $user_details->name,
						'email' => $user_details->email,
						'image' => $user_details->image
					);
					$this->session->set_userdata($session);
					/* if ($type->new_order == 1) {
						redirect('sales/new_order');
					} else {
						redirect('admin');
					} */
					redirect('admin');
				} else {
					$this->session->set_flashdata('message', 'Email or Password is not correct');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('message', 'Email or Password is not correct');
				redirect('login');
			}
		} else {
			$this->index();
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
