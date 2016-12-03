<?php
class M_Order extends CI_Model {
    /**
     * Display all rooms
     * @return mixed
     */
    public function display_menus() {
        $this->db->select('*');
        $this->db->from('menu');

        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Get food price by its id
     */
    public function get_price_by_id($food_id) {
        $condition = "id_food =" . "'" . $food_id . "'";
        $this->db->select('price');
        $this->db->from('menu');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * Inserting a new order
     * @param $data
     * @return bool - query success
     */
    public function insert_order($data) {

        $this->db->insert('menu_orders', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $data
     * @return bool
     */
    public function insert_quantity($data) {

        $this->db->insert('quantity', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
?>