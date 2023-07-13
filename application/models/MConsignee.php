<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MConsignee extends CI_Model
{
	public function get_last_row()
	{
		return $this->db->select('consignee_id')->order_by('id', "desc")->limit(1)->get('tbl_consignee')->row();
	}

	public function store_record()
	{
		$data = array(
			'consignee_id' => $this->input->post('consignee_id', true),
			'name' => $this->input->post('name', true),
			'address' => $this->input->post('address', true),
			'city' => $this->input->post('city', true),
			'postal_zip' => $this->input->post('postal_zip', true),
			'state' => $this->input->post('state', true),
			'contact' => $this->input->post('contact', true),
			'phone' => $this->input->post('telephone', true),
			'ext' => $this->input->post('ext', true),
			'email' => $this->input->post('email', true),
			'notes' => $this->input->post('notes', true),
			'latitude' => $this->input->post('latitude', true),
			'longtitude' => $this->input->post('longitude', true)
		);
		$this->db->insert('tbl_consignee', $data);
	}

	public function get_all()
	{
		return $this->db->get('tbl_consignee')->result();
	}

	public function get_record($id)
	{
		return $this->db->where('id', $id)->get('tbl_consignee')->row();
	}

	public function update_record()
	{
		$data = array(
			'consignee_id' => $this->input->post('consignee_id', true),
			'name' => $this->input->post('name', true),
			'address' => $this->input->post('address', true),
			'city' => $this->input->post('city', true),
			'postal_zip' => $this->input->post('postal_zip', true),
			'state' => $this->input->post('state', true),
			'contact' => $this->input->post('contact', true),
			'phone' => $this->input->post('telephone', true),
			'ext' => $this->input->post('ext', true),
			'email' => $this->input->post('email', true),
			'notes' => $this->input->post('notes', true),
			'latitude' => $this->input->post('latitude', true),
			'longtitude' => $this->input->post('longitude', true)
		);
		$this->db->where('id', $this->input->post('id', true));
		$this->db->update('tbl_consignee', $data);
	}

	public function delete_record($id)
	{
		$this->db->delete('tbl_consignee', array('id' => $id));
		if ($this->db->affected_rows() > 0) {
			return "Data Deleted Successfully";
		} else {
			return "Data Deletion Failed";
		}
	}
}
