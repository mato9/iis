<?php
    class Menu extends CI_Controller {

            /**
             * Constructor.
             */
            public function __construct() {
                parent::__construct();
                $this->load->library('form_validation');
                $this->load->model("menu/m_menu");
            }

            /**
             *  Default method while requesting this controller
             */
            public function index() {
                $this->show_food();
            }

            function show_food() {
            $id = $this->uri->segment(3);

            $data['foods'] = $this->m_menu->display_food();
            $data['single_food'] = $this->m_menu->display_food_id($id);

            $this->load->view('menu/v_menu', $data);
            }

            public function new_menu()
            {
                $this->form_validation->set_rules('name', 'Food', 'trim|required|xss_clean');
                $this->form_validation->set_rules('price', 'Price', 'trim|required|xss_clean');
                $this->form_validation->set_rules('ingredience', 'Ingredience', 'trim|required|xss_clean');
                $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|xss_clean');
                $data = array(
                    'id_food' => 'NULL', // AUTO-INCREMENT
                    'name' => $this->input->post('name'),
                    'price' => $this->input->post('price'),
                    'quantity' => $this->input->post('quantity'),
                    'ingredience' => $this->input->post('ingredience')
                );
                
                $inserting_food = $this->m_menu->insert_food($data);
               
                if ($inserting_food == TRUE) {
                    $data['message_display'] = 'Adding food successful !';
                    $this->load->view('v_admin_page', $data);
                } else {
                    $data['message_display'] = 'Error, food already exist!';
                    echo "<script type='text/javascript'>
                        alert('Error, food already exist!');
                        </script>";
                    $this->show_food();
                }
            }

            function update_menu_name() {
                $id = $this->input->post('food_name');
                $this->input->post('delete');
                if($this->input->post('update')){
                    $data = array(
                        'name' => $this->input->post('food_name'),
                        'price' => $this->input->post('food_price'),
                        'quantity' => $this->input->post('food_quantity'),
                        'ingredience' => $this->input->post('food_ingredience')
                    );
                    $result = $this->m_menu->update_menu($id,$data);
                    if($result)
                    {
                        $data['message_display'] = 'Update Successfully !';
                    }
                    else {
                        $data['message_display'] = 'Update Error !';
                        echo "<script type='text/javascript'>
                        alert('Update error');
                        </script>";
                    }
                    $this->show_food();
                }
                else{
                    $result = $this->m_menu->delete_menu($id);
                    $data['message_display'] = 'Delete Successfully !';
                    echo "<script type='text/javascript'>
                        alert('Delete Successfully !');
                        </script>";
                    $this->show_food();
                }
            }

    }
?>