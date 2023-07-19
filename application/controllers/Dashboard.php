<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Dash_model');
        $this->load->model('Utils_model');
    }

    public function Red_List_rec(){
        $data['page_title'] = "Tableau de bord recette";
        $data['list_acte'] = $this->Dash_model->getTarif_acte();
        $this->load->view('_Layout/home/header3.php', $data);
        $this->load->view("dash/dashboard_recette");
        $this->load->view('_Layout/home/footer2.php');
    }

    public function Red_List_dep(){
        $data['page_title'] = "Tableau de bord depense";
        $data['list_depense'] = $this->Dash_model->getTarif_depense();
        $this->load->view('_Layout/home/header3.php', $data);
        $this->load->view("dash/dashboard_depense");
        $this->load->view('_Layout/home/footer2.php');
    }

    public function Red(){
        $data['page_title'] = "Tableau de bord";
        //$data['recette'] = $this->Dash_model->getRecette();
        //$data['depense'] = $this->Dash_model->getDepense();
        $data['date'] = $this->Dash_model->getDateUtil();
        $mois = date('m');
        $annee = date('Y');
        $annee_mois = $annee.'-'.$mois;
        //$sum_recette = $this->Dash_model->sumRecette();
        //$sum_budget_recette = $this->Dash_model->sumBudgetRecette();
        //$sum_depense = $this->Dash_model->sumDepense();
        //$sum_budget_depense = $this->Dash_model->sumBudgetDepense();
        $data['recette'] = $this->Dash_model->FiltreRecette($annee_mois);
        $data['depense'] = $this->Dash_model->FiltreDepense($annee_mois);
        $sum_recette = $this->Dash_model->FiltresumRecette($annee_mois);
        $sum_depense = $this->Dash_model->FiltresumDepense($annee_mois);
        $sum_budget_recette = $this->Dash_model->sumBudgetRecette();
        $sum_budget_depense = $this->Dash_model->sumBudgetDepense();
        foreach($sum_recette as $r){
            $data['sum_r'] = $r['sum'];
        }
        foreach($sum_budget_recette as $br){
            $data['sum_br'] = $br['sum'];
        }
        foreach($sum_depense as $d){
            $data['sum_d'] = $d['sum'];
        }
        foreach($sum_budget_depense as $bd){
            $data['sum_bd'] = $bd['sum'];
        }
        $this->load->view('_Layout/home/header3.php', $data);
        $this->load->view("dash/dashboard");
        $this->load->view('_Layout/home/footer2.php');
    }

    public function Filtrage(){
        $data['date'] = $this->Dash_model->getDateUtil();
        $mois = $this->input->post('mois');
        $annee = $this->input->post('annee');
        $annee_mois = $annee.'-'.$mois;
        $data['annee'] = $annee_mois;
        $data['recette'] = $this->Dash_model->FiltreRecette($annee_mois);
        $data['depense'] = $this->Dash_model->FiltreDepense($annee_mois);
        $sum_recette = $this->Dash_model->FiltresumRecette($annee_mois);
        $sum_depense = $this->Dash_model->FiltresumDepense($annee_mois);
        $sum_budget_recette = $this->Dash_model->sumBudgetRecette();
        $sum_budget_depense = $this->Dash_model->sumBudgetDepense();
        foreach($sum_recette as $r){
            $data['sum_r'] = $r['sum'];
        }
        foreach($sum_budget_recette as $br){
            $data['sum_br'] = $br['sum'];
        }
        foreach($sum_depense as $d){
            $data['sum_d'] = $d['sum'];
        }
        foreach($sum_budget_depense as $bd){
            $data['sum_bd'] = $bd['sum'];
        }
        $this->load->view('_Layout/home/header3.php', $data);
        $this->load->view("dash/dashboard");
        $this->load->view('_Layout/home/footer2.php');
    }

}