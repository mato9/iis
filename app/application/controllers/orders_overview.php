<?php
    class Orders_overview extends CI_Controller {

            /**
             * Constructor.
             */
            public function __construct() {
                parent::__construct();
                $this->load->helper('form');
                $this->load->library('form_validation');
                $this->load->model("orders_overview/m_orders_overview");
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
                $data['tables'] = $this->m_orders_overview->display_order();
                $data['single_table'] = $this->m_orders_overview->display_order_id($id);
                $data['login'] = $this->m_orders_overview->get_employee($employ);
                $date['price'] = $this->m_orders_overview->get_price($id);
                $data['menu'] = $this->m_orders_overview->get_menu($menu);

                $this->load->view("orders_overview/v_orders_overview", $data);
            }

            /**
             * Close an order
             */
            public function close_an_order() {
                $menu_order_id = $this->uri->segment(3);
                // Getting all details of order before closing it
                $order['details'] = $this->m_orders_overview->get_details($menu_order_id);
                $order['login'] = $this->m_orders_overview->get_employee($order['details'][0]->id_employee);
                $order['show_close'] = true;
                $order['price'] = $order['details'][0]->price;

                $this->load->view("orders_overview/v_orders_overview_close_to_print", $order);
            }

            public function close_all_orders() {
                $table_id = $this->uri->segment(3);
                // Getting all details of orders before closing it
                $order['details'] = $this->m_orders_overview->get_details_by_id($table_id);
                $order['login'] = $this->m_orders_overview->get_employee($order['details'][0]->id_employee);
                $order['show_close'] = false;

                $price = $this->m_orders_overview->get_price_by_id($order['details'][0]->id_table);
                $order['overall_price'] = $price[0]->price_overall;

                $this->load->view("orders_overview/v_orders_overview_close_to_print", $order);
            }
        
            /**
             * FINAL closing of the order
             */
            public function set_order_to_closed() {
                $id_order = $this->uri->segment(3);
                $this->create_order_record($id_order);
                $this->m_orders_overview->close_order($id_order);
                $this->show_order();
            }

            /**
             * FINAL closing of all orders
             */
            public function set_all_orders_to_closed() {
                $segments = $this->uri->segment_array();
                $table_id = $segments[3];

                // deleting all unnecessary segments (url parts and $table_id)
                unset($segments[0], $segments[1], $segments[2], $segments[3]);

                foreach ($segments as $id_order) {
                    $this->create_order_record($id_order);
                    $this->m_orders_overview->close_order($id_order);
                }

                $this->m_orders_overview->close_all_orders($table_id);
                $this->show_order();
            }

            /**
             * Creating order record in database
             * @param $id_order
             */
            private function create_order_record($id_order) {
                $aux['details'] = $this->m_orders_overview->get_details($id_order);

                $record['id_order'] = null; // auto-increment
                $record['id_menu_order'] = $id_order;
                $record['id_table'] = $aux['details'][0]->id_table;
                $record['id_count_ks'] = $aux['details'][0]->id_count_ks;
                $record['date_pay'] = date("Y-m-d");

                $record['id_employee'] = $aux['details'][0]->id_employee;
                $record['pay_method'] = 'hotovost';
                $record['sum_price'] = $aux['details'][0]->price;
                $record['is_closed'] = 0;

                $this->m_orders_overview->insert_new_order_record($record);
            }


    }

?>