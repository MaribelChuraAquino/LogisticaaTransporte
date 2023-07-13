<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consignee extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->id)) {
			redirect('login');
		}
		$this->load->model('MConsignee');
	}

	public function add_consignee()
	{
		$last_row = $this->MConsignee->get_last_row();
		if ($last_row) {
			$id = (int)$last_row->consignee_id;
			$result = $id + 1;
			$consignee_id = $result;
		} else {
			$consignee_id = 3001;
		}
		$value['consignee_id'] = $consignee_id;
		$data['title'] = "Consignee";
		$data['container'] = $this->load->view('consignee/add_consignee', $value, true);
		$this->load->view('master', $data);
	}

	public function store_consignee()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('postal_zip', 'Postal Zip', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');

		if ($this->form_validation->run()) {
			$this->MConsignee->store_record();
			$this->session->set_flashdata('message', 'Record Inserted Successfully');
			redirect('consignee/add_consignee');
		} else {
			$this->add_consignee();
		}
	}

	public function view_consignee()
	{
		$value['results'] = $this->MConsignee->get_all();
		$data['title'] = "Consignee";
		$data['container'] = $this->load->view('consignee/view_consignee', $value, true);
		$this->load->view('master', $data);
	}

	public function edit_consignee($id)
	{
		$value['result'] = $this->MConsignee->get_record($id);
		$data['title'] = "Consignee";
		$data['container'] = $this->load->view('consignee/edit_consignee', $value, true);
		$this->load->view('master', $data);
	}

	public function update_consignee()
	{
		$id = $this->input->post('id', true);
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('postal_zip', 'Postal Zip', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');

		if ($this->form_validation->run()) {
			$this->MConsignee->update_record();
			$this->session->set_flashdata('message', 'Record Updated Successfully');
			redirect('consignee/view_consignee');
		} else {
			$this->edit_consignee($id);
		}
	}

	public function delete_consignee($id)
	{
		$message = $this->MConsignee->delete_record($id);
		$this->session->set_flashdata('message', $message);
		redirect('consignee/view_consignee');
	}

	public function get_records_by_consignee_id()
	{
		$consignee_id = $this->input->post('consignee_id', true);
		$consignee = $this->MConsignee->get_record($consignee_id);
		$data = array();
		if ($consignee) {
			$data['address'] = $consignee->address;
			$data['city'] = $consignee->city;
			$data['state'] = $consignee->state;
			$data['zip_code'] = $consignee->postal_zip;
			$data['latitude'] = $consignee->latitude;
			$data['longtitude'] = $consignee->longtitude;
		} else {
			$data['address'] = '';
			$data['city'] = '';
			$data['state'] = '';
			$data['zip_code'] = '';
			$data['latitude'] = '';
			$data['longtitude'] = '';
		}
		echo json_encode($data);
	}
}
