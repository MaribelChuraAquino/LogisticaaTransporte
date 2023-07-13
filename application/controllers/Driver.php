<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($this->session->id)) {
            redirect('login');
        }
        $this->load->model('MDriver');
        $this->load->model('MEquipment');
        $this->load->model('MAccount');
        $this->load->model('MLoad');
    }

    public function add_driver()
    {
        $last_row = $this->MDriver->get_last_row();
        if ($last_row) {
            $id = (int)$last_row->driver_id;
            $result = $id + 1;
            $driver_id = $result;
        } else {
            $driver_id = 6001;
        }
        $value['holders'] = $this->MAccount->get_all();
        $value['driver_id'] = $driver_id;
        $data['title'] = "Driver";
        $data['container'] = $this->load->view('driver/add_driver', $value, true);
        $this->load->view('master', $data);
    }

    public function store_driver()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('postal_zip', 'Postal Zip', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('telephone', 'Telephone', 'trim|required');
        $this->form_validation->set_rules('dob', 'DOB', 'trim|required');
        $this->form_validation->set_rules('ssn', 'SSN', 'trim|required');
        $this->form_validation->set_rules('license_number', 'License Number', 'trim|required');
        $this->form_validation->set_rules('license_exp', 'License Expiry', 'trim|required');
        $this->form_validation->set_rules('medical_date', 'Medical Date', 'trim|required');
        $this->form_validation->set_rules('medical_exp', 'Medical Expiry', 'trim|required');
        $this->form_validation->set_rules('pay_type', 'Pay Type', 'trim|required');
        $this->form_validation->set_rules('percentage', 'Percentage', 'trim|required');
        $this->form_validation->set_rules('drug_test', 'Drug Test', 'trim|required');
        $this->form_validation->set_rules('insurance', 'License Number', 'trim|required');
        $this->form_validation->set_rules('insurance_truck', 'License Expiry', 'trim|required');
        $this->form_validation->set_rules('ifta_service', 'Medical Date', 'trim|required');
        $this->form_validation->set_rules('account_holder', 'Medical Expiry', 'trim|required');
        $this->form_validation->set_rules('prepass', 'Pay Type', 'trim|required');
        $this->form_validation->set_rules('load_board', 'Percentage', 'trim|required');
        $this->form_validation->set_rules('trailer_rent', 'Drug Test', 'trim|required');

        if ($this->form_validation->run()) {
            $this->MDriver->store_driver();
            $this->session->set_flashdata('message', 'Record Inserted Successfully');
            redirect('driver/add_driver');
        } else {
            $this->add_driver();
        }
    }

    public function update_driver()
    {
        $id = $this->input->post('id', true);
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('postal_zip', 'Postal Zip', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('telephone', 'Telephone', 'trim|required');
        $this->form_validation->set_rules('dob', 'DOB', 'trim|required');
        $this->form_validation->set_rules('ssn', 'SSN', 'trim|required');
        $this->form_validation->set_rules('license_number', 'License Number', 'trim|required');
        $this->form_validation->set_rules('license_exp', 'License Expiry', 'trim|required');
        $this->form_validation->set_rules('medical_date', 'Medical Date', 'trim|required');
        $this->form_validation->set_rules('medical_exp', 'Medical Expiry', 'trim|required');
        $this->form_validation->set_rules('pay_type', 'Pay Type', 'trim|required');
        $this->form_validation->set_rules('percentage', 'Percentage', 'trim|required');
        $this->form_validation->set_rules('drug_test', 'Drug Test', 'trim|required');
        $this->form_validation->set_rules('insurance', 'License Number', 'trim|required');
        $this->form_validation->set_rules('insurance_truck', 'License Expiry', 'trim|required');
        $this->form_validation->set_rules('ifta_service', 'Medical Date', 'trim|required');
        $this->form_validation->set_rules('account_holder', 'Medical Expiry', 'trim|required');
        $this->form_validation->set_rules('prepass', 'Pay Type', 'trim|required');
        $this->form_validation->set_rules('load_board', 'Percentage', 'trim|required');
        $this->form_validation->set_rules('trailer_rent', 'Drug Test', 'trim|required');

        if ($this->form_validation->run()) {
            $this->MDriver->update_driver();
            $this->session->set_flashdata('message', 'Record Updated Successfully');
            redirect('driver/view_driver');
        } else {
            $this->edit_driver($id);
        }
    }

    public function view_driver()
    {
        $value['drivers'] = $this->MDriver->get_all();
        $data['title'] = "Driver";
        $data['container'] = $this->load->view('driver/view_driver', $value, true);
        $this->load->view('master', $data);
    }

    public function edit_driver($id)
    {
        $value['holders'] = $this->MAccount->get_all();
        $value['driver'] = $this->MDriver->get_record($id);
        $data['title'] = "Driver";
        $data['container'] = $this->load->view('driver/edit_driver', $value, true);
        $this->load->view('master', $data);
    }

    public function show_driver($id)
    {
        $value['company'] = $this->MAdmin->get_settings_record();
        $value['driver'] = $this->MDriver->get_record($id);
        $data['title'] = "Driver";
        $data['container'] = $this->load->view('driver/show_driver', $value, true);
        $this->load->view('master', $data);
    }

    public function delete_driver($id)
    {
        $message = $this->MDriver->delete_record($id);
        $this->session->set_flashdata('message', $message);
        redirect('driver/view_driver');
    }

    public function get_records_by_driver_id()
    {
        $driver_id = $this->input->post('driver_id', true);
        $driver = $this->MDriver->get_record($driver_id);
        $data = array();
        if ($driver) {
            $truck_trailer = $this->MEquipment->get_name_record($driver->first_name, $driver->last_name);
            $previous_load_entry = $this->MLoad->get_previous_load_entry_by_driver($truck_trailer->truck);
            if ($truck_trailer) {
                $data['truck'] = $truck_trailer->truck;
                $data['trailer'] = $truck_trailer->trailer;
            } else {
                $data['truck'] = '';
                $data['trailer'] = '';
            }
            if ($previous_load_entry) {
                $data['oldLat'] = $previous_load_entry->latitude;
                $data['oldLong'] = $previous_load_entry->longtitude;
                $data['oldCity'] = $previous_load_entry->city;
            } else {
                $data['oldLat'] = 0;
                $data['oldLong'] = 0;
                $data['oldCity'] = '';
            }
            $data['rate'] = $driver->percentage;
        } else {
            $data['truck'] = '';
            $data['trailer'] = '';
            $data['rate'] = '';
        }
        echo json_encode($data);
    }
}
