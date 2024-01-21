<?php

include_once 'C:/xampp/htdocs/a_wiki/wiki_tm/Models/Categorie.php';
include_once 'C:/xampp/htdocs/a_wiki/wiki_tm/Models/Wiki.php';
include_once 'C:/xampp/htdocs/a_wiki/wiki_tm/Models/Tag.php';
include_once 'C:/xampp/htdocs/a_wiki/wiki_tm/Models/Utilisateur.php';

require_once 'C:/xampp/htdocs/a_wiki/wiki_tm/helpers/header.php';


class StatistiqueController {

    private $wikiModel;
    private $tagModel;
    private $userModel;
    private $catgeoryModel;

    public function __construct()
    {
        $this->wikiModel = new Wiki;
        $this->tagModel = new Tag;
        $this->userModel = new Utilisateur;
        $this->catgeoryModel = new Categorie;
    }


    public function getCounts(){
        $counts['categoryCount'] = $this->catgeoryModel->getCount();
        $counts['tagCount'] = $this->tagModel->getCount();
        $counts['wikiCount'] = $this->wikiModel->getCount();
        $counts['userCount'] = $this->userModel->getCount();

        return $counts;
    }
}


$init = new StatistiqueController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    

    switch ($_POST['stats']) {

        case 'getCounts': {
            redirect("../views/statistique.php");
            break;
        }
        default:
            redirect("../views/dashboard.php");
    }
}
