<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dash_model extends CI_Model {
    public function getTarif_acte(){
        $query = $this->db->query("SELECT SUM(tarif) as tarif_acte, DATE_TRUNC('month', date_acte)::DATE as mois FROM acte GROUP BY DATE_TRUNC('month', date_acte)::DATE ORDER BY mois");
        return $query->result_array();
    }

    public function getTarif_depense(){
        $query = $this->db->query("SELECT SUM(tarif) as tarif_depense, DATE_TRUNC('month', date_depense)::DATE as mois FROM depense GROUP BY DATE_TRUNC('month', date_depense)::DATE ORDER BY mois");
        return $query->result_array();
    }

    public function getDateUtil(){
        $query = $this->db->query("SELECT EXTRACT(YEAR FROM daty) AS annee FROM v_dash_recette GROUP BY EXTRACT(YEAR FROM daty)");
        return $query->result_array();
    }

    public function getRecette(){
        $query = $this->db->query("SELECT SUM(tarif) AS tarif, id_type_acte, type_acte, budget FROM v_dash_recette GROUP BY id_type_acte, type_acte, budget ");
        return $query->result_array();
    }

    public function getDepense(){
        $query = $this->db->query("SELECT SUM(tarif) AS tarif, type_depense, budget FROM v_dash_depense GROUP BY type_depense, budget");
        return $query->result_array();
    }

    public function sumRecette(){
        $query = $this->db->query("SELECT SUM(tarif) FROM v_dash_recette");
        return $query->result_array();
    }

    public function sumDepense(){
        $query = $this->db->query("SELECT SUM(tarif) FROM v_dash_depense");
        return $query->result_array();
    }

    public function sumBudgetRecette(){
        $query = $this->db->query("SELECT SUM(budget) FROM type_acte");
        return $query->result_array();
    }

    public function sumBudgetDepense(){
        $query = $this->db->query("SELECT SUM(budget) FROM type_depense");
        return $query->result_array();
    }

    public function FiltreRecette($annee_mois){
        $query = $this->db->query("SELECT SUM(tarif) AS tarif, id_type_acte, type_acte, budget FROM v_dash_recette WHERE TO_CHAR(daty, 'YYYY-MM') = '$annee_mois' GROUP BY id_type_acte, type_acte, budget, TO_CHAR(daty, 'YYYY-MM') ");
        return $query->result_array();
    }

    public function NonFiltreRecette($annee_mois){
        $query = $this->db->query("SELECT SUM(tarif) AS tarif, id_type_acte, type_acte, budget FROM v_dash_recette WHERE TO_CHAR(daty, 'YYYY-MM') != '$annee_mois' AND tarif = 0 GROUP BY id_type_acte, type_acte, budget, TO_CHAR(daty, 'YYYY-MM') ");
        return $query->result_array();
    }
    public function FiltreDepense($annee_mois){
        $query = $this->db->query("SELECT SUM(tarif) AS tarif, id_type_depense, type_depense, budget FROM v_dash_depense WHERE TO_CHAR(daty, 'YYYY-MM') = '$annee_mois' GROUP BY id_type_depense, type_depense, budget ");
        return $query->result_array();
    }

    public function FiltresumRecette($annee_mois){
        $query = $this->db->query("SELECT SUM(tarif) FROM v_dash_recette WHERE TO_CHAR(daty, 'YYYY-MM') = '$annee_mois'");
        return $query->result_array();
    }

    public function FiltresumDepense($annee_mois){
        $query = $this->db->query("SELECT SUM(tarif) FROM v_dash_depense WHERE TO_CHAR(daty, 'YYYY-MM') = '$annee_mois'");
        return $query->result_array();
    }

}
