<?php
require_once 'header.php';
require_once '../persistance/DialogueBD.php';
$undlg = new DialogueBD();
$mesmanga = $undlg->getTousLesManga();
$mesHumain = $undlg->getTousLesgenre();
?>

<html>
<head>

</head>
<body>
<h1 style="text-align: center">Liste de manga d'un genre</h1>
<div class="well">
    <form class="form-horizontal" enctype="multipart/form-data" role="form"
          name="mangaForm" action="Listemangapargenre.php"
          method="POST">

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
</body>
