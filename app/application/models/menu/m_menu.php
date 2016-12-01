<?php
	class M_Menu extends CI_Model {

    
        public function display_food() {
            $this->db->select('*');
            $this->db->from('menu');

            $query = $this->db->get();
            return $query->result();
        }

        public function display_food_id($data) {
            $condition = "name = "."'".$data."'";
            $this->db->select('*');
            $this->db->from('menu');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->result();
        }



        public function insert_food($data) {

            $condition = "name =" . "'" . $data['name'] . "'";

            $this->db->select('*');
            $this->db->from('menu');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();

            if ($query->num_rows() == 0) {
                $this->db->insert('menu', $data);
                if ($this->db->affected_rows() > 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
		}

        public function update_menu($id, $data){
            $this->db->where('name', $id);
            $this->db->update('menu', $data);
            return true;
        }

        public function delete_menu($id){
            $this->db->where('name', $id);
            $this->db->delete('menu');
            return true;
        }

}