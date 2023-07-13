<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipper extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->id)) {
			redirect('login');
		}
		$this->load->model('MShipper');
		$this->load->library('toastr');
	}

	public function add_shippers()
	{
		$last_row = $this->MShipper->get_last_row();
		if ($last_row) {
			$id = (int)$last_row->shippers_id;
			$result = $id + 1;
			$shippers_id = $result;
		} else {
			$shippers_id = 4001;
		}
		$value['shippers_id'] = $shippers_id;
		$data['title'] = "Shippers";
		$data['container'] = $this->load->view('shippers/add_shippers', $value, true);
		$this->load->view('master', $data);
	}

	public function store_shipper()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('postal_zip', 'Postal Zip', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');

		if ($this->form_validation->run()) {
			$this->MShipper->store_record();
			$this->session->set_flashdata('message', 'Record Inserted Successfully');
			redirect('shipper/add_shippers');
		} else {
			$this->add_shippers();
		}
	}

	public function view_shippers()
	{
		$value['results'] = $this->MShipper->get_all();
		$data['title'] = "Shipper";
		$data['container'] = $this->load->view('shippers/view_shippers', $value, true);
		$this->load->view('master', $data);
	}

	public function edit_shipper($id)
	{
		$value['result'] = $this->MShipper->get_record($id);
		$data['title'] = "Shipper";
		$data['container'] = $this->load->view('shippers/edit_shippers', $value, true);
		$this->load->view('master', $data);
	}

	public function update_shipper()
	{
		$id = $this->input->post('id', true);
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('postal_zip', 'Postal Zip', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');

		if ($this->form_validation->run()) {
			$this->MShipper->update_record();
			$this->session->set_flashdata('message', 'Record Updated Successfully');
			redirect('shipper/view_shippers');
		} else {
			$this->edit_shipper($id);
		}
	}

	public function delete_shipper($id)
	{
		
	    $message=$this->MShipper->delete_record($id);
	    $this->session->set_flashdata('message', $message);
		redirect('shipper/view_shippers');
	}

	public function get_records_by_shipper_id()
	{
		$company = $this->MAdmin->get_settings_record();
		$shipper_id = $this->input->post('shipper_id', true);
		$shipper = $this->MShipper->get_record($shipper_id);
		$data = array();
		if ($shipper) {
			$miles = $this->distance((float)$company->latitude, (float)$company->longtitude, (float)$shipper->latitude, (float)$shipper->longtitude);
			$data['address'] = $shipper->address;
			$data['city'] = $shipper->city;
			$data['state'] = $shipper->state;
			$data['zip_code'] = $shipper->postal_zip;
			$data['latitude'] = $shipper->latitude;
			$data['longtitude'] = $shipper->longtitude;
			$data['mile'] = number_format($miles, 2);
		} else {
			$data['address'] = '';
			$data['city'] = '';
			$data['state'] = '';
			$data['zip_code'] = '';
			$data['latitude'] = '';
			$data['longtitude'] = '';
			$data['mile'] = '';
		}
		echo json_encode($data);
	}

	public function distance($lat1, $lon1, $lat2, $lon2)
	{
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;

		return ($miles * 1.609344);
	}
}
