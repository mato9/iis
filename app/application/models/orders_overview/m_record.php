<?php
    class M_record extends CI_Model{

        public function display_order($data) {
            $condition = "date_pay >= " . "'" . $data . "'";
            $this->db->select('*');
            $this->db->from('order_record');
            $this->db->where($condition);

            $query = $this->db->get();
            return $query->result();
        }

        public function get_employee($id) {
            $condition = "id =" . "'" . $id . "'";
            $this->db->select('login');
            $this->db->from('employee');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();
            $login = $query->result();
            foreach($login as $loginn){ foreach($loginn as $log)  return $log;}
        }

    }
?>