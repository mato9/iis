<?php
	class M_order extends CI_Model {

    
        public function display_order() {
            $this->db->select('*');
            $this->db->from('menu_orders');

            $query = $this->db->get();

            return $query->result();
        }

        public function display_order_id($data) {
            $condition = "id_table = " . "'" . $data. "'";
            $this->db->select('*');
            $this->db->from('menu_orders');
            $this->db->where($condition);

            $query = $this->db->get();

            return $query->result();
        }

        public function get_employee($id) {
            //echo $id."  ";
            $condition = "id =" . "'" . $id . "'";
            $this->db->select('login');
            $this->db->from('employee');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();
            $login = $query->result();
            foreach($login as $loginn){ foreach($loginn as $log)  return $log;}
        }

        public function get_menu($id) {
            $condition = "id_food =" . "'" . $id . "'";
            $this->db->select('name');
            $this->db->from('menu');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();
            $login = $query->result();
            foreach($login as $loginn){ foreach($loginn as $log)  return $log;}
        }

}