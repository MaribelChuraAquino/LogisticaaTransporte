<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->id)) {
			redirect('login');
		}
		$this->load->model('MAccount');
	}

	public function add_account_holder()
	{
		$data['title'] = "Account Holder";
		$data['container'] = $this->load->view('account/add_account_holder', '', true);
		$this->load->view('master', $data);
	}

	public function store_account_holder()
	{
		$this->MAccount->store_account_holder_record();
		$this->session->set_flashdata('message', 'Record Inserted Successfully');
		redirect('account/add_account_holder');
	}

	public function view_account_holder()
	{
		$value['holders'] = $this->MAccount->get_all();
		$data['title'] = "Account Holder";
		$data['container'] = $this->load->view('account/view_account_holder', $value, true);
		$this->load->view('master', $data);
	}

	public function edit_account_holder($id)
	{
		$value['holder'] = $this->MAccount->get_record($id);
		$data['title'] = "Account Holder";
		$data['container'] = $this->load->view('account/edit_account_holder', $value, true);
		$this->load->view('master', $data);
	}

	public function update_account_holder()
	{
		$this->MAccount->update_account_holder_record();
		$this->session->set_flashdata('message', 'Record Updated Successfully');
		redirect('account/view_account_holder');
	}

	public function delete_account_holder($id)
	{
		$message = $this->MAccount->delete_account_holder_record($id);
		$this->session->set_flashdata('message', $message);
		redirect('account/view_account_holder');
	}
}
