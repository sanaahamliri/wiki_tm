<?php

class WikiModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addWiki($title, $content, $userId, $categoryId)
    {
        $stmt = $this->db->prepare("INSERT INTO wiki (titre, contenu, idUser, idCategorie) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $title, $content, $userId, $categoryId);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
}
?>