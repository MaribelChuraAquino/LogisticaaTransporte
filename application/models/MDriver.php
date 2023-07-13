<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDriver extends CI_Model
{
	public function get_last_row()
	{
		return $this->db->select('driver_id')->order_by('id', "desc")->limit(1)->get('tbl_driver')->row();
	}

	public function store_driver()
	{
		$data = array(
			'driver_id' => $this->input->post('driver_id', true),
			'first_name' => $this->input->post('first_name', true),
			'last_name' => $this->input->post('last_name', true),
			'address' => $this->input->post('address', true),
			'city' => $this->input->post('city', true),
			'state' => $this->input->post('state', true),
			'postal_zip' => $this->input->post('postal_zip', true),
			'phone' => $this->input->post('telephone', true),
			'email' => $this->input->post('email', true),
			'dob' => $this->input->post('dob', true),
			'ssn' => $this->input->post('ssn', true),
			'license_number' => $this->input->post('license_number', true),
			'license_exp' => $this->input->post('license_exp', true),
			'medical_date' => $this->input->post('medical_date', true),
			'medical_exp' => $this->input->post('medical_exp', true),
			'drug_test' => $this->input->post('drug_test', true),
			'pay_type' => $this->input->post('pay_type', true),
			'per_mile' => $this->input->post('per_mile', true),
			'empty_mile' => $this->input->post('empty_mile', true),
			'percentage' => $this->input->post('percentage', true),
			'status' => $this->input->post('status', true),
			'notes' => $this->input->post('notes', true),
			'insurance_cargo' => $this->input->post('insurance', true),
			'insurance_truck' => $this->input->post('insurance_truck', true),
			'ifta_service' => $this->input->post('ifta_service', true),
			'account_holder' => $this->input->post('account_holder', true),
			'prepass' => $this->input->post('prepass', true),
			'load_board' => $this->input->post('load_board', true),
			'trailer_rent' => $this->input->post('trailer_rent', true)
		);
		$this->db->insert('tbl_driver', $data);
	}

	public function get_all()
	{
		return $this->db->get('tbl_driver')->result();
	}

	public function get_record($id)
	{
		return $this->db->where('id', $id)->get('tbl_driver')->row();
	}

	public function update_driver()
	{
		$data = array(
			'driver_id' => $this->input->post('driver_id', true),
			'first_name' => $this->input->post('first_name', true),
			'last_name' => $this->input->post('last_name', true),
			'address' => $this->input->post('address', true),
			'city' => $this->input->post('city', true),
			'state' => $this->input->post('state', true),
			'postal_zip' => $this->input->post('postal_zip', true),
			'phone' => $this->input->post('telephone', true),
			'email' => $this->input->post('email', true),
			'dob' => $this->input->post('dob', true),
			'ssn' => $this->input->post('ssn', true),
			'license_number' => $this->input->post('license_number', true),
			'license_exp' => $this->input->post('license_exp', true),
			'medical_date' => $this->input->post('medical_date', true),
			'medical_exp' => $this->input->post('medical_exp', true),
			'drug_test' => $this->input->post('drug_test', true),
			'pay_type' => $this->input->post('pay_type', true),
			'per_mile' => $this->input->post('per_mile', true),
			'empty_mile' => $this->input->post('empty_mile', true),
			'percentage' => $this->input->post('percentage', true),
			'status' => $this->input->post('status', true),
			'notes' => $this->input->post('notes', true),
			'insurance_cargo' => $this->input->post('insurance', true),
			'insurance_truck' => $this->input->post('insurance_truck', true),
			'ifta_service' => $this->input->post('ifta_service', true),
			'account_holder' => $this->input->post('account_holder', true),
			'prepass' => $this->input->post('prepass', true),
			'load_board' => $this->input->post('load_board', true),
			'trailer_rent' => $this->input->post('trailer_rent', true)
		);
		$this->db->where('id', $this->input->post('id', true));
		$this->db->update('tbl_driver', $data);
	}

	public function delete_record($id)
	{
		$this->db->delete('tbl_driver', array('id' => $id));
		if ($this->db->affected_rows() > 0) {
			return "Data Deleted Successfully";
		} else {
			return "Data Deletion Failed";
		}
	}

	public function get_driver_pay_summary_report()
	{
		$driver_id = $this->input->post('driver_id', true);
		$start_date = $this->input->post('from_date', true);
		$end_date = $this->input->post('to_date', true);
		return $this->db->where(array('driver_id' => $driver_id, 'date >= ' => $start_date, 'date <= ' => $end_date))
			->get('tbl_load_entry')->result();
	}

	public function get_driver_pay_report()
	{
		$driver_id = $this->input->post('driver_id', true);
		return $this->db->where('driver_id', $driver_id)->get('tbl_load_entry')->result();
	}
	
	public function get_all_data($driver_id, $dispatch_id)
	{
	    return $this->db->where(array('driver_id'=>$driver_id, 'dispatch_id'=>$dispatch_id))->get('tbl_load_entry')->result();
	}
}
