<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->id)) {
			redirect('login');
		}
		$this->load->model('MExpense');
		$this->load->model('MAccount');
	}

	public function add_expense()
	{
		$value['holders'] = $this->MAccount->get_all();
		$data['title'] = "Expense";
		$data['container'] = $this->load->view('expense/add_expense', $value, true);
		$this->load->view('master', $data);
	}

	public function view_expense()
	{
		$value['expenses'] = $this->MExpense->get_all();
		$data['title'] = "Expense";
		$data['container'] = $this->load->view('expense/view_expense', $value, true);
		$this->load->view('master', $data);
	}

	public function store_expense()
	{
		$this->MExpense->store_expense_record();
		$this->session->set_flashdata('message', 'Record Inserted Successfully');
		redirect('expense/add_expense');
	}

	//import from csv
	public function import_csv()
	{
		$config['upload_path'] = './files/';
		$config['allowed_types'] = 'csv';
		$config['overwrite'] = TRUE;
		//$config['max_size'] = '500';
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('csv')) {
			$data = array(
				'upload_data' => $this->upload->data()
			);
			$file = $data['upload_data']['file_name'];
			$fileopen = fopen('files/' . $file, "r");
			if ($fileopen) {
				while (($row = fgetcsv($fileopen, 2075, ",")) !== FALSE) {
					$filearray[] = $row;
				}
				fclose($fileopen);
			}
			array_shift($filearray);

			$fields = array(
				'date',
				'vendor',
				'description',
				'account_holder',
				'amount'
			);

			$final = array();
			foreach ($filearray as $key => $value) {
				if (array_combine($fields, $value)) {
					$expenses[] = array_combine($fields, $value);
				} else {
					$this->session->set_flashdata('message', 'Database field and CSV field are not same');
					redirect('expense/view_expense', 'refresh');
				}

			}


			//date_default_timezone_set($this->setting->timezone);
			$date = date("Y-m-d H:i:s");
			foreach ($expenses as $expense) {
				$data = array(
					'date' => $expense['date'],
					'vendor' => $expense['vendor'],
					'description' => $expense['description'],
					'account_holder' => $expense['account_holder'],
					'amount' => $expense['amount']

				);

				$this->MExpense->store_expense_record_csv($data);
			}
			unlink('./files/' . $file);

			redirect('expense/view_expense');
		}
		redirect('expense/view_expense');
	}

	public function edit_expense($id)
	{
		$value['expense'] = $this->MExpense->get_record($id);
		$value['holders'] = $this->MAccount->get_all();
		$data['title'] = "Expense";
		$data['container'] = $this->load->view('expense/edit_expense', $value, true);
		$this->load->view('master', $data);
	}

	public function update_expense()
	{
		$this->MExpense->update_expense_record();
		$this->session->set_flashdata('message', 'Record Updated Successfully');
		redirect('expense/view_expense');
	}

	public function delete_expense($id)
	{
		$message = $this->MExpense->delete_expense_record($id);
		$this->session->set_flashdata('message', $message);
		redirect('expense/view_expense');
	}
}
