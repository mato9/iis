<?php
    class Update extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('m_update');
        }

        public function index() {
            $this->show_employee_id();
        }

        function show_employee_id() {
            $id = $this->uri->segment(3);
            $owner = ($this->session->userdata['logged_in']['owner']);
            

            $data['employee'] = $this->m_update->show_employee();
            if($owner == 'owner')
                $data['single_login'] = $this->m_update->show_employee_id($id);
            else {
                $id = ($this->session->userdata['logged_in']['login']);
                $data['single_login'] = $this->m_update->show_employee_id($id);
            }
            $this->load->view('v_update', $data);
        }

        function update_employee_id1() {
            $id = $this->input->post('login');
            if($this->input->post('update')){
                if(($this->session->userdata['logged_in']['login']) == 'owner')
                    $data = array(
                            'firstname' => $this->input->post('firstname'),
                            'lastname' => $this->input->post('lastname'),
                            'email' => $this->input->post('email'),
                            'birthdate' => date('Y-m-d', strtotime($this->input->post('birthdate'))),
                            'contract_from_date' => $this->input->post('contract_from_date'),
                            'contract_to_date' => $this->input->post('contract_to_date'),
                            'address' => $this->input->post('address'),
                            'phone' => $this->input->post('phone')
                    );
                else {
                    $data = array(
                            'firstname' => $this->input->post('firstname'),
                            'lastname' => $this->input->post('lastname'),
                            'email' => $this->input->post('email'),
                            'birthdate' => date('Y-m-d', strtotime($this->input->post('birthdate'))),
                            'address' => $this->input->post('address'),
                            'phone' => $this->input->post('phone')
                    );
                }
                $result = $this->m_update->update_employee_id1($id,$data);
                if($result)
                {
                    $data['message_display'] = 'Update Successfully !';
                }
                else {
                    $data['message_display'] = 'Update error!';
                }
                $this->show_employee_id();
            }
            else{
                $result = $this->m_update->delete_employee($id);
                if($result)
                {
                    $data['message_display'] = 'Delete Successfully !';
                    echo "<script type='text/javascript'>
                    alert('Delete employee successfully');
                    </script>";
                }
                else {
                    $data['message_display'] = 'Delete error!';
                    echo "<script type='text/javascript'>
                    alert('Delete employee error');
                    </script>";
                }
                $this->show_employee_id();
            }
        }
    }
?>
