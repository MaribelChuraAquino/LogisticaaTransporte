<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDispatch extends CI_Model
{
	public function store_dispatch()
	{
		$data = array(
			'dispatch_id' => $this->input->post('dispatch_id', true),
			'first_name' => $this->input->post('first_name', true),
			'last_name' => $this->input->post('last_name', true),
			'phone' => $this->input->post('phone', true),
			'email' => $this->input->post('email', true),
			'rate' => $this->input->post('rate', true)
		);
		$this->db->insert('tbl_dispatch', $data);
	}

	public function get_all()
	{
		return $this->db->get('tbl_dispatch')->result();
	}

	public function get_record($id)
	{
		return $this->db->where('id', $id)->get('tbl_dispatch')->row();
	}

	public function get_last_row()
	{
		return $this->db->select('dispatch_id')->order_by('id', "desc")->limit(1)->get('tbl_dispatch')->row();
	}

	public function update_dispatch()
	{
		$data = array(
			'dispatch_id' => $this->input->post('dispatch_id', true),
			'first_name' => $this->input->post('first_name', true),
			'last_name' => $this->input->post('last_name', true),
			'phone' => $this->input->post('phone', true),
			'email' => $this->input->post('email', true),
			'rate' => $this->input->post('rate', true)
		);
		$this->db->where('id', $this->input->post('id', true));
		$this->db->update('tbl_dispatch', $data);
	}

	public function delete_record($id)
	{
		$this->db->delete('tbl_dispatch', array('id' => $id));
		if ($this->db->affected_rows() > 0) {
			return "Data Deleted Successfully";
		} else {
			return "Data Deletion Failed";
		}
	}

	public function get_dispatch_pay_summary_report()
	{
		$dispatch_id = $this->input->post('dispatch_id', true);
		$start_date = $this->input->post('from_date', true);
		$end_date = $this->input->post('to_date', true);
		return $this->db->where(array('dispatch_id' => $dispatch_id, 'pick_up_date >= ' => $start_date, 'delivery_date <= ' => $end_date))
			->get('tbl_load_entry')->result();
	}
	
	public function get_individual_drivers_record($dispatch_id)
	{
	    return $this->db->where('dispatch_id', $dispatch_id)->group_by('driver_id')->get('tbl_load_entry')->result();
	}
}
