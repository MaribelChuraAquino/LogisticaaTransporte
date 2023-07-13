<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->id)) {
			redirect('login');
		}
		$this->load->model('MCustomer');
	}

	public function add_customer()
	{
		$last_row = $this->MCustomer->get_last_row();
		if ($last_row) {
			$id = (int)$last_row->customer_id;
			$result = $id + 1;
			$customer_id = $result;
		} else {
			$customer_id = 5001;
		}
		$value['customer_id'] = $customer_id;
		$data['title'] = "Customer";
		$data['container'] = $this->load->view('customer/add_customer', $value, true);
		$this->load->view('master', $data);
	}

	public function store_customer()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('zip', 'Zip', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		$this->form_validation->set_rules('country', 'Country', 'trim|required');
		$this->form_validation->set_rules('telephone', 'Telephone', 'trim|required');

		if ($this->form_validation->run()) {
			$this->MCustomer->store_record();
			$this->session->set_flashdata('message', 'Record Inserted Successfully');
			redirect('customer/add_customer');
		} else {
			$this->add_customer();
		}
	}

	public function view_customer()
	{
		$value['customers'] = $this->MCustomer->get_all();
		$data['title'] = "Customer";
		$data['container'] = $this->load->view('customer/view_customer', $value, true);
		$this->load->view('master', $data);
	}

	public function edit_customer($id)
	{
		$value['customer'] = $this->MCustomer->get_record($id);
		$data['title'] = "Customer";
		$data['container'] = $this->load->view('customer/edit_customer', $value, true);
		$this->load->view('master', $data);
	}

	public function update_customer()
	{
		$id = $this->input->post('id', true);
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('zip', 'Zip', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		$this->form_validation->set_rules('country', 'Country', 'trim|required');
		$this->form_validation->set_rules('telephone', 'Telephone', 'trim|required');

		if ($this->form_validation->run()) {
			$this->MCustomer->update_record();
			$this->session->set_flashdata('message', 'Record Updated Successfully');
			redirect('customer/view_customer');
		} else {
			$this->edit_customer($id);
		}
	}

	public function delete_customer($id)
	{
		$message = $this->MCustomer->delete_record($id);
		$this->session->set_flashdata('message', $message);
		redirect('customer/view_customer');
	}
}
