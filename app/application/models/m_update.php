<?php
    class M_update extends CI_Model{
        // Function To Fetch All Students Record
        function show_employee(){
            $query = $this->db->get('employee');
            $query_result = $query->result();
            return $query_result;
        }
        // Function To Fetch Selected Student Record
        function show_employee_id($data){
            $condition = "login = " . "'" . $data . "'";
            $this->db->select('*');
            $this->db->from('employee');
            $this->db->where($condition);
            $query = $this->db->get();
            $result = $query->result();
            return $result;
        }
        // Update Query For Selected Student
        function update_employee_id1($id,$data){
            $this->db->where('login', $id);
            $this->db->update('employee', $data);
        }

        function delete_employee($id){
            $this->db->where('login', $id);
            $this->db->delete('employee');
        }
    }
?>