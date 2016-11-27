<?php
    session_start();
    class Reserve extends CI_Controller {

            /**
             * Reserve constructor.
             */
            public function __construct() {
                parent::__construct();
                $this->load->helper('form');
                $this->load->model("reserve/m_reserve");
            }

            /**
             *  Default method while requesting this controller
             */
            public function index() {
                $this->load->view("reserve/v_reserve");
                $this->dropdown();
            }

            /**
             * Getting data and passing to the view
             */
            public function dropdown() {
                $data = array();

                $query = $this->m_reserve->display_rooms();
                if ($query)
                {
                    $data['rooms'] = $query;

                }
                $query1 = $this->m_reserve->display_tables();
                if ($query1)
                {
                    $data['tables'] = $query1;

                }
                $this->load->view("reserve/v_reserve", $data);
            }

            /**
             * An attempt to perform a reservation
             */
            public function try_reserve() {

                // TODO: multiple value

                $session_info = $this->session->userdata('logged_in');

                $result = $this->m_reserve->get_employee($session_info['login']);

                $data = array(
                    'id_reserve' => 'NULL', // AUTO-INCREMENT
                    'id_din_table' => $this->input->post('selectedTables'),
                    'date_reserve' => date('Y-m-d', strtotime($this->input->post('reserve_date'))),
                    'id_employee' => $result[0]->id
                );

                $inserting_res = $this->m_reserve->insert_reservation($data);

                if ($inserting_res) {
                    echo "<script type='text/javascript'>
                        alert('Successfully reserved');
                    </script>";
                    $this->dropdown();
                } else {
                    echo "<script type='text/javascript'>
                        alert('Error occured while reserving');
                    </script>";
                    $this->dropdown();
                }
            }
        }
?>