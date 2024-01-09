<?php

require_once '../models/Tag.php';
require '../helpers/header.php';

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
}
$init = new TagController();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    switch ($_POST['tagg']) {
        case 'AddT':
            $init->AddTag();
            break;
        default:
            redirect("../views/dashboard.php");
    }
}
