<?php

require_once 'C:/xampp/htdocs/a_wiki/wiki_tm/models/Tag.php';
require_once 'C:/xampp/htdocs/a_wiki/wiki_tm/helpers/header.php';

class TagController
{

    private $tagModel;

    public function __construct()
    {
        $this->tagModel = new Tag;
    }

    public function AddTag()
    {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data = [
            'tagName' => trim($_POST['tagName']),
        ];
        // Register User
        if ($this->tagModel->AddTag($data)) {
            redirect("../views/dashboard.php");
        } else {
            die("Something went wrong");
        }
    }

    public function GetTag()
    {
        $data = [
            'tags' => $this->tagModel->GetTag(),
        ];


        if ($data['tags']) {
            return $data['tags'];
        } else {
            die("Something went wrong");
        }
    }

    public function DeleteTag($id)
    {
        // echo "delete";
        // die();
        $this->tagModel->DeleteTag($id);
    }


    public function EditTag()
    {
        //die(var_dump($_POST));
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data = [
            'NewTagName' => trim($_POST['NewTag']),
            "id" => $_POST["idTag"]
        ];

        if ($this->tagModel->EditTag($data)) {
            redirect("../views/dashboard.php");
        } else {
            die("Something went wrong");
        }
    }
}
$init = new TagController();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    switch ($_POST['tagg']) {
        case 'AddT':
            $init->AddTag();
            break;
        case 'DeleteT':
            $init->DeleteTag($_POST["idTag"]);
            redirect("../views/dashboard.php");
            break;
        case 'EditT':
            $init->EditTag();
            redirect("../views/dashboard.php");
            break;
        default:
            redirect("../views/dashboard.php");
    }
}
