<?php

require_once '../models/Wiki.php';
require_once '../helpers/header.php';

class WikiController
{

    private $wikiModel;

    public function __construct()
    {
        $this->wikiModel = new Wiki;
    }


    public function GetNomWiki()
    {
        return $this->wikiModel->GetWiki();
    }

    public function AddWiki()
    {
       
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      
        $data = [
            'WikiTitre' => trim($_POST['titre_wiki']),
            'WikiContenu' => trim($_POST['contenu_wiki']),
            'WikiTags' =>($_POST['tags']),
            'WikiCategorie' => trim($_POST['categoryID'])
        ];
        
        if ($this->wikiModel->AddWiki($data)) {
            redirect("../index.php");
        } else {
            die("Something went wrong");
        }
    }

    public function GetWiki()
    {
        $data = [
            'WikiTitre' => $this->wikiModel->GetWiki(),
            'WikiContenu' => $this->wikiModel->GetWiki(),
            'WikiTags' => $this->wikiModel->GetWiki(),
            'WikiCategorie' => $this->wikiModel->GetWiki(),

        ];


        if ($data) {
            return $data;
        } else {
            die("Something went wrong");
        }
    }
//     public function DeleteCategorie($id)
//     {
//         // echo "delete";
//         // die();
//         $this->wikiModel->DeleteCategorie($id);
//     }


//     public function EdditCategorie()
//     {
//         //die(var_dump($_POST));
//         // Sanitize POST data
//         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

//         // Init data
//         $data = [
//             'NewCategorieName' => trim($_POST['NewCategorie']),
//             "id" => $_POST["idCategorie"]
//         ];

//         if ($this->wikiModel->EditCategorie($data)) {
//             redirect("../views/dashboard.php");
//         } else {
//             die("Something went wrong");
//         }
//     }
// }
}
$init = new WikiController();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//    die('azerty');

    switch ($_POST['wiki']) {
        case 'AddW':
            $init->AddWiki();
            break;
        // case 'DeleteC':
        //     $init->DeleteCategorie($_POST["idCategorie"]);
        //     redirect("../views/dashboard.php");
        //     break;
        // case 'EditC':
        
        //     $init->EdditCategorie();
        //     redirect("../views/dashboard.php");
        //     break;
        default:
            redirect("../index.php");
    }
}
