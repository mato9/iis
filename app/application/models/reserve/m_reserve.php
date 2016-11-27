<?php
	class M_Reserve extends CI_Model {
        /**
         * Display all rooms
         * @return mixed
         */
		public function display_rooms() {
            $this->db->select('*');
            $this->db->from('room');

            $query = $this->db->get();
            return $query->result();
        }
        
        /**
         * Display all tables
         * @return mixed
         */
        public function display_tables() {
            $this->db->select('*');
            $this->db->from('din_table');

            $query = $this->db->get();
            return $query->result();
        }

        /**
         * Getting all employee info
         * @param $login from session
         * @return mixed
         */
        public function get_employee($login) {
            $condition = "login =" . "'" . $login . "'";
            $this->db->select('*');
            $this->db->from('employee');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();
            
            return $query->result();
        }

        /**
         * Inserting a new reservation
         * @param $data
         * @return bool - query success
         */
		public function insert_reservation($data) {
            
            $this->db->insert('din_tables_reserve', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}
		
	}
?>