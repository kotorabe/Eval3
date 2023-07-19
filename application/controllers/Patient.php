<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Patient_model');
        $this->load->model('Utils_model');
    }

    public function RedList(){
        $data['page_title'] = "Liste Patient";
        $data['liste'] = $this->Patient_model->GetAll();
        if(!empty($_SESSION['ADMIN_ID'])){
            $this->load->view('_Layout/home/header3.php', $data);
            $this->load->view("patient/liste_patient");
            $this->load->view('_Layout/home/footer2.php');
        }else{
            $this->load->view('_Layout/home/header4.php', $data);
            $this->load->view("patient/liste_patient");
            $this->load->view('_Layout/home/footer2.php');
        }
    }

    public function Red_Add(){
        $data['page_title'] = "Ajout Patient";
        $data['sexe'] = $this->Utils_model->GetSexe();
        $this->load->view('_Layout/home/header3.php', $data);
        $this->load->view("patient/ajout_patient");
        $this->load->view('_Layout/home/footer2.php');
    }

    public function Add(){
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $date_naissance = $this->input->post('date_naissance');
        $sexe = $this->input->post('id_sexe');
        $val_r = $this->input->post('remboursement');
        if($val_r == "1"){
            $insert = $this->Patient_model->Save($nom, $prenom, $date_naissance, $sexe, "true");
            if($insert == true){
                $this->session->set_flashdata('success_flashData', 'Patient Ajouter avec succes');
                Redirect('Patient/Red_Add');
            }else{
                $this->session->set_flashdata('error_flashData', 'Une Erreur est survenue !');
                redirect('Patient/Red_Add');
            }
        }else if($val_r == "2"){
            $insert = $this->Patient_model->Save($nom, $prenom, $date_naissance, $sexe, "false");
            if($insert == true){
                $this->session->set_flashdata('success_flashData', 'Patient Ajouter avec succes');
                Redirect('Patient/Red_Add');
            }else{
                $this->session->set_flashdata('error_flashData', 'Une Erreur est survenue !');
                redirect('Patient/Red_Add');
            }
        }else{
            var_dump("Erreur");
        }
    }

    public function Red_Updt(){
        $id = $this->input->get('id');
        $liste = $this->Patient_model->GetWhere($id);
        $data['sexe'] = $this->Utils_model->GetSexe();
        $data['page_title'] = "Ajout Patient";
        foreach($liste as $l){
            $data['id'] = $l['id_patient'];
            $data['nom'] = $l['nom'];
            $data['prenom'] = $l['prenom'];
        }
        $this->load->view('_Layout/home/header3.php', $data);
        $this->load->view("patient/updt_patient");
        $this->load->view('_Layout/home/footer2.php');
    }

    public function Update(){
        $id = $this->input->post('id');
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $date_naissance = $this->input->post('date_naissance');
        $sexe = $this->input->post('id_sexe');
        $remboursement = $this->input->post('remboursement');
        $u = $this->Patient_model->Update($id ,$nom, $prenom, $date_naissance, $sexe, $remboursement);
            if($u == true){
                $this->session->set_flashdata('success_flashData', 'Patient Modifier avec succes');
                Redirect('Patient/RedList');
            }else{
                $this->session->set_flashdata('error_flashData', 'Une Erreur est survenue !');
                redirect('Patient/RedList');
            }
    }

    public function Red_Saisie(){
        $this->load->model('Acte_model');
        $data['page_title'] = "Saisie Acte";
        $id = $this->input->get('id');
        $data['act'] = $this->Acte_model->GetAll();
        $data['id'] = $id;
        $data['liste'] = $this->Patient_model->GetWhere($id);
        $this->load->view('_Layout/home/header4.php', $data);
        $this->load->view("user/saisie_acte");
        $this->load->view('_Layout/home/footer2.php');
    }

    public function RedListFact(){
        $data['page_title'] = "Liste Patient Facturation";
        $data['liste'] = $this->Patient_model->GetForFact();
        $this->load->view('_Layout/home/header4.php', $data);
        $this->load->view("user/patient/liste_pour_facturation");
        $this->load->view('_Layout/home/footer2.php');
    }

    public function RedListFacturer(){
        $data['page_title'] = "Liste Acte Facturer";
        $data['liste'] = $this->Patient_model->GetForFacturer();
        $this->load->view('_Layout/home/header4.php', $data);
        $this->load->view("user/patient/liste_pour_facturer");
        $this->load->view('_Layout/home/footer2.php');
    }

    public function For_Facturation(){
        $this->load->model('Acte_model');
        $data['page_title'] = "Facture";
        $id_patient= $this->input->get('id_patient');
        $id_acte= $this->input->get('id_acte');
        $data['act'] = $this->Acte_model->GetName($id_acte);
        $data['id'] = $id_acte;
        $data['id_patient'] = $id_patient;
        $data['liste'] = $this->Acte_model->GetInFact($id_acte);
        $sum = $this->Acte_model->GetSumInFact($id_acte);
        foreach($sum as $s){
            $data['prix'] = $s['sum'];
            $session_array = array(
                'SUM'  => $s['sum'],
            );
            $this->session->set_userdata($session_array);
        }
        $this->load->view('_Layout/home/header4.php', $data);
        $this->load->view("user/patient/saisie_pour_facture");
        $this->load->view('_Layout/home/footer2.php');
    }

    public function For_Facturer(){
        $this->load->model('Acte_model');
        $data['page_title'] = "Facture";
        $id_patient= $this->input->get('id_patient');
        $id_acte= $this->input->get('id_acte');
        $data['act'] = $this->Acte_model->GetName($id_acte);
        $data['id'] = $id_acte;
        $data['id_patient'] = $id_patient;
        $data['liste'] = $this->Acte_model->GetInFact($id_acte);
        $sum = $this->Acte_model->GetSumInFact($id_acte);
        foreach($sum as $s){
            $data['prix'] = $s['sum'];
        }
        $this->load->view('_Layout/home/header4.php', $data);
        $this->load->view("user/patient/saisie_facturer");
        $this->load->view('_Layout/home/footer2.php');
    }

    public function Facturation(){
        $id_acte = $this->input->get('id_acte');
        $id_patient = $this->input->get('id_patient');
        $tarif = $_SESSION['SUM'];
        $u_patient = $this->Patient_model->Update_Etat_Patient($id_patient);
        $u_acte = $this->Patient_model->UpdateActe($id_acte, $tarif);
        if($u_patient == true && $u_acte == true){
            $remove_sessions = array('SUM');
            $this->session->unset_userdata($remove_sessions);
            $this->session->set_flashdata('success_flashData', 'Facturer avec succes');
            Redirect('Patient/RedListFact');
        }else{
            $this->session->set_flashdata('error_flashData', 'Une Erreur est survenue !');
            redirect('Patient/RedListFact');
        }
    }

    
/*$opt = $this->input->post('options');
        if(!empty($opt)){
            foreach($opt as $o){
                $data = array(
                    'id_spect' => $id_spect,
                    'id_art' => $o,
                );
                $this->Evenement_Model->Insert2($data);
            }
        }*/
    

}