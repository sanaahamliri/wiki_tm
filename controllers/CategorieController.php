<?php

require_once 'C:/xampp/htdocs/a_wiki/wiki_tm/models/Categorie.php';
require_once 'C:/xampp/htdocs/a_wiki/wiki_tm/helpers/header.php';

class CategorieController
{

    private $categorieModel;

    public function __construct()
    {
        $this->categorieModel = new Categorie;
    }


    public function GetNomCategorie()
    {
        return $this->categorieModel->GetCategorie();
    }

    public function AddCategorie()
    {
       
        // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      
        $data = [
            'categorieName' => trim($_POST['categorieName']),
        ];
        
        if ($this->categorieModel->AddCategorie($data)) {
            redirect("../views/dashboard.php");
        } else {
            die("Something went wrong");
        }
    }

    public function GetCategorie()
    {
        $data = [
            'categories' => $this->categorieModel->GetCategorie(),
        ];


        if ($data['categories']) {
            return $data['categories'];
        } else {
            die("Something went wrong");
        }
    }
    public function DeleteCategorie($id)
    {
        // echo "delete";
        // die();
        $this->categorieModel->DeleteCategorie($id);
    }


    public function EdditCategorie()
    {
        //die(var_dump($_POST));
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data = [
            'NewCategorieName' => trim($_POST['NewCategorie']),
            "id" => $_POST["idCategorie"]
        ];

        if ($this->categorieModel->EditCategorie($data)) {  
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
        case 'DeleteC':
            $init->DeleteCategorie($_POST["idCategorie"]);
            redirect("../views/dashboard.php");
            break;
        case 'EditC':
        
            $init->EdditCategorie();
            redirect("../views/dashboard.php");
            break;
        default:
            redirect("../views/dashboard.php");
    }
}
