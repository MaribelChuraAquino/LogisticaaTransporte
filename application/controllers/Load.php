<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Load extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->id)) {
			redirect('login');
		}
		$this->load->model('MLoad');
		$this->load->model('MCustomer');
		$this->load->model('MShipper');
		$this->load->model('MConsignee');
		$this->load->model('MDriver');
		$this->load->model('MDispatch');
	}

	public function add_load_entry()
	{
		$value['customers'] = $this->MCustomer->get_all();
		$value['consignees'] = $this->MConsignee->get_all();
		$value['shippers'] = $this->MShipper->get_all();
		$value['drivers'] = $this->MDriver->get_all();
		$value['dispatches'] = $this->MDispatch->get_all();
		$last_row = $this->MLoad->get_last_row();
		if ($last_row) {
			$id = (int)$last_row->load_id;
			$result = $id + 1;
			$load_id = $result;
		} else {
			$load_id = 7001;
		}
		$value['load_id'] = $load_id;
		$data['title'] = "Load";
		$data['container'] = $this->load->view('load/add_load_entry', $value, true);
		$this->load->view('master', $data);
	}

	public function store_load()
	{
		$this->form_validation->set_rules('customer_id', 'Customer', 'trim|required');
		$this->form_validation->set_rules('customer_load', 'Customer Load', 'trim|required');
		$this->form_validation->set_rules('load_type', 'Load Type', 'trim|required');
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('pick_up_date', 'Pick Up Date', 'trim|required');
		$this->form_validation->set_rules('delivery_date', 'Delivery Date', 'trim|required');
		$this->form_validation->set_rules('dispatch_id', 'Dispatch', 'trim|required');
		$this->form_validation->set_rules('line_haul_rate', 'Line Haul Rate', 'trim|required');
		$this->form_validation->set_rules('reimburse', 'Reimburse', 'trim|required');
		$this->form_validation->set_rules('driver_id', 'Driver', 'trim|required');
		$this->form_validation->set_rules('shipper_id', 'Shipper', 'trim|required');
		$this->form_validation->set_rules('consignee_id', 'Consignee', 'trim|required');

		if ($this->form_validation->run()) {
			$this->MLoad->store_record();
			$this->session->set_flashdata('message', 'Record Inserted Successfully');
			redirect('load/add_load_entry');
		} else {
			$this->add_load_entry();
		}
	}

	public function view_load_entry()
	{
		$value['loads'] = $this->MLoad->get_all();
		$data['title'] = "Load";
		$data['container'] = $this->load->view('load/view_load_entry', $value, true);
		$this->load->view('master', $data);
	}

	public function edit_load_entry($id)
	{
		$value['load'] = $this->MLoad->get_record($id);
		$value['customers'] = $this->MCustomer->get_all();
		$value['consignees'] = $this->MConsignee->get_all();
		$value['shippers'] = $this->MShipper->get_all();
		$value['drivers'] = $this->MDriver->get_all();
		$value['dispatches'] = $this->MDispatch->get_all();
		$data['title'] = "Load";
		$data['container'] = $this->load->view('load/edit_load_entry', $value, true);
		$this->load->view('master', $data);
	}

	public function update_load()
	{
		$id = $this->input->post('id', true);
		$this->form_validation->set_rules('customer_id', 'Customer', 'trim|required');
		$this->form_validation->set_rules('customer_load', 'Customer Load', 'trim|required');
		$this->form_validation->set_rules('load_type', 'Load Type', 'trim|required');
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('pick_up_date', 'Pick Up Date', 'trim|required');
		$this->form_validation->set_rules('delivery_date', 'Delivery Date', 'trim|required');
		$this->form_validation->set_rules('dispatch_id', 'Dispatch', 'trim|required');
		$this->form_validation->set_rules('line_haul_rate', 'Line Haul Rate', 'trim|required');
		$this->form_validation->set_rules('reimburse', 'Reimburse', 'trim|required');
		$this->form_validation->set_rules('driver_id', 'Driver', 'trim|required');
		$this->form_validation->set_rules('shipper_id', 'Shipper', 'trim|required');
		$this->form_validation->set_rules('consignee_id', 'Consignee', 'trim|required');

		if ($this->form_validation->run()) {
			$this->MLoad->update_record();
			$this->session->set_flashdata('message', 'Record Updated Successfully');
			redirect('load/view_load_entry');
		} else {
			$this->edit_load_entry($id);
		}
	}

	public function show_load_entry($id)
	{
		$value['company'] = $this->MAdmin->get_settings_record();
		$load = $this->MLoad->get_record($id);
		$value['load'] = $load;
		$value['customer'] = $this->MCustomer->get_record($load->customer_id);
		$value['consignee'] = $this->MConsignee->get_record($load->consignee_id);
		$value['shipper'] = $this->MShipper->get_record($load->shipper_id);
		$value['driver'] = $this->MDriver->get_record($load->driver_id);
		$value['dispatch'] = $this->MDispatch->get_record($load->dispatch_id);
		$data['title'] = "Load";
		$data['container'] = $this->load->view('load/show_load_entry', $value, true);
		$this->load->view('master', $data);
	}

	public function delete_load_entry($id)
	{
		$message = $this->MLoad->delete_record($id);
		$this->session->set_flashdata('message', $message);
		redirect('load/view_load_entry');
	}
}
