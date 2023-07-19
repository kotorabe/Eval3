<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_model extends CI_Model {
    public function GetAll(){
        $query = $this->db->query("SELECT * FROM patient WHERE etat = 0 ORDER BY id_patient ASC OFFSET 1");
        return $query->result_array();
    }

    public function GetForFact(){
        $query = $this->db->query("SELECT * FROM v_acte_list WHERE etat = 1 AND id_acte != 'act_1'");
        return $query->result_array();
    }

    public function GetForFacturer(){
        $query = $this->db->query("SELECT * FROM v_acte_list WHERE etat = 0");
        return $query->result_array();
    }

    public function GetWhere($id){
        $query = $this->db->query("SELECT * FROM patient WHERE id_patient = '$id'");
        return $query->result_array();
    }

    public function Save($nom, $prenom, $date_naissance, $sexe, $remboursement){
        $query = $this->db->query("INSERT INTO patient(nom, prenom, date_naissance, id_sexe, remboursement) VALUES('$nom', '$prenom', '$date_naissance', '$sexe', '$remboursement')");
        return $query;
    }

    public function Update($id ,$nom, $prenom, $date_naissance, $sexe, $remboursement){
        $query = $this->db->query("UPDATE patient SET nom = '$nom', prenom = '$prenom', date_naissance = '$date_naissance', id_sexe = '$sexe', remboursement = '$remboursement' WHERE id_patient = '$id'");
        return $query;
    }

    public function UpdateActe($id_acte, $tarif){
        $query = $this->db->query("UPDATE acte SET etat = 0, tarif = '$tarif' WHERE id_acte = '$id_acte'");
        return $query;
    }

    public function Update_Etat_Patient($id_patient){
        $query = $this->db->query("UPDATE patient SET etat = 0 WHERE id_patient = '$id_patient'");
        return $query;
    }

    public function Update_etat1($id_patient){
        $query = $this->db->query("UPDATE patient SET etat = 1 WHERE id_patient = '$id_patient'");
        return $query;
    }
}

?>