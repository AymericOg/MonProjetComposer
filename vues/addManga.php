<?php require_once 'header.php';
require_once '../persistance/DialogueBD.php';
$undlg = new DialogueBD();
$mesmanga = $undlg->getTousLesManga();
$mesHumain = $undlg->getTousLesgenre();
$mesdessinateur=$undlg->getTousLesdessinateurs();
$messcenariste=$undlg->getTousLeScenariste();

    if ((isset($_POST['titre'] )) || (isset($_POST['id_genre'] )) || (isset($_POST['prix'] )) || (isset($_POST['id_dessinateur'] )) || (isset($_POST['id_scenariste'] )) ||  (isset($_POST['dateParution'] )) || (isset($_POST['courverture'] ))   ){
        try {
            $undlg = new DialogueBD();
            $titre = $_POST['titre'];
            $genre =$_POST['id_genre'];
            $prix =$_POST['prix'];
            $dessinateur=$_POST['id_dessinateur'];
            $scenariste=$_POST['id_scenariste'];
            $date=$_POST['dateParution'];
            $couverture=$_POST['courverture'];
            $ajoutOK = $undlg->addUnManga($dessinateur,$scenariste,$prix,$titre,$couverture,$date,$genre);

            //header("location: listerMangas.php");
} catch (Exception $e) {
            $erreur = $e->getMessage();
        }
    }
    ?>
<html>
<head>

</head>
<body>
<h1 style="text-align: center">Ajouter un Manga</h1>
<div class="well">
    <form class="form-horizontal" enctype="multipart/form-data" role="form"
          name="mangaForm" action="addManga.php"
          method="POST">

        <div class="form-group">
            <label class="col-md-3 control-label">Titre : </label>
            <div class="col-md-3">
                <input type="text" name="titre" class="form-control" required
                       autofocus>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Genre : </label>
            <label class="col-md-3 control-label">
                <select type="text" name="id_genre" class="form-control" required
                       autofocus>
                    <?php foreach ($mesHumain as $ligne) {
                        $genree = $ligne['id_genre'];
                        $designation = $ligne['lib_genre'];
                        echo "<option value=$genree>$designation</option>";
                    } ?>
                </select>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Prix :</label>
            <div class="col-md-3">
                <input name="prix" type="text" class="form-control" required
                       autofocus/>
            </div>
        </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Dessinateur :</label>
                <div class="col-md-3">
                    <select name="id_dessinateur" type="text" class="form-control" required
                           autofocus/>
                    <?php foreach ($mesdessinateur as $ligne) {
                        $genree = $ligne['id_dessianteur'];
                        $designationn = $ligne['nom_dessinateur'];
                        echo "<option value=$genree>$designationn</option>";
                    } ?>
                    </select>
                </div>
            </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">scenariste :</label>
                    <div class="col-md-3">
                        <select name="id_scenariste" type="text" class="form-control" required
                               autofocus/>
                        <?php foreach ($messcenariste as $ligne) {
                            $scenaristee = $ligne['id_scenariste'];
                            $designation = $ligne['nom_scenariste'];
                            echo "<option value=$scenaristee>$designation</option>";
                        } ?>
                        </select>
                    </div>
                </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">courverture :</label>
                        <div class="col-md-3">
                            <input name="courverture" type="text" class="form-control" required
                                   autofocus/>
                        </div>
                    </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Parution : </label>
            <div class="col-md-3">
                <input type="date" name="dateParution" class="form-control" required
                       autofocus>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-
primary"><span class="glyphicon glyphicon-ok"></span> Valider
                </button>
                &nbsp;

                <button type="button" class="btn btn-default btn-primary"
                        onclick="javascript:
window.location='../index.php';"><span
                        class="glyphicon glyphicon-remove"></span>
                </button>
            </div>
        </div>
    </form>
                    <?php
                    if (isset($ajoutOK)) {
                        if($ajoutOK){
                            echo "Ajout réussi : $couverture a été ajouté(e) dans la table !";
                        } else{
                            echo "Echec de l'ajout !";
                        }
                    }
                    //var_dump($couverture,$date,$dessinateur,$scenariste,$titre,$genre,$prix);
                    ?>
</body>
</div>
</html>
