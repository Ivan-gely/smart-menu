<?
$config = array(
    'signin' => array(
        array(
            'field' => 'pseudo',
            'label' => 'Pseudo',
            'rules' => 'trim|required|is_unique[user.pseudo]',
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|is_unique[user.email]',
        ),
        array(
            'field' => 'password',
            'label' => 'Mot de passe',
            'rules' => 'trim|required|min_length[6]',
        ),
        array(
            'field' => 'passconf',
            'label' => 'Confirmation du mot de passe',
            'rules' => 'trim|required|matches[password]',
        ),
    ),
    'login' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email',
        ),
        array(
            'field' => 'password',
            'label' => 'Mot de passe',
            'rules' => 'trim|required|min_length[6]',
        ),
    ),
    'establishment' => array(
        array(
            'field' => 'name',
            'label' => 'Nom de votre établissement',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'addressweb',
            'label' => 'addressweb',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'address',
            'label' => 'address',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'zip',
            'label' => 'zip',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'city',
            'label' => 'city',
            'rules' => 'trim|required',
        ),
    ),
    'category' => array(
        array(
            'field' => 'name',
            'label' => 'Nom du produit',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'trim|required|min_length[10]',
        ),
    ),

    'product' => array(
        array(
            'field' => 'name',
            'label' => 'Nom du produit',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'trim|required|min_length[10]',
        ),
        array(
            'field' => 'price',
            'label' => 'Prix',
            'rules' => 'trim|required',
        ),
    ),
);
