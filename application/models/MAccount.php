<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MAccount extends CI_Model
{
	public function store_account_holder_record()
	{
		$data = array(
			'name' => $this->input->post('name')
		);
		$this->db->insert('tbl_account_holder', $data);
	}

	public function get_all()
	{
		return $this->db->get('tbl_account_holder')->result();
	}

	public function get_record($id)
	{
		return $this->db->where('id', $id)->get('tbl_account_holder')->row();
	}

	public function update_account_holder_record()
	{
		$data = array(
			'name' => $this->input->post('name')
		);
		$this->db->where('id', $this->input->post('id', true));
		$this->db->update('tbl_account_holder', $data);
	}

	public function delete_account_holder_record($id)
	{
		$this->db->delete('tbl_account_holder', array('id' => $id));
		if ($this->db->affected_rows() > 0) {
			return "Data Deleted Successfully";
		} else {
			return "Data Deletion Failed";
		}
	}
}
