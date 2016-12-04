<?php
	class M_Reserve extends CI_Model {
        /**
         * Display all rooms
         * @return mixed
         */
		public function display_rooms() {
            $query = $this->db->query('SELECT * FROM room WHERE id_room NOT IN (SELECT id_room FROM `rooms_reserve` WHERE DATE(date_reserve) = CURDATE());');
            return $query->result();
        }
        
        /**
         * Display all tables
         * @return mixed
         */
        public function display_tables() {
            $query = $this->db->query('SELECT * FROM din_table WHERE id_table NOT IN (SELECT id_din_table FROM `din_tables_reserve` WHERE DATE(date_reserve) = CURDATE());');
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
         * Inserting a new reservation of a table
         * @param $data
         * @return bool - query success
         */
		public function insert_table_reservation($data) {
            
            $this->db->insert('din_tables_reserve', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}

        /**
         * Inserting a new reservation of a whole room
         * @param $data
         * @return bool - query success
         */
        public function insert_room_reservation($data) {

            $this->db->insert('rooms_reserve', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
		
	}
?>