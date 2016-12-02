<?php
    class Order extends CI_Controller {

            /**
             * Inser constructor.
             */
            public function __construct() {
                parent::__construct();
                $this->load->library('form_validation');
                $this->load->model("order/m_order");
            }

            /**
             *  Default method while requesting this controller
             */
            public function index() {
                $this->show_order();
            }

            public function show_order(){
                $id = $this->uri->segment(3);
                $employ = $this->uri->segment(4);
                $menu = $this->uri->segment(5);
                $data['tables'] = $this->m_order->display_order();
                
                $data['single_table'] = $this->m_order->display_order_id($id);
                $data['login'] = $this->m_order->get_employee($employ);
                $data['menu'] = $this->m_order->get_menu($menu);

                $this->load->view("order/v_order", $data);
            }

    }

?>