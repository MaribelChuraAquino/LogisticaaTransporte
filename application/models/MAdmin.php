<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MAdmin extends CI_Model
{
	public function get_admin_details($username)
	{
		return $this->db->where('username', $username)
			->or_where('email', $username)
			->where('status', 1)
			->get('tbl_admin')->row();
	}

	public function get_admin_records($id)
	{
		return $this->db->where('id', $id)->get('tbl_admin')->row();
	}

	/*public function get_type_record($id)
	{
		return $this->db->where('admin_id', $id)->get('tbl_admin_type')->row();
	}

	public function get_admin_type_record($id)
	{
		return $this->db->where('admin_id', $id)->get('tbl_admin_type')->row();
	}*/

	public function upload_image()
	{
		$config['upload_path'] = './image/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = 25169930;
		$config['max_width'] = 5200;
		$config['max_height'] = 3500;
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('image')) {
			$data = $this->upload->data();
			return "image/$data[file_name]";
		} else {
			return false;
		}
	}

	public function store_user_record()
	{
		if ($_FILES['image']['name'] != '' || $_FILES['image']['size'] != 0) {
			$image = $this->upload_image();
			if (!$image) {
				return "Please Upload Valid Image";
			}
		} else {
			$image = '';
		}
		$data = array(
			'name' => $this->input->post('name', true),
			'email' => $this->input->post('email', true),
			'username' => $this->input->post('username', true),
			'phone' => $this->input->post('phone', true),
			'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
			'status' => 1,
			'image' => $image
		);
		$this->db->insert('tbl_admin', $data);
		return $this->db->insert_id();
	}

	/*public function store_admin_type_record($id)
	{
		$add_product = $this->input->post('add_product', true);
		$manage_product = $this->input->post('manage_product', true);
		$add_category = $this->input->post('add_category', true);
		$manage_category = $this->input->post('manage_category', true);
		$new_order = $this->input->post('new_order', true);
		$manage_order = $this->input->post('manage_order', true);
		$manage_invoice = $this->input->post('manage_invoice', true);
		$add_customer = $this->input->post('add_customer', true);
		$manage_customer = $this->input->post('manage_customer', true);
		$sales_report = $this->input->post('sales_report', true);
		$purchase_report = $this->input->post('purchase_report', true);
		$stock_evaluation = $this->input->post('stock_evaluation', true);
		$settings = $this->input->post('settings', true);
		$employee_list = $this->input->post('employee_list', true);
		$add_employee = $this->input->post('add_employee', true);
		$admin_type = $this->input->post('admin_type', true);
		$data['admin_id'] = $id;
		if (isset($add_product)) {
			$data['add_product'] = 1;
		} else {
			$data['add_product'] = 0;
		}
		if (isset($manage_product)) {
			$data['manage_product'] = 1;
		} else {
			$data['manage_product'] = 0;
		}
		if (isset($add_category)) {
			$data['add_category'] = 1;
		} else {
			$data['add_category'] = 0;
		}
		if (isset($manage_category)) {
			$data['manage_category'] = 1;
		} else {
			$data['manage_category'] = 0;
		}
		if (isset($new_order)) {
			$data['new_order'] = 1;
		} else {
			$data['new_order'] = 0;
		}
		if (isset($manage_order)) {
			$data['manage_order'] = 1;
		} else {
			$data['manage_order'] = 0;
		}
		if (isset($manage_invoice)) {
			$data['manage_invoice'] = 1;
		} else {
			$data['manage_invoice'] = 0;
		}
		if (isset($add_customer)) {
			$data['add_customer'] = 1;
		} else {
			$data['add_customer'] = 0;
		}
		if (isset($manage_customer)) {
			$data['manage_customer'] = 1;
		} else {
			$data['manage_customer'] = 0;
		}
		if (isset($sales_report)) {
			$data['sales_report'] = 1;
		} else {
			$data['sales_report'] = 0;
		}
		if (isset($purchase_report)) {
			$data['purchase_report'] = 1;
		} else {
			$data['purchase_report'] = 0;
		}
		if (isset($stock_evaluation)) {
			$data['stock_evaluation'] = 1;
		} else {
			$data['stock_evaluation'] = 0;
		}
		if (isset($settings)) {
			$data['settings'] = 1;
		} else {
			$data['settings'] = 0;
		}
		if (isset($employee_list)) {
			$data['employee_list'] = 1;
		} else {
			$data['employee_list'] = 0;
		}
		if (isset($add_employee)) {
			$data['add_employee'] = 1;
		} else {
			$data['add_employee'] = 0;
		}
		if (isset($admin_type)) {
			$data['admin_type'] = 1;
		} else {
			$data['admin_type'] = 0;
		}
		$this->db->insert('tbl_admin_type', $data);
	}*/

	public function get_all_users()
	{
		return $this->db->get('tbl_admin')->result();
	}

	public function change_user_status_record($id, $status)
	{
		$data['status'] = $status;
		$this->db->where('id', $id);
		$this->db->update('tbl_admin', $data);
	}

	public function delete_user_record($id)
	{
		if ($id == 1) {
			return "You can't delete admin";
		} else {
			//$this->db->delete('tbl_admin_type', array('admin_id' => $id));
			$this->db->delete('tbl_admin', array('id' => $id));
			if ($this->db->affected_rows() > 0) {
				return "Data Deleted Successfully";
			} else {
				return "Data Deletion Failed";
			}
		}
	}

	public function update_user_record()
	{
		$data = array(
			'name' => $this->input->post('name', true),
			'email' => $this->input->post('email', true),
			'username' => $this->input->post('username', true),
			'phone' => $this->input->post('phone', true)
		);

		if ($_FILES['image']['name'] != '' || $_FILES['image']['size'] != 0) {
			$data['image'] = $this->upload_image();
			unlink($this->input->post('userImage', true));
		} else {
			$data['image'] = $this->input->post('userImage', true);
		}

		$password = $this->input->post('password', true);
		$confirm_password = $this->input->post('confirm_password', true);
		$user_id = $this->input->post('id', true);

		if (!empty($password)) {
			if ($password == $confirm_password) {
				$data['password'] = password_hash($password, PASSWORD_DEFAULT);
				$this->db->where('id', $user_id);
				$this->db->update('tbl_admin', $data);
			} else {
				$this->session->set_flashdata('message', 'Password and Confirm password are not match');
				redirect("admin/edit_user/$user_id");
			}
		} else {
			$user_password = $this->db->select('password')->from('tbl_admin')->where('id', $user_id)->get()->row();
			$data['password'] = $user_password->password;
		}
		$this->db->where('id', $user_id);
		$this->db->update('tbl_admin', $data);
	}

	/*public function update_user_type_record()
	{
		$add_product = $this->input->post('add_product', true);
		$manage_product = $this->input->post('manage_product', true);
		$add_category = $this->input->post('add_category', true);
		$manage_category = $this->input->post('manage_category', true);
		$new_order = $this->input->post('new_order', true);
		$manage_order = $this->input->post('manage_order', true);
		$manage_invoice = $this->input->post('manage_invoice', true);
		$add_customer = $this->input->post('add_customer', true);
		$manage_customer = $this->input->post('manage_customer', true);
		$sales_report = $this->input->post('sales_report', true);
		$purchase_report = $this->input->post('purchase_report', true);
		$stock_evaluation = $this->input->post('stock_evaluation', true);
		$settings = $this->input->post('settings', true);
		$employee_list = $this->input->post('employee_list', true);
		$add_employee = $this->input->post('add_employee', true);
		$admin_type = $this->input->post('admin_type', true);
		if (isset($add_product)) {
			$data['add_product'] = 1;
		} else {
			$data['add_product'] = 0;
		}
		if (isset($manage_product)) {
			$data['manage_product'] = 1;
		} else {
			$data['manage_product'] = 0;
		}
		if (isset($add_category)) {
			$data['add_category'] = 1;
		} else {
			$data['add_category'] = 0;
		}
		if (isset($manage_category)) {
			$data['manage_category'] = 1;
		} else {
			$data['manage_category'] = 0;
		}
		if (isset($new_order)) {
			$data['new_order'] = 1;
		} else {
			$data['new_order'] = 0;
		}
		if (isset($manage_order)) {
			$data['manage_order'] = 1;
		} else {
			$data['manage_order'] = 0;
		}
		if (isset($manage_invoice)) {
			$data['manage_invoice'] = 1;
		} else {
			$data['manage_invoice'] = 0;
		}
		if (isset($add_customer)) {
			$data['add_customer'] = 1;
		} else {
			$data['add_customer'] = 0;
		}
		if (isset($manage_customer)) {
			$data['manage_customer'] = 1;
		} else {
			$data['manage_customer'] = 0;
		}
		if (isset($sales_report)) {
			$data['sales_report'] = 1;
		} else {
			$data['sales_report'] = 0;
		}
		if (isset($purchase_report)) {
			$data['purchase_report'] = 1;
		} else {
			$data['purchase_report'] = 0;
		}
		if (isset($stock_evaluation)) {
			$data['stock_evaluation'] = 1;
		} else {
			$data['stock_evaluation'] = 0;
		}
		if (isset($settings)) {
			$data['settings'] = 1;
		} else {
			$data['settings'] = 0;
		}
		if (isset($employee_list)) {
			$data['employee_list'] = 1;
		} else {
			$data['employee_list'] = 0;
		}
		if (isset($add_employee)) {
			$data['add_employee'] = 1;
		} else {
			$data['add_employee'] = 0;
		}
		if (isset($admin_type)) {
			$data['admin_type'] = 1;
		} else {
			$data['admin_type'] = 0;
		}

		$this->db->where('admin_id', $this->input->post('id', true));
		$this->db->update('tbl_admin_type', $data);
	}*/

	public function count_all_user()
	{
		return $this->db->count_all_results('tbl_admin');
	}

	public function count_all_customers()
	{
		return $this->db->count_all_results('tbl_customer');
	}

	public function count_all_dispatches()
	{
		return $this->db->count_all_results('tbl_dispatch');
	}

	public function count_all_drivers()
	{
		return $this->db->count_all_results('tbl_driver');
	}

	public function count_all_load_entry()
	{
		return $this->db->count_all_results('tbl_load_entry');
	}

	public function count_all_shippers()
	{
		return $this->db->count_all_results('tbl_shippers');
	}

	public function count_all_consignees()
	{
		return $this->db->count_all_results('tbl_consignee');
	}

	public function count_all_equipments()
	{
		return $this->db->count_all_results('tbl_equipment');
	}

	public function get_settings_record()
	{
		return $this->db->where('id', 1)->get('tbl_settings')->row();
	}

	public function update_settings_record()
	{
		$data = array(
			'name' => $this->input->post('name', true),
			'email' => $this->input->post('email', true),
			'address' => $this->input->post('address', true),
			'phone' => $this->input->post('phone', true),
			'currency' => $this->input->post('currency', true),
			'latitude' => $this->input->post('latitude', true),
			'longtitude' => $this->input->post('longitude', true)
		);

		if ($_FILES['image']['name'] != '' || $_FILES['image']['size'] != 0) {
			$data['logo'] = $this->upload_image();
			unlink($this->input->post('old_logo', true));
		} else {
			$data['logo'] = $this->input->post('old_logo', true);
		}

		$this->db->where('id', 1);
		$this->db->update('tbl_settings', $data);
	}

	/*public function get_record_by_insert_id($member_id)
	{
		return $this->db->where('insert_id', $member_id)->get('tbl_admin')->row();
	}*/

}
