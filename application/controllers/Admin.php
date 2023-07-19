<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
    }
    public function login()
	{
        $this->form_validation->set_rules('pseudo', 'Pseudo', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $session_array = array('ADMIN_ID'  => '0');
            $this->session->set_userdata($session_array);
            $data['page_title'] = "Admin Login";
            $this->load->view('_Layout/home/header2.php', $data); // Header File
            $this->load->view("Admin/login");
            $this->load->view('_Layout/home/footer.php'); // Footer File
        }
        else
        {
            $login_data = array(
                'pseudo' => $this->input->post('pseudo', TRUE),
                'password' => $this->input->post('password', TRUE),
            );

            $pseudo = $this->input->post('pseudo');
            $password = $this->input->post('password');
            /**
             * Load User Model
             */
            $this->load->model('Admin_Model', 'AdminModel');
            $result = $this->AdminModel->check_login($pseudo, $password);

            if (!empty($result['status']) && $result['status'] === TRUE) {
                /**
                 * Create Session
                 * -----------------
                 * First Load Session Library
                 */
                $session_array = array(
                    'ADMIN_ID'  => '1',
                    'PSEUDO'  => 'admin',
                );
                
                $this->session->set_userdata($session_array);

                $this->session->set_flashdata('success_flashData', 'Login Success');
                redirect('Admin/Panel');

            } else {

                $this->session->set_flashdata('error_flashData', 'Invalid Pseudo/Password.');
                redirect('Admin/login');
            }
        }
    }

    public function logout() {

        /**
         * Remove Session Data
         */
        $remove_sessions = array('ADMIN_ID', 'PSEUDO');
        $this->session->unset_userdata($remove_sessions);

        redirect('Welcome');
    }

    public function panel() {
        $this->load->model('Dash_model');

        if (empty($this->session->userdata('ADMIN_ID'))) {
            redirect('Admin/login');
        }
        $data['list_acte'] = $this->Dash_model->getTarif_acte();
        $data['page_title'] = "Welcome to Admin Panel";
        /**$this->load->view('_Layout/home/header3.php', $data);
        $this->load->view("dash/dashboard");
        $this->load->view('_Layout/home/footer2.php');*/
        redirect("Dashboard/Red");
    }

    public function Add_artiste(){
        $data['page_title'] = "Ajout artiste";
        $this->load->view('_Layout/home/header3.php', $data);
        $this->load->view("artiste/ajout_artiste");
        $this->load->view('_Layout/home/footer2.php');
    }
}