<?php
	class M_Reserve extends CI_Model {
		public function form_dropdown() {
			$this->load->view("reserve/v_reserve");
		}

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
		
		public function insert_in_db($data) {
			$this->db->insert('dropdown_value', $data);
			if ($this->db->affected_rows() > 1) {
				return true;
			} else {
				return false;
			}
		}
		
		public function read_from_db($data) {
			$condition = "dropdown_single =" . "'" . $data['dropdown_single'] . "' AND " . "dropdown_multi =" . "'" . $data['dropdown_multi'] . "'";
			
			$this->db->select('*');
			$this->db->from('dropdown_value');
			$this->db->where($condition);
			$query = $this->db->get();
			$data = $query->result();
			return $data;
		}
	}
?>