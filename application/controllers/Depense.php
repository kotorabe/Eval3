<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Depense extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Depense_model');
        $this->load->model('Utils_model');
    }

    public function Red_Add(){
        $data['page_title'] = "Ajout Depense";
        $this->load->view('_Layout/home/header3.php', $data);
        $this->load->view("depense/ajout_depense");
        $this->load->view('_Layout/home/footer2.php');
    }

    public function Red_List(){
        $data['page_title'] = "Liste Depense";
        $data['liste'] = $this->Depense_model->GetAll();
        if(!empty($_SESSION['ADMIN_ID'])){
            $this->load->view('_Layout/home/header3.php', $data);
            $this->load->view("depense/liste_depense");
            $this->load->view('_Layout/home/footer2.php');
        }else{
            $this->load->view('_Layout/home/header4.php', $data);
            $this->load->view("depense/liste_depense");
            $this->load->view('_Layout/home/footer2.php');
        }
    }

    public function Add(){
        $nom = $this->input->post('nom');
        $code = $this->input->post('code');
        $budget = $this->input->post('budget');
        $insert = $this->Depense_model->Save($nom, $code, $budget);
        $liste = $this->Depense_model->GetLast();
        foreach($liste as $l){
            $id = $l['id_type_depense'];
        }
        $insertzero = $this->Depense_model->InsertZero($id);
        if($insert == true && $insertzero == true){
            $this->session->set_flashdata('success_flashData', 'Depense Ajouter avec succes');
            Redirect('Depense/Red_Add');
        }else{
            $this->session->set_flashdata('error_flashData', 'Une Erreur est survenue !');
            redirect('Depense/Red_Add');
        }
    }

    public function Red_Updt(){
        $id = $this->input->get('id');
        $liste = $this->Depense_model->GetWhere($id);
        $data['page_title'] = "Modif Depense";
        foreach($liste as $l){
            $data['id'] = $l['id_type_depense'];
            $data['nom'] = $l['nom'];
            $data['code'] = $l['code'];
        }
        $this->load->view('_Layout/home/header3.php', $data);
        $this->load->view("depense/updt_depense");
        $this->load->view('_Layout/home/footer2.php');
    }

    public function Update(){
        $id = $this->input->post('id');
        $nom = $this->input->post('nom');
        $code = $this->input->post('code');
        $budget = $this->input->post('budget');
        $u = $this->Depense_model->Update($id ,$nom, $code, $budget);
        if($u == true){
            $this->session->set_flashdata('success_flashData', 'Patient Modifier avec succes');
            Redirect('Depense/Red_List');
        }else{
            $this->session->set_flashdata('error_flashData', 'Une Erreur est survenue !');
            redirect('Depense/Red_List');
        }
    }

    public function Red_Saisie(){
        $data['page_title'] = "Saisie Depense";
        $id_type_depense = $this->input->get('id');
        $nom_depense = $this->input->get('nom');
        $data['nom'] = $nom_depense;
        $data['id_type_depense'] = $id_type_depense;
        $this->load->view('_Layout/home/header4.php', $data);
        $this->load->view("user/depense/saisie");
        $this->load->view('_Layout/home/footer2.php');
    }

    public function Saisie(){
        $id = $this->input->post('id');
        $detail = $this->input->post('detail');
        $tarif = $this->input->post('tarif');
        $jour  = $this->input->post('jour');
        $mois = $this->input->post('month');
        $annee = $this->input->post('annee');
        if(!empty($mois)){
            foreach($mois as $m){
                $daty = $jour.'-'.$m.'-'.$annee;
                $s = $this->Depense_model->Save_Saisie($id, $daty, $detail, $tarif);
            }
        }
        
        if($s == true){
            $this->session->set_flashdata('success_flashData', 'Saisie avec succes');
            Redirect('Depense/Red_List');
        }else{
            $this->session->set_flashdata('error_flashData', 'Une Erreur est survenue !');
            redirect('Depense/Red_List');
        }
    }

    public function Historiques(){
        $id_type_depense = $this->input->get('id');
        $type = $this->Depense_model->GetWhere($id_type_depense);
        foreach($type as $t){
            $data['nom'] = $t['nom'];
        }
        $data['liste'] = $this->Depense_model->GetHistorique($id_type_depense);
        $this->load->view('_Layout/home/header4.php', $data);
        $this->load->view("user/depense/historiques");
        $this->load->view('_Layout/home/footer2.php');
    }

    public function import_csv() {
        $file_path = 'C:\wamp64\www\Eval3\assets\example.csv';
        if (!file_exists($file_path)) {
            echo "Le fichier CSV n'existe pas.";
            return;
        }
        if (($handle = fopen($file_path, 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ';')) !== FALSE) {
                $date = $data[0];
                $code = $data[1];
                $montant = $data[2];
                $detail = 'Rien';
                $date_obj = DateTime::createFromFormat('d/m/Y', $date);
                if ($date_obj !== false) {
                    $daty = $date_obj->format('Y-m-d');
                } else {
                    echo "Ok.";
                }
                $liste = $this->Depense_model->GetWhereCode($code);
                foreach($liste as $l){
                    $s = $this->Depense_model->Save_Saisie($l['id_type_depense'], $daty, $detail, $montant);
                }
            }
            if($s == true){
                $this->session->set_flashdata('success_flashData', 'Saisie avec succes');
                fclose($handle);
                Redirect('Depense/Red_List');
            }else{
                $this->session->set_flashdata('error_flashData', 'Une Erreur est survenue !');
                fclose($handle);
                redirect('Depense/Red_List');
            }
        } else {
            echo "Impossible d'ouvrir le fichier CSV.";
        }
    }
}