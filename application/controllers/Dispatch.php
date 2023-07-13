<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dispatch extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->id)) {
			redirect('login');
		}
		$this->load->model('MDispatch');
	}

	public function add_dispatch()
	{
		$last_row = $this->MDispatch->get_last_row();
		if ($last_row) {
			$id = (int)substr($last_row->dispatch_id, 5);
			$result = $id + 1;
			$dispatch_id = "DISP-" . $result;
		} else {
			$dispatch_id = "DISP-2001";
		}
		$value['dispatch_id'] = $dispatch_id;
		$data['title'] = "Dispatch";
		$data['container'] = $this->load->view('dispatch/add_dispatch', $value, true);
		$this->load->view('master', $data);
	}

	public function store_dispatch()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('rate', 'Rate', 'required');

		if ($this->form_validation->run()) {
			$this->MDispatch->store_dispatch();
			$this->session->set_flashdata('message', 'Record Inserted Successfully');
			redirect('dispatch/add_dispatch');
		} else {
			$this->add_dispatch();
		}
	}

	public function view_dispatch()
	{
		$value['results'] = $this->MDispatch->get_all();
		$data['title'] = "Dispatch";
		$data['container'] = $this->load->view('dispatch/view_dispatch', $value, true);
		$this->load->view('master', $data);
	}

	public function edit_dispatch($id)
	{
		$value['result'] = $this->MDispatch->get_record($id);
		$data['title'] = "Dispatch";
		$data['container'] = $this->load->view('dispatch/edit_dispatch', $value, true);
		$this->load->view('master', $data);
	}

	public function update_dispatch()
	{
		$id = $this->input->post('id', true);
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('rate', 'Rate', 'required');

		if ($this->form_validation->run()) {
			$this->MDispatch->update_dispatch();
			$this->session->set_flashdata('message', 'Record Updated Successfully');
			redirect('dispatch/view_dispatch');
		} else {
			$this->edit_dispatch($id);
		}
	}

	public function delete_dispatch($id)
	{
		$message = $this->MDispatch->delete_record($id);
		$this->session->set_flashdata('message', $message);
		redirect('dispatch/view_dispatch');
	}
}
