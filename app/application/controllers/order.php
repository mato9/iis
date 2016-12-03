<?php
session_start();
class Order extends CI_Controller {

    /**
     * Order constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model("order/m_order");
        $this->load->model("orders_overview/m_orders_overview");
        $this->load->model("reserve/m_reserve");
    }

    /**
     *  Default method while requesting this controller
     */
    public function index() {
        $this->load->view("order/v_order");
        $this->dropdown();
    }

    /**
     * Getting data and passing to the view
     */
    public function dropdown() {
        $data = array();

        $tablesQuery = $this->m_reserve->display_tables();
        if ($tablesQuery) {
            $data['tables'] = $tablesQuery;
        }

        $menusQuery = $this->m_order->display_menus();
        if ($menusQuery) {
            $data['menus'] = $menusQuery;
        }

        $this->load->view("order/v_order", $data);
    }

    /**
     * An attempt to perform an order
     */
    public function try_order() {

        $session_info = $this->session->userdata('logged_in');
        $result = $this->m_reserve->get_employee($session_info['login']);

        $selected_food_in = explode("/", $this->input->post('selectedMenus'));

        $unique_id = mt_rand(10, 99999999);
        $quant_data = array(
            'id_quantity' => $unique_id,
            'id_food' => $selected_food_in[1],
            'count_ks' => $this->input->post('quantity')
        );

        $this->m_order->insert_quantity($quant_data);

        $food_price = $this->m_order->get_price_by_id($selected_food_in[1]);
        $count = $this->input->post('quantity');

        $data = array(
            'id_order' => 'NULL', // AUTO-INCREMENT
            'id_table' => $this->input->post('selectedTables'),
            'id_count_ks' => $quant_data['id_quantity'],
            'id_employee' => $result[0]->id,
            'price' => $food_price[0]->price * $count
        );


        $inserting_res = $this->m_order->insert_order($data);

        $msg = 'Objednano ' . $quant_data['count_ks'] . ' ' . $selected_food_in[0] .' na castku ' . $data['price'];

        if ($inserting_res) {
            echo "<script type='text/javascript'>
                        alert('$msg');
                    </script>";
            $this->dropdown();
        } else {
            echo "<script type='text/javascript'>
                        alert('Error occured while ordering');
                    </script>";
            $this->dropdown();
        }
    }
    
}
?>