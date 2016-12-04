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
                if ($query) {
                    $data['rooms'] = $query;
                }
                $another_query = $this->m_reserve->display_tables();
                if ($another_query) {
                    $data['tables'] = $another_query;
                }
                $this->load->view("reserve/v_reserve", $data);
            }

            /**
             * An attempt to perform a reservation
             */
            public function try_reserve() {

                $session_info = $this->session->userdata('logged_in');
                $result = $this->m_reserve->get_employee($session_info['login']);

                $data = array(
                    'id_reserve' => 'NULL', // AUTO-INCREMENT
                    'id_din_table' => $this->input->post('selectedTables'),
                    'date_reserve' => date('Y-m-d', strtotime($this->input->post('reserve_date'))),
                    'id_employee' => $result[0]->id
                );

                $inserting_res = '';
                // reserving whole room
                if ($this->input->post('reserve') == 'Rezervovat celou místnost') {
                    $selected_room_id = explode("/", $this->input->post('selectedRoom'));
                    $info = array(
                        'id_reserve' => 'NULL', // AUTO-INCREMENT
                        'id_room' => $selected_room_id[1],
                        'date_reserve' => date('Y-m-d', strtotime($this->input->post('reserve_date'))),
                        'id_employee' => $result[0]->id
                    );
                    $inserting_res = $this->m_reserve->insert_room_reservation($info);
                    $this->dropdown();
                // reserving only a table
                } else {
                    $inserting_res = $this->m_reserve->insert_table_reservation($data);
                    $this->dropdown();

                }
                
                if ($inserting_res) {
                    echo "<script type='text/javascript'>
                        alert('Úspěšne jste to zarezervoval.');
                    </script>";
                    $this->dropdown();
                } else {
                    echo "<script type='text/javascript'>
                        alert('Bohužel v systému se vyskytla chýba.');
                    </script>";
                    $this->dropdown();
                }
            }
        }
?>