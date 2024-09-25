<html>
<?php
require_once '../persistance/DialogueBD.php';
try {
    $undlg= new DialogueBD();
    $genre=$_POST['id_genre'];
    $mesMangas=$undlg->getmangapargenre($genre);
    $genre=$undlg->getUngenre($genre);
    foreach ($genre as $libelle){
        $lib=$libelle['lib_genre'];
    }
} catch (Exception $e) {
    $erreur=$e->getMessage();
}
?>
<head>
    <title>Mangas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/Oger/OgerManga/lib/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/Oger/OgerManga/lib/css/mangas.css" rel="stylesheet">
    <script src="/Oger/OgerManga/lib/jquery/jquery-2.1.3.min.js"></script>
    <script src="/Oger/OgerManga/lib/bootstrap/js/ui-bootstrap-tpls.js" type="text/javascript"></script>
    <script src="/Oger/OgerManga/lib/bootstrap/js/bootstrap.js"></script>
</head>
<body>
<?php
require_once("menu.html");
?>


<div class="container">
    <h1>Liste de mes Mangas</h1>
    <table class="table table-bordered table-striped">
        <thead>
        </thead>
        <tbody>
        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Genre</th>
            <th>Dessinateur</th>
            <th>scénariste</th>
            <th>Prix</th>
        </tr>
        <?php
        $lignes="";
        foreach ($mesMangas as $manga)
        { // On parcourt la collection
            $nom = $manga['titre'];
            $id=$manga['id_manga'];
            $prix=$manga['prix'];
            $dessinateur=$manga['id_dessinateur'];
            $dessinateur=$undlg->getLedessinateur($dessinateur);
            foreach ($dessinateur as $ligne){
                $dessinateur = $ligne['nom_dessinateur'];
            }
            $scenariste=$manga['id_scenariste'];
            $scenariste=$undlg->getLescenatiste($scenariste);
            foreach ($scenariste as $ligne){
                $scenariste=$ligne['nom_scenariste'];
            }

            echo "<tr><td>$id</td><td>$nom</td><td>$lib</td><td>$dessinateur</td><td>$scenariste</td><td>$prix</td></tr>";
        }
        echo utf8_encode($lignes); // On affiche tous les <tr>
        ?>
        </tbody>
    </table>
</div>

</body>

</html>


