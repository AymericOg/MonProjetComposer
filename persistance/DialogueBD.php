<?php
require_once 'Connexion.php' ;
class DialogueBD
{
    public function getTousLesManga()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "select distinct * from manga m join genre g on m.id_genre=g.id_genre order by id_manga";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabEmployes = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabEmployes;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function addUnManga($dessinateur,$scenariste,$prix,$titre,$couverture,$date,$genre)


    {
        $ajoutOk = false;
        try {
            $conn = Connexion::getConnexion();
            $sql = "INSERT INTO manga (id_dessinateur,id_scenariste,prix,titre,dateParution,couverture,id_genre) VALUES (?,?,?,?,?,?,?)";
            $sth = $conn->prepare($sql);
            $sth->execute(array($dessinateur,$scenariste,$prix,$titre,$date,$couverture,$genre));
            //header('location: /mes-mangas/getListeMangas.php');
            $ajoutOk = true;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
            var_dump($erreur );
        }
        return $ajoutOk;
    }
    public function getTousLesgenre()
    {
        try {
            $conn = Connexion::getConnexion();
            //$sql = "select distinct * from manga m join dessinateur d on m.id_dessinateur=d.id_dessinateur  join scenariste s on m.id_scenariste= s.id_scénariste order by id_manga";
            $sql = "select * from genre ";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabEmployes = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabEmployes;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    public function getTousLesdessinateurs()
    {
        try {
            $conn = Connexion::getConnexion();
            //$sql = "select distinct * from manga m join dessinateur d on m.id_dessinateur=d.id_dessinateur  join scenariste s on m.id_scenariste= s.id_scénariste order by id_manga";
            $sql = "select * from dessinateur ";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabEmployes = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabEmployes;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    public function getTousLeScenariste()
    {
        try {
            $conn = Connexion::getConnexion();
            //$sql = "select distinct * from manga m join dessinateur d on m.id_dessinateur=d.id_dessinateur  join scenariste s on m.id_scenariste= s.id_scénariste order by id_manga";
            $sql = "select * from scenariste ";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabEmployes = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabEmployes;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
        public function getmangapargenre($genre)
        {
            try {
                $conn = Connexion::getConnexion();
                //$sql = "select distinct * from manga m join dessinateur d on m.id_dessinateur=d.id_dessinateur  join scenariste s on m.id_scenariste= s.id_scénariste order by id_manga";
                $sql = "select distinct * from manga  where id_genre = ? order by id_manga";
                $sth = $conn->prepare($sql);
                $sth->execute(array($genre));
                $tabEmployes = $sth->fetchAll(PDO::FETCH_ASSOC);
                return $tabEmployes;
            } catch (PDOException $e) {
                $erreur = $e->getMessage();
            }
        }
        public function getUngenre($genre)
        {
            try {
                $conn = Connexion::getConnexion();
                //$sql = "select distinct * from manga m join dessinateur d on m.id_dessinateur=d.id_dessinateur  join scenariste s on m.id_scenariste= s.id_scénariste order by id_manga";
                $sql = "select * from genre where id_genre=? ";
                $sth = $conn->prepare($sql);
                $sth->execute(array($genre));
                $tabEmployes = $sth->fetchAll(PDO::FETCH_ASSOC);
                return $tabEmployes;
            } catch (PDOException $e) {
                $erreur = $e->getMessage();
            }
        }
            public
            function getLedessinateur($dessinateur)
            {
                try {
                    $conn = Connexion::getConnexion();
                    //$sql = "select distinct * from manga m join dessinateur d on m.id_dessinateur=d.id_dessinateur  join scenariste s on m.id_scenariste= s.id_scénariste order by id_manga";
                    $sql = "select * from dessinateur where id_dessinateur=? ";
                    $sth = $conn->prepare($sql);
                    $sth->execute(array($dessinateur));
                    $tabEmployes = $sth->fetchAll(PDO::FETCH_ASSOC);
                    return $tabEmployes;
                } catch (PDOException $e) {
                    $erreur = $e->getMessage();
                }
            }

        public function getLescenatiste($scenariste)
        {
            try {
                $conn = Connexion::getConnexion();
                //$sql = "select distinct * from manga m join dessinateur d on m.id_dessinateur=d.id_dessinateur  join scenariste s on m.id_scenariste= s.id_scénariste order by id_manga";
                $sql = "select * from scenariste where id_scenariste=?";
                $sth = $conn->prepare($sql);
                $sth->execute(array($scenariste));
                $tabEmployes = $sth->fetchAll(PDO::FETCH_ASSOC);
                return $tabEmployes;
            } catch (PDOException $e) {
                $erreur = $e->getMessage();
            }
        }

}