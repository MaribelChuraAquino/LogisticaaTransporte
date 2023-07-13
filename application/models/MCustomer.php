<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MCustomer extends CI_Model
{
	public function get_last_row()
	{
		return $this->db->select('customer_id')->order_by('id', "desc")->limit(1)->get('tbl_customer')->row();
	}

	public function store_record()
	{
		$data = array(
			'customer_id' => $this->input->post('customer_id', true),
			'name' => $this->input->post('name', true),
			'address' => $this->input->post('address', true),
			'city' => $this->input->post('city', true),
			'zip' => $this->input->post('zip', true),
			'state' => $this->input->post('state', true),
			'country' => $this->input->post('country', true),
			'phone' => $this->input->post('telephone', true),
			'mc' => $this->input->post('mc', true),
			'email' => $this->input->post('email', true),
			'notes' => $this->input->post('notes', true)
		);
		$this->db->insert('tbl_customer', $data);
	}

	public function get_all()
	{
		return $this->db->get('tbl_customer')->result();
	}

	public function get_record($id)
	{
		return $this->db->where('id', $id)->get('tbl_customer')->row();
	}

	public function update_record()
	{
		$data = array(
			'customer_id' => $this->input->post('customer_id', true),
			'name' => $this->input->post('name', true),
			'address' => $this->input->post('address', true),
			'city' => $this->input->post('city', true),
			'zip' => $this->input->post('zip', true),
			'state' => $this->input->post('state', true),
			'country' => $this->input->post('country', true),
			'phone' => $this->input->post('telephone', true),
			'mc' => $this->input->post('mc', true),
			'email' => $this->input->post('email', true),
			'notes' => $this->input->post('notes', true)
		);
		$this->db->where('id', $this->input->post('id', true));
		$this->db->update('tbl_customer', $data);
	}

	public function delete_record($id)
	{
		$this->db->delete('tbl_customer', array('id' => $id));
		if ($this->db->affected_rows() > 0) {
			return "Data Deleted Successfully";
		} else {
			return "Data Deletion Failed";
		}
	}

	public function get_customer_pay_summary_report()
	{
		$customer_id = $this->input->post('customer_id', true);
		$start_date = $this->input->post('from_date', true);
		$end_date = $this->input->post('to_date', true);
		return $this->db->where(array('customer_id' => $customer_id, 'date >= ' => $start_date, 'date <= ' => $end_date))
			->get('tbl_load_entry')->result();
	}
}
