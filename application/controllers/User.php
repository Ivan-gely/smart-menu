<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Establishment_model');
        $this->load->model('Category_model');
        $this->load->model('Product_model');
        $this->load->model('Image_model');
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'form'));
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger mt-2 h-50">', '</div>');
    }

    public function index(){
        $est_id = $_GET['est_id'];
        $user_id = $_SESSION["user_id"];

        $data = array(
            'user' => $this->Establishment_model->selectbyuserid($est_id),
            'cats' => $this->Category_model->selectestbyid($est_id),
            'customization' => $this->Establishment_model->selectbyuserid($user_id)
        );
        $this->template->load('user/template', 'user/website', $data);
    }

    public function category($cat_id){

        $cat = $this->Category_model->selectcatbyid($cat_id);
        $user_id = $_SESSION["user_id"];
        
        $data = array(
            'user' => $this->Establishment_model->selectbyuserid($cat->establishment_id),
            'cats' => $this->Category_model->selectestbyid($cat->establishment_id),
            'products' => $this->Product_model->selectproductbycatid($cat_id),
            'customization' => $this->Establishment_model->selectbyuserid($user_id)
        );
        $this->template->load('user/template', 'user/product', $data);
    }

}