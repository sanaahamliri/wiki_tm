<?php
session_start();

require_once '../includes/header.php';
require_once '../controllers/CategorieController.php';
require_once '../controllers/TagController.php';
require_once 'Wiki.php';
echo'hello word';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $wikiTitle = $_POST['wikiName'];
    $wikiContent = $_POST['wikiContent'];
    $userId = $_POST['userID'];
    $categoryId = $_POST['categoryID'];

  
    $wikiModel = new WikiModel($db);

  
    if ($wikiModel->addWiki($wikiTitle, $wikiContent, $userId, $categoryId)) {
        
        echo "Wiki added successfully!";
    } else {
        
        echo "Error adding wiki!";
    }
} else {
   
    echo "Invalid request!";
}
?>
