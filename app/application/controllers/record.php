<?php
    class Record extends CI_Controller {

            /**
             * Inser constructor.
             */
            public function __construct() {
                parent::__construct();
                $this->load->library('form_validation');
                $this->load->model("order/m_record");
            }

            /**
             *  Default method while requesting this controller
             */
            public function index() {
                $data['d_from'] = null;
                $this->load->view("order/v_record", $data);
            }

            public function show_order(){
                $date = $this->input->post('d_from');
               // $employ = $this->uri->segment(4);
                $data['d_from'] = $this->m_record->display_order($date);
                foreach($data['d_from'] as $empl){
                    $employ = $empl ->id_employee;
                }
                $data['login'] = $this->m_record->get_employee($employ);
                $this->load->view("order/v_record", $data);
            }

    }

?>