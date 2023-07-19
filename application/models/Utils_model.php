<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Utils_model extends CI_Model {
    public function GetSexe(){
        $query = $this->db->query("SELECT * FROM sexe");
        return $query->result_array();
    }

    public function GetType_depense(){
        $query = $this->db->query("SELECT * FROM type_depense");
        return $query->result_array();
    }
}