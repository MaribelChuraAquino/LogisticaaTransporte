<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
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

	public function driver_pay_summary()
	{
		$value['drivers'] = $this->MDriver->get_all();
		$data['title'] = "Report";
		$data['container'] = $this->load->view('report/driver_pay_summary', $value, true);
		$this->load->view('master', $data);
	}

	public function show_driver_pay_summary()
	{
		$is_expense = $this->input->post('is_expense', true);
		if (isset($is_expense)) {
			$expense = 1;
		} else {
			$expense = 0;
		}
		$value['from_date'] = $this->input->post('from_date', true);
		$value['to_date'] = $this->input->post('to_date', true);
		$value['is_expense'] = $expense;
		$results = $this->MDriver->get_driver_pay_summary_report();
		if ($results) {
			$value['results'] = $results;
		} else {
			$value['results'] = '';
		}
		$value['company'] = $this->MAdmin->get_settings_record();
		$data['title'] = "Report";
		$data['container'] = $this->load->view('report/show_driver_pay_summary', $value, true);
		$this->load->view('master', $data);
	}

	public function driver_pay_report()
	{
		$value['drivers'] = $this->MDriver->get_all();
		$data['title'] = "Report";
		$data['container'] = $this->load->view('report/driver_pay_report', $value, true);
		$this->load->view('master', $data);
	}

	public function show_driver_pay_report()
	{
		$results = $this->MDriver->get_driver_pay_summary_report();
		if ($results) {
			$value['results'] = $results;
		} else {
			$value['results'] = '';
		}
		$value['from_date'] = $this->input->post('from_date', true);
		$value['to_date'] = $this->input->post('to_date', true);
		$value['company'] = $this->MAdmin->get_settings_record();
		$data['title'] = "Report";
		$data['container'] = $this->load->view('report/show_driver_pay_report', $value, true);
		$this->load->view('master', $data);
	}

	public function dispatch_pay_summary()
	{
		$value['dispatches'] = $this->MDispatch->get_all();
		$data['title'] = "Report";
		$data['container'] = $this->load->view('report/dispatch_pay_summary', $value, true);
		$this->load->view('master', $data);
	}

	public function show_dispatch_pay_summary()
	{
		$results = $this->MDispatch->get_dispatch_pay_summary_report();
		if ($results) {
			$value['results'] = $results;
			$value['to_date'] = $results[0]->delivery_date;
		} else {
			$value['results'] = '';
			$value['to_date'] = '';
		}
		/*foreach ($results as $value):
			$pick_up_array[] = $value->pick_up_date;
		endforeach;
		usort($pick_up_array, function($a, $b) {
			$dateTimestamp1 = strtotime($a);
			$dateTimestamp2 = strtotime($b);

			return $dateTimestamp1 < $dateTimestamp2 ? -1: 1;
		});
		$from_date = $pick_up_array[0];
		$value['from_date'] = $from_date;*/
		$value['company'] = $this->MAdmin->get_settings_record();
		$data['title'] = "Report";
		$data['container'] = $this->load->view('report/show_dispatch_pay_summary', $value, true);
		$this->load->view('master', $data);
	}

	public function customer_report()
	{
		$value['customers'] = $this->MCustomer->get_all();
		$data['title'] = "Report";
		$data['container'] = $this->load->view('report/customer_pay_report', $value, true);
		$this->load->view('master', $data);
	}

	public function show_customer_pay_summary()
	{
		$results = $this->MCustomer->get_customer_pay_summary_report();
		if ($results) {
			$value['results'] = $results;
		} else {
			$value['results'] = '';
		}
		$value['company'] = $this->MAdmin->get_settings_record();
		$data['title'] = "Report";
		$data['container'] = $this->load->view('report/show_customer_pay_summary', $value, true);
		$this->load->view('master', $data);
	}
}
