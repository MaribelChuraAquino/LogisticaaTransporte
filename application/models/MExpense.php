<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MExpense extends CI_Model
{
	public function store_expense_record()
	{
		$data = array(
			'date' => $this->input->post('date', true),
			'vendor' => $this->input->post('vendor', true),
			'description' => $this->input->post('description', true),
			'account_holder' => $this->input->post('account_holder', true),
			'amount' => $this->input->post('amount', true)
		);
		$this->db->insert('tbl_expense', $data);
	}

	public function store_expense_record_csv($data)
	{
		$this->db->insert('tbl_expense', $data);
	}

	public function update_expense_record()
	{
		$data = array(
			'date' => $this->input->post('date', true),
			'vendor' => $this->input->post('vendor', true),
			'description' => $this->input->post('description', true),
			'account_holder' => $this->input->post('account_holder', true),
			'amount' => $this->input->post('amount', true)
		);

		$this->db->where('id', $this->input->post('id', true));
		$this->db->update('tbl_expense', $data);
	}

	public function get_record($id)
	{
		return $this->db->where('id', $id)->get('tbl_expense')->row();
	}

	public function get_all()
	{
		return $this->db->get('tbl_expense')->result();
	}

	public function delete_expense_record($id)
	{
		$this->db->delete('tbl_expense', array('id' => $id));
		if ($this->db->affected_rows() > 0) {
			return "Data Deleted Successfully";
		} else {
			return "Data Deletion Failed";
		}
	}

	public function get_all_expense_record($account_holder, $from_date, $to_date)
	{
		return $this->db->where(array('account_holder' => $account_holder, 'date >= ' => $from_date, 'date <= ' => $to_date))
		            ->get('tbl_expense')->result();
	}
}
