<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MEquipment extends CI_Model
{
	public function store_record()
	{
		$data = array(
			'first_name' => $this->input->post('owner_first_name', true),
			'last_name' => $this->input->post('owner_last_name', true),
			'unit_number' => $this->input->post('unit_number', true),
			'make' => $this->input->post('make', true),
			'year' => $this->input->post('year', true),
			'type' => $this->input->post('type', true),
			'vin' => $this->input->post('vin', true),
			'plate_number' => $this->input->post('plate_number', true),
			'plate_expiry' => $this->input->post('plate_exp', true),
			'mileage' => $this->input->post('mileage', true),
			'province' => $this->input->post('province', true),
			'axels' => $this->input->post('axels', true),
			'fuel_type' => $this->input->post('fuel_type', true),
			'weight' => $this->input->post('weight', true),
			'start_date' => $this->input->post('start_date', true),
			'deactivation_date' => $this->input->post('deactivation_date', true),
			'dot_date' => $this->input->post('dot_date', true),
			'ifta_truck' => $this->input->post('ifta_truck', true),
			'annual_date' => $this->input->post('annual_date', true),
			'days_inspection_date' => $this->input->post('days_inspection_date', true),
			'truck' => $this->input->post('truck', true),
			'trailer' => $this->input->post('trailer', true)
		);
		$this->db->insert('tbl_equipment', $data);
	}

	public function get_all()
	{
		return $this->db->get('tbl_equipment')->result();
	}

	public function get_record($id)
	{
		return $this->db->where('id', $id)->get('tbl_equipment')->row();
	}

	public function update_record()
	{
		$data = array(
			'first_name' => $this->input->post('owner_first_name', true),
			'last_name' => $this->input->post('owner_last_name', true),
			'unit_number' => $this->input->post('unit_number', true),
			'make' => $this->input->post('make', true),
			'year' => $this->input->post('year', true),
			'type' => $this->input->post('type', true),
			'vin' => $this->input->post('vin', true),
			'plate_number' => $this->input->post('plate_number', true),
			'plate_expiry' => $this->input->post('plate_exp', true),
			'mileage' => $this->input->post('mileage', true),
			'province' => $this->input->post('province', true),
			'axels' => $this->input->post('axels', true),
			'fuel_type' => $this->input->post('fuel_type', true),
			'weight' => $this->input->post('weight', true),
			'start_date' => $this->input->post('start_date', true),
			'deactivation_date' => $this->input->post('deactivation_date', true),
			'dot_date' => $this->input->post('dot_date', true),
			'ifta_truck' => $this->input->post('ifta_truck', true),
			'annual_date' => $this->input->post('annual_date', true),
			'days_inspection_date' => $this->input->post('days_inspection_date', true),
			'truck' => $this->input->post('truck', true),
			'trailer' => $this->input->post('trailer', true)
		);
		$this->db->where('id', $this->input->post('id', true));
		$this->db->update('tbl_equipment', $data);
	}

	public function delete_record($id)
	{
		$this->db->delete('tbl_equipment', array('id' => $id));
		if ($this->db->affected_rows() > 0) {
			return "Data Deleted Successfully";
		} else {
			return "Data Deletion Failed";
		}
	}

	public function get_name_record($first_name, $last_name)
	{
		return $this->db->where(array('first_name' => $first_name, 'last_name' => $last_name))->get('tbl_equipment')->row();
	}
}
