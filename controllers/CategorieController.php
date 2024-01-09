<?php

require_once '../models/Categorie.php';
require '../helpers/header.php';

class CategorieController
{

    private $categorieModel;

    public function __construct()
    {
        $this->categorieModel = new Categorie;
    }

    public function AddCategorie()
    {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data = [
            'categorieName' => trim($_POST['categorieName']),
        ];
        // Register User
        if ($this->categorieModel->AddCategorie($data)) {
            redirect("../views/dashboard.php");
        } else {
            die("Something went wrong");
        }
    }
}
$init = new CategorieController();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    switch ($_POST['categ']) {
        case 'AddC':
            $init->AddCategorie();
            break;
        default:
            redirect("../views/dashboard.php");
    }
}
