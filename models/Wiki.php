<?php

require_once 'C:/xampp/htdocs/a_wiki/wiki_tm/config/database.php';

class Wiki
{


    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    // public function setNomWiki($wiki)
    // {
    //     $this->nomWiki = $wiki;
    // }


    public function AddWiki($data)
    {
        $this->db->query('INSERT INTO wiki (titre,contenu,idCategorie,idUser,status) VALUES (:titre,:contenu,:idCategorie,:idUser,0)');

        $this->db->bind(':titre', $data['WikiTitre']);
        $this->db->bind(':contenu', $data['WikiContenu']);
        $this->db->bind(':idCategorie', $data['WikiCategorie']);
        $this->db->bind(':idUser', $_SESSION['user']);

        // Execute
        $this->db->execute();

        $lastIdWiki = $this->db->lastID();
        $tags = $data['WikiTags'];

        foreach ($tags as $tag) {
            $this->db->query("INSERT INTO wikitag (idWiki, idTag) VALUES (:wikiId, :tagId)");
            $this->db->bind(':wikiId', $lastIdWiki);
            $this->db->bind(':tagId', $tag);

            $this->db->execute();

            if (!$this->db->execute()) {
                return false;
            }
        }

        return true;
    }



    public function EditWiki($data)
    {
        $this->db->query('UPDATE `wiki` SET `titre`= :titre, contenu = :contenu, idCategorie = :idCategorie
       WHERE idWiki = :idWiki');

        $this->db->bind(':titre', $data['WikiTitre']);
        $this->db->bind(':contenu', $data['WikiContenu']);
        $this->db->bind(':idCategorie', $data['WikiCategorie']);
        $this->db->bind(':idWiki', $data['WikiID']);

        // Execute
        $this->db->execute();


        $this->db->query('DELETE FROM WikiTag where idWiki = :idWiki');
        $this->db->bind(':idWiki', $data['WikiID']);

        $this->db->execute();

        foreach ($data['WikiTags'] as $tag) {
            $this->db->query("INSERT INTO wikitag (idWiki, idTag) VALUES (:wikiId, :tagId)");
            $this->db->bind(':wikiId', $data['WikiID']);
            $this->db->bind(':tagId', $tag);

            $this->db->execute();

            if (!$this->db->execute()) {
                return false;
            }
        }

        return true;
    }

    public function GetWiki(): array
    {
        try {
            $this->db->query(' SELECT w.idWiki,
             w.Titre, w.Contenu, w.idUser, w.da_te,
              c.idCategorie, c.nomCategorie, u.nom, GROUP_CONCAT(t.nomTag SEPARATOR " , ") AS TagNames 
              FROM wiki.wiki w JOIN wiki.categorie c ON w.idCategorie = c.idCategorie 
              LEFT JOIN wiki.wikitag wt ON w.idWiki = wt.idWiki 
              LEFT JOIN wiki.tag t ON wt.idTag = t.idTag 
              LEFT JOIN wiki.utilisateur u ON w.idUser = u.idUser WHERE w.status = 0 
              GROUP BY w.idWiki ORDER BY w.da_te DESC; ');


            $this->db->execute();
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function ArchiveWiki($wikiId)
    {

        $this->db->query('UPDATE wiki SET status = 1 WHERE idWiki = :WikiId');
        $this->db->bind(':WikiId', $wikiId);
        $this->db->execute();

        if (!$this->db->execute()) {
            return false;
        }
    }

    public function found_wiki($input)
    {

        try {
            $this->db->query("SELECT
            wiki.categorie.nomCategorie,
            GROUP_CONCAT(wiki.tag.nomTag SEPARATOR ', ') AS TagNames ,
            wiki.*
        FROM
            wiki
        LEFT JOIN
            wiki.categorie ON wiki.idCategorie = categorie.idCategorie
        LEFT JOIN
            wiki.wikitag ON wiki.idWiki = wikitag.idWiki
        LEFT JOIN
            wiki.tag ON wikitag.idTag = tag.idTag
        WHERE (wiki.titre LIKE '%{$input}%' OR categorie.nomCategorie LIKE '%{$input}%' OR tag.nomTag LIKE '%{$input}%' ) and wiki.status = 0
        GROUP BY
            wiki.idWiki
        ORDER BY
            wiki.da_te DESC;
        ");
            $this->db->execute();
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function GetWikiDetails($wikiId)
    {

        $this->db->query('SELECT * FROM wiki WHERE idWiki = :WikiId');
        $this->db->bind(':WikiId', $wikiId);
        $this->db->execute();

        if (!$this->db->execute()) {
            return false;
        }
    }




    public function deleteWiki($wikiId)
    {

        $this->db->query('DELETE FROM wiki where idWiki = :WikiId');
        $this->db->bind(':WikiId', $wikiId);
        $this->db->execute();

        if (!$this->db->execute()) {
            return false;
        }
    }


    public function show($idWiki)
    {

        try {
            $this->db->query(' SELECT w.idWiki,
             w.Titre, w.Contenu, w.idUser, w.da_te,
              c.idCategorie, c.nomCategorie, u.nom, GROUP_CONCAT(t.nomTag SEPARATOR " , ") AS TagNames 
              FROM wiki.wiki w JOIN wiki.categorie c ON w.idCategorie = c.idCategorie 
              LEFT JOIN wiki.wikitag wt ON w.idWiki = wt.idWiki 
              LEFT JOIN wiki.tag t ON wt.idTag = t.idTag 
              LEFT JOIN wiki.utilisateur u ON w.idUser = u.idUser WHERE w.status = 0 AND w.idWiki=:wikiID
              GROUP BY w.idWiki ORDER BY w.da_te DESC; ');

            $this->db->bind(':wikiID', $idWiki);
            $this->db->execute();
            return $this->db->single();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getCount()
    {
        $query = "SELECT COUNT(*) as count FROM wiki";
        $this->db->query($query);
        $result = $this->db->execute();

        if ($result) {
            $row = $this->db->single();
            return $row['count'];
        } else {
            return 0;
        }
    }
}
