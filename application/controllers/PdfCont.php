<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
class PdfCont extends CI_Controller {
    public function getPdf(){
        $this->load->model('Acte_model');
        $data['page_title'] = "Facture";
        $id_patient= $this->input->get('id_patient');
        $id_acte= $this->input->get('id_acte');
        $daty= $this->input->get('daty');
        $data['act'] = $this->Acte_model->GetName($id_acte);
        $data['id'] = $id_acte;
        $data['id_patient'] = $id_patient;
        $data['daty'] = $daty;
        $data['liste'] = $this->Acte_model->GetInFact($id_acte);
        $sum = $this->Acte_model->GetSumInFact($id_acte);
        foreach($sum as $s){
            $data['prix'] = $s['sum'];
        }
        $dompdf = new Dompdf();
        $dompdf->loadHtml($this->load->view('user/patient/pdfview', $data, true));
        $dompdf->render();
        $dompdf->stream();
    }
}