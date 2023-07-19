<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Acte extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Acte_model');
        $this->load->model('Utils_model');
    }

    public function RedList(){
        $data['page_title'] = "Liste Actes";
        $data['liste'] = $this->Acte_model->GetAll();
        $this->load->view('_Layout/home/header3.php', $data);
        $this->load->view("acte/liste_acte");
        $this->load->view('_Layout/home/footer2.php');
    }

    public function Red_Add(){
        $data['page_title'] = "Ajout Acte";
        $this->load->view('_Layout/home/header3.php', $data);
        $this->load->view("acte/ajout_acte");
        $this->load->view('_Layout/home/footer2.php');
    }

    public function Red_Updt(){
        $id = $this->input->get('id');
        $liste = $this->Acte_model->GetWhere($id);
        $data['page_title'] = "Ajout Acte";
        foreach($liste as $l){
            $data['id'] = $l['id_type_acte'];
            $data['nom'] = $l['nom'];
            $data['code'] = $l['code'];
        }
        $this->load->view('_Layout/home/header3.php', $data);
        $this->load->view("acte/updt_acte");
        $this->load->view('_Layout/home/footer2.php');
    }

    public function Add(){
        $nom = $this->input->post('nom');
        $code = $this->input->post('code');
        $budget = $this->input->post('budget');
        $insert = $this->Acte_model->Save($nom, $code, $budget);
        $liste = $this->Acte_model->LastType();
        foreach($liste as $l){
            $id = $l['id_type_acte'];
        }
        $insertzero = $this->Acte_model->SaveZeroActePatient($id);
        if($insert == true && $insertzero == true){
            $this->session->set_flashdata('success_flashData', 'Acte Ajouter avec succes');
            Redirect('Acte/Red_Add');
        }else{
            $this->session->set_flashdata('error_flashData', 'Une Erreur est survenue !');
            redirect('Acte/Red_Add');
        }
    }

    public function Update(){
        $id = $this->input->post('id');
        $nom = $this->input->post('nom');
        $code = $this->input->post('code');
        $budget = $this->input->post('budget');
        $u = $this->Acte_model->Update($id ,$nom, $code, $budget);
            if($u == true){
                $this->session->set_flashdata('success_flashData', 'Acte Modifier avec succes');
                Redirect('Acte/RedList');
            }else{
                $this->session->set_flashdata('error_flashData', 'Une Erreur est survenue !');
                redirect('Acte/RedList');
            }
    }
    public function Saisie(){
        $this->load->model('Patient_model');
        $id = $this->input->post('id');
        $date = $this->input->post('date');
        $opt = $this->input->post('options');
        $i = $this->Acte_model->Insert_Acte($id, $date);
        $iii = $this->Patient_model->Update_etat1($id);
        if($i == true && $iii == true){
            $liste = $this->Acte_model->Getlast();
            foreach($liste as $l){
                $id_act = $l['id_acte'];
            }
            if(!empty($opt)){
                foreach($opt as $o){
                    $data = array(
                        'id_acte' => $id_act,
                        'id_type_acte' => $o,
                    );
                    $ii = $this->Acte_model->Insert_all($data);
                }
            }
            if($ii == true){
                $this->session->set_flashdata('success_flashData', 'Acte du patient ajouter avec succes');
                Redirect('Patient/RedList');
            }else{
                $this->session->set_flashdata('error_flashData', 'Une Erreur est survenue !');
                redirect('Patient/RedList');
            }
        }else{
            $this->session->set_flashdata('error_flashData', 'Une Erreur est survenue !');
            redirect('Patient/RedList');
        }
    }

    public function Facturation(){
        $data['page_title'] = "Add to facture";
        $id_acte = $this->input->get('id_acte');
        $id_type_acte = $this->input->get('id_type_acte');
        $data['act'] = $this->Acte_model->GetName($id_acte);
        $acte_patient = $this->Acte_model->GetActePatient_One($id_acte, $id_type_acte);
        foreach($acte_patient as $a){
            $data['acte'] = $a['nom'];
            $data['id_type_acte'] = $id_type_acte;
            $data['id_patient'] = $a['id_patient'];
            $data['id_acte'] = $a['id_acte'];
        }
        $this->load->view('_Layout/home/header4.php', $data);
        $this->load->view("user/patient/add_to_facture");
        $this->load->view('_Layout/home/footer2.php');
    }

    public function AddToFact(){
        $id_acte = $this->input->post('id_acte');
        $id_type_acte = $this->input->post('id_type_acte');
        $id_patient = $this->input->post('id_patient');
        $prix = $this->input->post('tarif');
        $u = $this->Acte_model->Update_acte_patient($id_acte, $id_type_acte, $prix);
        if($u == true){
            $this->session->set_flashdata('success_flashData', ' Prix Acte du patient ajouter avec succes');
            Redirect('Patient/For_Facturation?id_patient='.$id_patient.'&&id_acte='.$id_acte);
        }else{
            $this->session->set_flashdata('error_flashData', 'Une Erreur est survenue !');
            redirect('Patient/For_Facturation?id_patient='.$id_patient.'&&id_acte'.$id_acte);
        }
    }
}