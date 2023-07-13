<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MLoad extends CI_Model
{
    public function get_last_row()
    {
        return $this->db->select('load_id')->order_by('id', "desc")->limit(1)->get('tbl_load_entry')->row();
    }

    public function store_record()
    {
        $data = array(
            'load_id' => $this->input->post('load_id', true),
            'customer_id' => $this->input->post('customer_id', true),
            'load_type' => $this->input->post('load_type', true),
            'date' => $this->input->post('date', true),
            'customer_load' => $this->input->post('customer_load', true),
            'pick_up_date' => $this->input->post('pick_up_date', true),
            'delivery_date' => $this->input->post('delivery_date', true),
            'dispatch_id' => $this->input->post('dispatch_id', true),
            'line_haul_rate' => $this->input->post('line_haul_rate', true),
            'unloading' => $this->input->post('unloading', true),
            'reimburse' => $this->input->post('reimburse', true),
            'detention' => $this->input->post('detention', true),
            'layover' => $this->input->post('layover', true),
            'other_charge' => $this->input->post('other_charges', true),
            'total_rate' => $this->input->post('total_rate', true),
            'driver_id' => $this->input->post('driver_id', true),
            'truck' => $this->input->post('truck', true),
            'shipper_id' => $this->input->post('shipper_id', true),
            'weight' => $this->input->post('weight', true),
            'qty' => $this->input->post('qty', true),
            'shipper_contact' => $this->input->post('shipper_contact', true),
            'note' => $this->input->post('note', true),
            'consignee_id' => $this->input->post('consignee_id', true),
            'consignee_contact' => $this->input->post('con_contact', true),
            'con_note' => $this->input->post('con_note', true),
            'empty_m' => $this->input->post('empty_m', true),
            'loaded_m' => $this->input->post('loaded_m', true),
            'per_mile' => $this->input->post('per_mile', true)
        );
        $this->db->insert('tbl_load_entry', $data);
    }

    public function get_all()
    {
        return $this->db->get('tbl_load_entry')->result();
    }

    public function get_record($id)
    {
        return $this->db->where('id', $id)->get('tbl_load_entry')->row();
    }

    public function update_record()
    {
        $data = array(
            'load_id' => $this->input->post('load_id', true),
            'customer_id' => $this->input->post('customer_id', true),
            'load_type' => $this->input->post('load_type', true),
            'date' => $this->input->post('date', true),
            'customer_load' => $this->input->post('customer_load', true),
            'pick_up_date' => $this->input->post('pick_up_date', true),
            'delivery_date' => $this->input->post('delivery_date', true),
            'dispatch_id' => $this->input->post('dispatch_id', true),
            'line_haul_rate' => $this->input->post('line_haul_rate', true),
            'unloading' => $this->input->post('unloading', true),
            'reimburse' => $this->input->post('reimburse', true),
            'detention' => $this->input->post('detention', true),
            'layover' => $this->input->post('layover', true),
            'other_charge' => $this->input->post('other_charges', true),
            'total_rate' => $this->input->post('total_rate', true),
            'driver_id' => $this->input->post('driver_id', true),
            'truck' => $this->input->post('truck', true),
            'shipper_id' => $this->input->post('shipper_id', true),
            'weight' => $this->input->post('weight', true),
            'qty' => $this->input->post('qty', true),
            'shipper_contact' => $this->input->post('shipper_contact', true),
            'note' => $this->input->post('note', true),
            'consignee_id' => $this->input->post('consignee_id', true),
            'consignee_contact' => $this->input->post('con_contact', true),
            'con_note' => $this->input->post('con_note', true),
            'empty_m' => $this->input->post('empty_m', true),
            'loaded_m' => $this->input->post('loaded_m', true),
            'per_mile' => $this->input->post('per_mile', true)
        );
        $this->db->where('id', $this->input->post('id', true));
        $this->db->update('tbl_load_entry', $data);
    }

    public function delete_record($id)
    {
        $this->db->delete('tbl_load_entry', array('id' => $id));
        if ($this->db->affected_rows() > 0) {
            return "Data Deleted Successfully";
        } else {
            return "Data Deletion Failed";
        }
    }

    public function get_previous_load_entry_by_driver($truck)
    {
        $consignee_id = $this->db->select('*')->where('truck', $truck)->order_by('id', "desc")->limit(1)->get('tbl_load_entry')->row();
        if ($consignee_id) {
            return $this->db->where('id', $consignee_id->consignee_id)->get('tbl_consignee')->row();
        } else {
            return false;
        }
    }
}
