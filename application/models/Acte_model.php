<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Acte_model extends CI_Model {
    public function GetAll(){
        $query = $this->db->query("SELECT * FROM type_acte");
        return $query->result_array();
    }

    public function GetWhere($id){
        $query = $this->db->query("SELECT * FROM type_acte WHERE id_type_acte = '$id'");
        return $query->result_array();
    }

    public function LastType(){
        $query = $this->db->query("SELECT * FROM type_acte ORDER BY id_type_acte DESC LIMIT 1");
        return $query->result_array();
    }

    public function SaveZeroActePatient($id_type_acte){
        $query = $this->db->query("INSERT INTO acte_patient(id_acte, id_type_acte, tarif) VALUES('act_1', '$id_type_acte', 0)");
        return $query;
    }

    public function Save($nom, $code, $budget ){
        $query = $this->db->query("INSERT INTO type_acte(nom, code, budget) VALUES('$nom', '$code', '$budget')");
        return $query;
    }

    public function Update($id ,$nom, $code, $budget){ 
        $query = $this->db->query("UPDATE type_acte SET nom = '$nom', code = '$code', budget = '$budget' WHERE id_type_acte = '$id'");
        return $query;
    }

    public function Insert_all($data){
        $query = $this->db->insert('acte_patient', $data);
        return $query;
    }

    public function Insert_acte($id_patient,$date){
        $query = $this->db->query("INSERT INTO acte(id_patient, date_acte, tarif) VALUES('$id_patient', '$date', 0) ");
        return $query;
    }
    

    public function Getlast(){
        $query = $this->db->query("SELECT * FROM acte ORDER BY id_acte DESC LIMIT 1");
        return $query->result_array();
    }

    public function GetName($id){
        $query = $this->db->query("SELECT * FROM v_acte_list WHERE id_acte= '$id'");
        return $query->result_array();
    }

    public function GetInFact($id_acte){
        $query = $this->db->query("SELECT * FROM v_acte_list_fact WHERE id_acte = '$id_acte'");
        return $query->result_array();
    }

    public function GetSumInFact($id_acte){
        $query = $this->db->query("SELECT SUM(tarif) FROM v_acte_list_fact WHERE id_acte = '$id_acte'");
        return $query->result_array();
    }

    public function GetActePatient_One($id_acte, $id_type_acte){
        $query = $this->db->query("SELECT * FROM v_acte_list_fact WHERE id_acte = '$id_acte' AND id_type_acte = '$id_type_acte' AND etat = 1");
        return $query->result_array();
    }

    public function Update_acte_patient($id_acte, $id_type_acte, $prix){
        $query = $this->db->query("UPDATE acte_patient SET tarif = '$prix' WHERE id_acte = '$id_acte' AND id_type_acte = '$id_type_acte'");
        return $query;
    }
}