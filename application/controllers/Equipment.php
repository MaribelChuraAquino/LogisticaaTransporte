<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipment extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->id)) {
			redirect('login');
		}
		$this->load->model('MEquipment');
	}

	public function add_equipment()
	{
		$data['title'] = "Equipment";
		$data['container'] = $this->load->view('equipment/add_equipment', '', true);
		$this->load->view('master', $data);
	}

	public function store_equipment()
	{
		$this->form_validation->set_rules('owner_first_name', 'Owner First Name', 'trim|required');
		$this->form_validation->set_rules('owner_last_name', 'Owner Last Name', 'trim|required');
		$this->form_validation->set_rules('unit_number', 'Unit Number', 'trim|required');
		$this->form_validation->set_rules('make', 'Make', 'trim|required');
		$this->form_validation->set_rules('year', 'Year', 'trim|required');
		$this->form_validation->set_rules('vin', 'VIN', 'trim|required');
		$this->form_validation->set_rules('plate_number', 'Plate Number', 'trim|required');
		$this->form_validation->set_rules('plate_exp', 'Plate Expiry', 'trim|required');
		$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
		$this->form_validation->set_rules('dot_date', 'DOT Inspection Date', 'trim|required');
		$this->form_validation->set_rules('annual_date', 'Annual Inspection Date', 'trim|required');
		$this->form_validation->set_rules('days_inspection_date', '90 Days Inspection Date', 'trim|required');

		if ($this->form_validation->run()) {
			$this->MEquipment->store_record();
			$this->session->set_flashdata('message', 'Record Inserted Successfully');
			redirect('equipment/add_equipment');
		} else {
			$this->add_equipment();
		}
	}

	public function view_equipment()
	{
		$value['equipments'] = $this->MEquipment->get_all();
		$data['title'] = "Equipment";
		$data['container'] = $this->load->view('equipment/view_equipment', $value, true);
		$this->load->view('master', $data);
	}

	public function edit_equipment($id)
	{
		$value['equipment'] = $this->MEquipment->get_record($id);
		$data['title'] = "Equipment";
		$data['container'] = $this->load->view('equipment/edit_equipment', $value, true);
		$this->load->view('master', $data);
	}

	public function update_equipment()
	{
		$id = $this->input->post('id', true);
		$this->form_validation->set_rules('owner_first_name', 'Owner First Name', 'trim|required');
		$this->form_validation->set_rules('owner_last_name', 'Owner Last Name', 'trim|required');
		$this->form_validation->set_rules('unit_number', 'Unit Number', 'trim|required');
		$this->form_validation->set_rules('make', 'Make', 'trim|required');
		$this->form_validation->set_rules('year', 'Year', 'trim|required');
		$this->form_validation->set_rules('vin', 'VIN', 'trim|required');
		$this->form_validation->set_rules('plate_number', 'Plate Number', 'trim|required');
		$this->form_validation->set_rules('plate_exp', 'Plate Expiry', 'trim|required');
		$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
		$this->form_validation->set_rules('dot_date', 'DOT Inspection Date', 'trim|required');
		$this->form_validation->set_rules('annual_date', 'Annual Inspection Date', 'trim|required');
		$this->form_validation->set_rules('days_inspection_date', '90 Days Inspection Date', 'trim|required');

		if ($this->form_validation->run()) {
			$this->MEquipment->update_record();
			$this->session->set_flashdata('message', 'Record Updated Successfully');
			redirect('equipment/view_equipment');
		} else {
			$this->edit_equipment($id);
		}
	}

	public function show_equipment($id)
	{
		$value['company'] = $this->MAdmin->get_settings_record();
		$value['equipment'] = $this->MEquipment->get_record($id);
		$data['title'] = "Equipment";
		$data['container'] = $this->load->view('equipment/show_equipment', $value, true);
		$this->load->view('master', $data);
	}

	public function delete_equipment($id)
	{
		$message = $this->MEquipment->delete_record($id);
		$this->session->set_flashdata('message', $message);
		redirect('equipment/view_equipment');
	}
}
