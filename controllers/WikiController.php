
<?php
require_once '../models/Wiki.php';
class WikiController{

    private $wikiModel;

    public function __construct()
    {
        $this->wikiModel = new Wiki;
    }
    

    public function AddWiki() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titre = $_POST['wiki_titre'];
            $contenu = $_POST['wiki_contenu'];
            $image = $_FILES['wiki_image']['name'];
            $img_size = $_FILES['wiki_image']['size'];
            $tmp_name = $_FILES['wiki_image']['tmp_name'];
            $error = $_FILES['wiki_image']['error'];


            if ($error === 0) {

                $img_ex = pathinfo($image, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
        
        
                $new_image = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/' . $new_image;
                move_uploaded_file($tmp_name, $img_upload_path);
            }
            $this->wikiModel->AddWiki($titre,$contenu,$new_image);
        }
    }
}