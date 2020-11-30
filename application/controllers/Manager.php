<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Manager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Establishment_model');
        $this->load->model('Category_model');
        $this->load->model('Product_model');
        $this->load->model('Image_model');
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'form'));
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger mt-2 h-50">', '</div>');
    }

    public function controle()
    {
        $user_id = $this->session->userdata('user_id');
        $est = $this->Establishment_model->selectbyuserid($user_id);
        $data["est"] = $est;
        if ($est->id != '') {
            if ($est->name == '') {
                redirect(base_url() . 'manager/create_establishment');
                return false;
            } else {

                $session_data = array(
                    'establishment_id' => $est->id,
                );
                $this->session->set_userdata($session_data);
                return true;
            }
        } else {
            redirect(base_url() . 'front/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'front/login');
    }

    public function create_establishment()
    {
        $this->template->load('back/template', 'back/createestablishment');
    }

    public function index()
    {
        if ($this->controle() == true) {
            $data = array(
                'user_id' => $_SESSION["user_id"],
                'est' => $this->Establishment_model->selectbyuserid($_SESSION["user_id"]),
            );
            $this->template->load('back/template', 'back/dashboard', $data);
        } else {
            redirect(base_url() . 'manager/create_establishment');
        }
    }

    public function establishment()
    {
        if ($this->controle() == true) {
            $user_id = $_SESSION["user_id"];
            $est = $this->Establishment_model->selectbyuserid($user_id);
            $data["est"] = $est;
            $this->template->load('back/template', 'back/establishment', $data);
        } else {
            redirect(base_url() . 'manager/create_establishment');
        }

    }

    public function establishment_validation()
    {
        if ($this->form_validation->run('establishment')) {
            $data = array(
                'name' => $this->input->post('name'),
                'addressweb' => $this->input->post('addressweb'),
                'address' => $this->input->post('address'),
                'zip' => $this->input->post('zip'),
                'city' => $this->input->post('city'),
                'tel' => $this->input->post('tel'),
                'website' => $this->input->post('website'),
            );
            $this->Establishment_model->update($data, $_SESSION['user_id']);
            redirect(base_url() . 'manager/');
        } else {
            $this->create_establishment();
        }
    }

//==================================================

    public function customization()
    {
        if ($this->controle() == true) {

            $user_id = $_SESSION["user_id"];  
            $image = $this->Image_model->selectbyuserid($user_id);
            $data['image'] = $image;

            $this->load->library('upload');
            $data = array(
                'user_id' => $_SESSION["user_id"],
                'image' => $image,
                'customization' => $this->Establishment_model->selectbyuserid($user_id),
                'error' => $this->upload->display_errors('<div class="alert alert-danger mt-2 h-50">', '</div>')
            );

            $this->template->load('back/template', 'back/customization', $data);
        } else {
            redirect(base_url() . 'manager/create_establishment');
        }
    }

    public function upload_logo()
    {
        $config['upload_path'] = './uploads/logo/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['overwrite'] = true;
        $config['file_name'] = $_SESSION["user_id"] . '_logo';

        $this->load->library('upload', $config);
        $this->upload->display_errors('<div class="alert alert-danger mt-2 h-50">', '</div>');

        //unlink permet d'effaçer un fichier
        array_map('unlink', glob('uploads/logo/' . $_SESSION['user_id'] . '_logo' . '.*'));
        array_map('unlink', glob('uploads/logo/' . $_SESSION['user_id'] . '_logo_thumb' . '.*'));

        if ($this->upload->do_upload('userfile')) {
            $image = $this->Image_model->selectbyuserid($_SESSION["user_id"]);
            $data = array(
                'image' => $image,
                'upload_data' => $this->upload->data(),
                'user_id' => $_SESSION["user_id"],
                'error' => $this->upload->display_errors(),
            );

            $logo = $this->upload->data();

            $config['image_library'] = 'gd2';
            $config['source_image'] = $logo['full_path'];
            $config['create_thumb'] = true;
            $config['maintain_ratio'] = false;
            $config['quality'] = 50;
            $config['width'] = 200;
            $config['height'] = 150;

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $params = array(
                'user_id' => $_SESSION["user_id"],
                'name' => '_logo',
                'size' => $data['upload_data']['file_size'],
                'type' => $data['upload_data']['file_ext'],
            );

            $this->Image_model->update($params, $_SESSION['user_id']);
            $this->template->load('back/template', 'back/customization', $data);
            redirect(base_url() . 'manager/customization', $data);
        }else {
            $this->customization();
        }
    }

    public function presentation()
    {
        $user_id = $_SESSION["user_id"];
        $data = [
            'presentation' => $this->input->post('presentation'),
        ];
        $this->Establishment_model->update($data, $user_id);
        
        redirect(base_url() . 'manager/customization');
    }

    public function background()
    {
        $user_id = $_SESSION["user_id"];
        $data = [
            'background' => $this->input->post('imagebackground')
        ];
        $this->Establishment_model->update($data, $user_id);
        
        redirect(base_url() . 'manager/customization');
    }

//==============================================

    public function category()
    {
        if ($this->controle() == true) {
            $esta_id = $_SESSION['establishment_id'];
            $cat = $this->Category_model->selectestbyid($esta_id);
            $data["cat"] = $cat;
            $this->template->load('back/template', 'back/category', $data);
        } else {
            redirect(base_url() . 'manager/create_establishment');
        }

    }

    public function modify_cat($cat_id)
    {
        $cat = $this->Category_model->selectcatbyid($cat_id);
        $data["cat"] = $cat;
        $this->template->load('back/template', 'back/modify_cat', $data);
    }

    public function modify_cat_validation($cat_id)
    {
        if ($this->form_validation->run('category')) {
            $data = [
                'name_cat' => $this->input->post('name'),
                'description_cat' => $this->input->post('description'),
            ];
            $this->Category_model->update_cat($data, $cat_id);

            redirect(base_url() . 'manager/category');
        } else {
            $this->modify_cat($cat_id);
        }
    }

    public function delete_cat($cat_id)
    {
        $this->Category_model->delete_cat($cat_id);
        $this->Category_model->delete_productcat($cat_id);

        redirect(base_url() . 'manager/category');
    }

    public function add_category()
    {
        if ($this->controle() == true) {
            $this->template->load('back/template', 'back/add_category');
        } else {
            redirect(base_url() . 'manager/create_establishment');
        }
    }

    public function add_category_validation()
    {
        if ($this->form_validation->run('category')) {
            $data = [
                'establishment_id' => $_SESSION['establishment_id'],
                'name_cat' => $this->input->post('name'),
                'description_cat' => $this->input->post('description'),
            ];
            $this->Category_model->insert($data);

            redirect(base_url() . 'manager/category');
        } else {
            $this->add_category();
        }
    }

//=====================================================

    public function product()
    {
        if ($this->controle() == true) {
            $esta_id = $_SESSION['establishment_id'];
            $cat = $this->Product_model->selectcatbyestid($esta_id);
            foreach ($cat as $v) {
                $cat_ids[] = $v->id;
            }
            $products = $this->Product_model->selectproductbycatid($cat_ids);

            $prod_cat = [];
            foreach ($products as $product) {
                if (!isset($prod_cat[$product->name_cat])) {
                    $prod_cat[$product->name_cat] = [];
                }
                $prod_cat[$product->name_cat][] = $product;
            }
            $data["prod_cat"] = $prod_cat;

            $this->template->load('back/template', 'back/product', $data);
        } else {
            redirect(base_url() . 'manager/create_establishment');
        }
    }

    public function add_product()
    {
        if ($this->controle() == true) {
            $estid = $_SESSION['establishment_id'];
            $cat = $this->Category_model->selectestbyid($estid);
            $data["cat"] = $cat;
            $this->template->load('back/template', 'back/add_product', $data);
        } else {
            redirect(base_url() . 'manager/create_establishment');
        }
    }

    public function add_product_validation()
    {
        $cat_name = $this->input->post('cat');
        $cat = $this->Product_model->selectbycatname($cat_name);
        $cat_id = $cat->id;
        if ($this->form_validation->run('product')) {
            $data = [
                'category_id' => $cat_id,
                'name_product' => $this->input->post('name'),
                'description_product' => $this->input->post('description'),
                'price_product' => $this->input->post('price'),
            ];
            $this->Product_model->insert($data);

            redirect(base_url() . 'manager/product');
        } else {
            $this->add_product();
        }
    }

    public function modify_product($product_id)
    {
        $product = $this->Product_model->selectproductbyid($product_id);
        $data["product"] = $product;
        $this->template->load('back/template', 'back/modify_product', $data);
    }

    public function modify_product_validation($product_id)
    {
        if ($this->form_validation->run('product')) {
            $data = [
                'name_product' => $this->input->post('name'),
                'description_product' => $this->input->post('description'),
                'price_product' => $this->input->post('price'),
            ];
            $this->Product_model->update_product($data, $product_id);

            redirect(base_url() . 'manager/product');
        } else {
            $this->modify_product($product_id);
        }
    }

    public function delete_product($product_id)
    {
        $this->Product_model->delete_product($product_id);
        redirect(base_url() . 'manager/product');
    }

    public function upload_img_product()
    {
        $config['upload_path'] = './uploads/product/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['overwrite'] = true;

        $this->load->library('upload', $config);
        $this->upload->display_errors('<div class="alert alert-danger mt-2 h-50">', '</div>');

        if ($this->upload->do_upload('img_product')) {
            $image = $this->Image_model->selectimgproduct($_SESSION["user_id"]);
            $data = array(
                'image' => $image,
                'upload_data' => $this->upload->data(),
                'user_id' => $_SESSION["user_id"],
                'error' => $this->upload->display_errors(),
            );

            $logo = $this->upload->data();

            $config['image_library'] = 'gd2';
            $config['source_image'] = $logo['full_path'];
            $config['create_thumb'] = true;
            $config['maintain_ratio'] = false;
            $config['quality'] = 50;
            $config['width'] = 200;
            $config['height'] = 150;

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $params = array(
                'user_id' => $_SESSION["user_id"],
                'name' => '',
            );

            $this->Image_model->update($params, $_SESSION['user_id']);
            $this->template->load('back/template', 'back/customization', $data);
            redirect(base_url() . 'manager/customization');
        }
    }

}
