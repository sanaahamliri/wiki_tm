<?php

require_once 'C:/xampp/htdocs/a_wiki/wiki_tm/models/Wiki.php';
require_once 'C:/xampp/htdocs/a_wiki/wiki_tm/helpers/header.php';

class WikiController{

    private $wikiModel;

    public function __construct()
    {
        $this->wikiModel = new Wiki;
    }

    public function welcome()
    {
        echo "ana welcome";
    }


    public function GetNomWiki()
    {
        return $this->wikiModel->GetWiki();
    }
    public function test(){
        echo "test";
    }

    public function AddWiki()
    {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


        $data = [
            'WikiTitre' => trim($_POST['titre_wiki']),
            'WikiContenu' => trim($_POST['contenu_wiki']),
            'WikiTags' => ($_POST['tags']),
            'WikiCategorie' => trim($_POST['categoryID']),

        ];

        if ($this->wikiModel->AddWiki($data)) {
            redirect("../views/AddWiki.php");
        } else {
            die("Something went wrong");
        }
    }


    public function EditWiki()
    {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


        $data = [
            'WikiTitre' => trim($_POST['Newtitre_wiki']),
            'WikiContenu' => trim($_POST['Newcontenu_wiki']),
            'WikiTags' => ($_POST['Newtags']),
            'WikiCategorie' => trim($_POST['NewcategoryID']),
            'WikiID' => trim($_POST['idWiki']),

        ];


        if ($this->wikiModel->EditWiki($data)) {

            redirect("../views/AddWiki.php");
        } else {
            die("Something went wrong");
        }
    }

    public function GetWiki()
    {
        if ($this->wikiModel->GetWiki()) {
            return $this->wikiModel->GetWiki();
        } else {
            die("Something went wrong");
        }
    }

    public function archiveWiki($wikiId)
    {
        $this->wikiModel->archiveWiki($wikiId);
    }

    public function deleteWiki($wikiId)
    {
        $this->wikiModel->deleteWiki($wikiId);
    }

    public function details($idWiki)
    {
        return $this->wikiModel->show($idWiki);
    }
    
}

$init = new WikiController();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    switch ($_POST['wiki']) {
        case 'AddW': {
                $init->AddWiki();
                redirect("../views/AddWiki.php");
                break;
            }
        case 'DeleteW': {
                $init->deleteWiki($_POST["idWiki"]);
                redirect("../views/AddWiki.php");
                break;
            }
        case 'archiveWiki': {
                $init->archiveWiki($_POST['WikiId']);
                redirect("../views/wiki.php");
                break;
            }
        case 'EditW':
            $init->EditWiki();
            redirect("../views/AddWiki.php");
            break;
        default:
            echo 'failed';
            redirect("../views/AddWiki.php");
    }
}
