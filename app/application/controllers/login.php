<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    session_start();

    /**
     * Class Login
     */
    class Login extends CI_Controller {

        public function __construct() {
            parent::__construct();

            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->load->model('m_login');
        }

        public function index() {
            $this->load->view('v_login_form');
        }

        public function user_registration_show() {
            $this->load->view('v_registration_form');
        }

        public function new_user_registration() {

            // Check validation for user input in SignUp form
            $this->form_validation->set_rules('login', 'Login', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
            $this->form_validation->set_rules('birthdate','Birthday','required|date_valid');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('v_registration_form');
                echo "<script type='text/javascript'>
                    alert('Please enter correct values (date in dd/mm/yyyy format)');
                </script>";
            } else {
                $data = array(
                    'login' => $this->input->post('login'),
                    'password' => $this->input->post('password'),
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'email' => $this->input->post('email'),
                    'birthdate' => date('Y-m-d', strtotime($this->input->post('birthdate'))),
                    'contract_from_date' => $this->input->post('contract_from_date'),
                    'contract_to_date' => $this->input->post('contract_to_date'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone')
                );
                $result = $this->m_login->registration_insert($data);
                if ($result == TRUE) {
                    $data['message_display'] = 'Registration Successfully !';
                    $this->load->view('v_login_form', $data);
                } else {
                    $data['message_display'] = 'Username already exist!';
                    $this->load->view('v_registration_form', $data);
                }
            }
        }

        public function user_login_process() {

            $this->form_validation->set_rules('login', 'Login', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                if(isset($this->session->userdata['logged_in'])){
                    $this->load->view('v_admin_page');
                }else{
                    $this->load->view('v_login_form');
                }
            } else {
                $data = array(
                    'login' => $this->input->post('login'),
                    'password' => $this->input->post('password')
                );
                $result = $this->m_login->login($data);
                if ($result == TRUE) {

                    $username = $this->input->post('login');
                    $result = $this->m_login->read_user_information($username);
                    if ($result != false) {
                        $session_data = array(
                            'login' => $result[0]->login,
                            'email' => $result[0]->email,
                        );
                        // Add user data in session
                        $this->session->set_userdata('logged_in', $session_data);
                        $this->load->view('v_admin_page');
                    }
                } else {
                    $data = array(
                        'error_message' => 'Invalid Username or Password'
                    );
                    $this->load->view('v_login_form', $data);
                }
            }
        }

        public function logout() {

            $sess_array = array(
                'login' => ''
            );
            $this->session->unset_userdata('logged_in', $sess_array);
            $data['message_display'] = 'Successfully Logout';
            $this->load->view('v_login_form', $data);
        }

        function callback_date_valid($date){
            $day = (int) substr($date, 0, 2);
            $month = (int) substr($date, 3, 2);
            $year = (int) substr($date, 6, 4);
            return checkdate($month, $day, $year);
        }

    }

?>