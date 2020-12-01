<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/Accueil
     *    - or -
     *         http://example.com/index.php/Accueil/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/Accueil/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Establishment_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger mt-2 h-50">', '</div>');
    }

    public function index()
    {
        $this->template->load('front/template', 'front/home');
    }

    public function signin()
    {
        $this->template->load('front/template', 'front/form');
    }

    public function form_validation()
    {
        if ($this->form_validation->run('signin')) {

            $pseudo = $this->input->post('pseudo');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $password = password_hash($password, PASSWORD_DEFAULT);

            $data['pseudo'] = $pseudo;
            $data['email'] = $email;
            $data['password'] = $password;
            $this->User_model->insert($data);

            $user = $this->User_model->selectuserbyemail($email);
            $this->load->library('email');
            $this->email->from('machinbiduletruc31@gmail.com', 'admin');
            $this->email->to($email);
            $this->email->subject('Inscription pour Smart_menu');
            $message = "<p>Merci pour votre inscription à Smart_menu.<p>
            Veuillez suivre <a href='" . base_url() . "front/confirmation/" . $user->id . "'> ce lien</a> pour confirmer votre inscription.";
            $this->email->message($message);
            

            if ($this->email->send() == true) {
                $this->email->send();
            } else {
                print_r($this->email->print_debugger());
            }

            $user = $this->User_model->selectuserbyemail($email);
            $userid = ['user_id' => $user->id];
            $this->Establishment_model->insert($userid);

            $this->template->load('front/template', 'front/formsuccess');
        } else {
            $this->signin();
        }
    }

    public function confirmation($id)
    {
        $this->User_model->changeactif($id);
        $data = array (
            'success' => 'Votre compte est désormais actif, vous pouvez vous connecter !'
        );
        $this->template->load('front/template', 'front/login', $data);
    }

    public function login()
    {
        $this->template->load('front/template', 'front/login');
    }

    public function login_validation()
    {
        if ($this->form_validation->run('login')) {
            //true
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            //model function
            $this->load->model('User_model');
            $user = $this->User_model->selectuserbyemail($email);
            $pseudo = $user->pseudo;

// TODO -------------FAIRE L'ENVOI DE MAIL AVEC ACTIF 1 ET LE MODIFIER ICI !!!
            if (password_verify($password, $user->password) && $user->actif == 1) {
                $session_data = array(
                    'user_id' => $user->id,
                    'email' => $email,
                    'pseudo' => $pseudo,
                );
                $this->session->set_userdata($session_data);
                redirect(base_url() . 'manager/');

            } else {
                $this->session->set_flashdata('error', 'Email ou mot de passe invalide');
                redirect(base_url() . 'front/login');
            }
        } else {
            $this->login();
        }
    }
}
