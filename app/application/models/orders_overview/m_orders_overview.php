<?php
	class M_orders_overview extends CI_Model {

        /**
         * Display all unclosed orders
         * @return mixed
         */
        public function display_order() {
            $query = $this->db->query('SELECT * FROM (SELECT DISTINCT * FROM `menu_orders` 
                                       WHERE `is_closed` = 0) t1 
                                       JOIN (SELECT * FROM din_table) t2 
                                       ON t1.id_table = t2.id_table;');
            return $query->result();
        }

        public function display_order_id($data) {
            $condition = "id_table = " . "'" . $data. "'" . "AND is_closed = 0";
            $this->db->select('*');
            $this->db->from('menu_orders');
            $this->db->where($condition);

            $query = $this->db->get();

            return $query->result();
        }

        /**
         * Get all details of menu order record
         * @param $id
         * @return mixed
         */
        public function get_details($id) {
            $condition = "id_order =" . "'" . $id . "'" . "AND is_closed = 0";
            $this->db->select('*');
            $this->db->from('menu_orders');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->result();
        }

        /**
         * Get all details of all menu order records
         * @param $id
         * @return mixed
         */
        public function get_details_by_id($id) {
            $condition = "id_table =" . "'" . $id . "'" . "AND is_closed = 0";
            $this->db->select('*');
            $this->db->from('menu_orders');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->result();
        }

        /**
         * Close order by changing its parameter is_closed
         * @param $id
         */
        public function close_order($id) {
            $this->db->set('is_closed', 1);
            $this->db->where('id_order', $id);
            $this->db->update('menu_orders');
        }

        /**
         * Close orders of specified room table
         * @param $table_id
         */
        public function close_all_orders($table_id) {
            $this->db->set('is_closed', 1);
            $this->db->where('id_table', $table_id);
            $this->db->update('order_record');
        }

        /**
         * Inserting a new order record
         * @param $data
         */
        public function insert_new_order_record($data) {
            $this->db->insert('order_record', $data);
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

        public function get_price($id) {
            $condition = "id_menu_order =" . "'" . $id . "'";
            $this->db->select('sum_price');
            $this->db->from('order_record');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();
            $login = $query->result();
            foreach($login as $loginn){ foreach($loginn as $log)  return $log;}
        }

        /**
         * Returns overall price by table id
         * @param $table_id
         */
        public function get_price_by_id($table_id) {
            $query = $this->db->query('SELECT SUM(price) AS price_overall 
                                       FROM (SELECT * FROM `menu_orders`
                                       WHERE `id_table` ='. $table_id. ') 
                                       AS subquery;');
            return $query->result();
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