<?php

class C_Reserve extends CI_Controller {

    public function __construct() {
			parent::__construct();
			$this->load->helper('form');
		}
		
		public function form_dropdown() {
            $data = array();
            $this->load->model("reserve/m_reserve");
            $query = $this->m_reserve->display_rooms();
            if ($query)
            {
                $data['rooms'] = $query;

            }
            $this->load->view("reserve/v_reserve", $data);
		}
		
		public function data_submitted() {
			//storing the value send by submit using post method in an array
			$mul_array = $this->input->post('Technical_skills');
			//converting array into a string
			$mul_val_string = serialize($mul_array);
			
			$data = array(
				'dropdown_single' => $this->input->post('Department'),
				'dropdown_multi' => $mul_val_string
			);

			$this->load->model("reserve/m_reserve");
			$this->m_reserve->insert_in_db($data);
			$this->load->model("reserve/m_reserve");

			$result = $this->m_reserve->read_from_db($data);
			$data['result'] = $result[0];
			$this->load->view("reserve/v_reserve", $data);
		}
	}
?>