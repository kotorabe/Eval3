<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Depense_model extends CI_Model {
    public function GetAll(){
        $query = $this->db->query("SELECT * FROM type_depense");
        return $query->result_array();
    }

    public function GetWhere($id){
        $query = $this->db->query("SELECT * FROM type_depense WHERE id_type_depense = '$id'");
        return $query->result_array();
    }

    public function GetWhereCode($code){
        $query = $this->db->query("SELECT * FROM type_depense WHERE code = '$code'");
        return $query->result_array();
    }

    public function GetLast(){
        $query = $this->db->query("SELECT * FROM type_depense ORDER BY id_type_depense DESC LIMIT 1");
        return $query->result_array();
    }

    public function InsertZero($id_type_depense){
        $query = $this->db->query("INSERT INTO depense(id_type_depense, detail, tarif) VALUES('$id_type_depense', 'mlay', '0')");
        return $query;
    }

    public function GetLastDepense(){
        $query = $this->db->query("SELECT * FROM type_depense ORDER BY id_type_depense DESC LIMIT 1");
        return $query->result_array();
    }

    public function Save($nom, $code, $budget ){
        $query = $this->db->query("INSERT INTO type_depense(nom, code, budget) VALUES('$nom', '$code', '$budget')");
        return $query;
    }

    public function Update($id ,$nom, $code, $budget){
        $query = $this->db->query("UPDATE type_depense SET nom = '$nom', code = '$code', budget = '$budget' WHERE id_type_depense = '$id'");
        return $query;
    }

    public function Save_Saisie($id, $date, $detail, $tarif){
        $query = $this->db->query("INSERT INTO depense(id_type_depense, date_depense, detail, tarif) VALUES('$id', '$date', '$detail', '$tarif')");
        return $query;
    }

    public function Save2($nom, $code){
        $query = $this->db->query("INSERT INTO type_depense(nom, code) VALUES('$nom', '$code')");
        return $query;
    }

    public function SavebudgetDepense($id_type_depense, $budget, $annee){
        $query = $this->db->query("INSERT INTO budget_depense(id_type_depense, budget, annee) VALUES('$id_type_depense', '$budget', '$annee-12-31')");
        return $query;
    }

    public function GetHistorique($id){
        $query = $this->db->query("SELECT * FROM depense WHERE id_type_depense = '$id' AND tarif != 0");
        return $query->result_array();
    }
}