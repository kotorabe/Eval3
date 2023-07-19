<?php 

class Admin_Model extends CI_Model {

    protected $User_table_name = "admins";

    public function check_login($pseudo, $password) {
        $query = $this->db->get_where($this->User_table_name, array('pseudo' => $pseudo));
        if ($this->db->affected_rows() > 0) {
            $passwordT = $query->row('password');

            /**
             * Check Password Hash 
             */
            if ($passwordT == $password) {
                return [
                    'status' => TRUE,
                    'data' => $query->row()
                ];
            } else {
                return ['status' => FALSE,'data' => FALSE];
            }
        } else {
            return ['status' => FALSE,'data' => FALSE];
        }
    }


}