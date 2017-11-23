<?php

$excludeDir = ['.', '..', 'ressources'];
$dirList = array_diff(scandir('.'), $excludeDir);
foreach ($dirList as $element){
    if(!is_dir($element)){
        unset($dirList[array_search($element, $dirList)]);
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="ressources/app/materialize-src/sass/materialize.css"  media="screen,projection"/>
    <link rel="icon" href="ressources/favicon.ico">
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Accueil - MAMP <?= $_SERVER['HTTP_HOST']; ?></title>
</head>
<body>
<div>
    <div class="row">
        <div class="col s6">
            <div class="section col s12">
                <h5>Projets</h5>
                <p>Projets détectés : <?= count($dirList); ?></p>
            </div>
            <?php
            foreach ($dirList as $element){
                ?>
                <div class="col s6 element" id="<?= $element ?>">
                    <a href="<?= $element ?>">
                        <ul class="collection">
                            <li class="collection-item avatar valign-wrapper">
                                <i class="material-icons circle">folder</i>
                                <span class="title"><?= $element ?></span>
                                <i class="material-icons secondary-content">open_in_new</i>
                            </li>
                        </ul>
                    </a>
                </div>
                <?php
            }
        ?>
        </div>
        <div class="col s6">
            <div class="section col s12">
                <h5>Toolbox</h5>
                <p>Outils pour le développement</p>
            </div>
            <div class="col s12">
                <input type="text" id="toMD5" name="toMD5" placeholder="Texte à crypter en MD5">
                <span class="toMD5">Résultat : <b>AUCUN ENCRYTAGE EFFECTUE</b></span>
            </div>
            <p>&nbsp;</p>
            <div class="col s12">
                <input type="text" id="toSHA1" name="toSHA1" placeholder="Texte à crypter en SHA1">
                <span class="toSHA1">Résultat : <b>AUCUN ENCRYTAGE EFFECTUE</b></span>
            </div>
            <p>&nbsp;</p>
            <div class="col s12">
                <input type="text" id="toSLUG" name="toSLUG" placeholder="Chaine de charactères à slugger">
                <span class="toSLUG">Résultat : <b>AUCUNE CHAINE DE CHARACTERES A SLUGGER</b></span>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="ressources/app/materialize-src/js/materialize.min.js"></script>
<script type="text/javascript">
    $('#toMD5').on('keyup', function(e){
        $.ajax({ url: 'ressources/functions.php',
            data: {
                action: 'md5',
                value:  $('#toMD5').val()
            },
            type: 'post',
            success: function(output){
                $('.toMD5 b').text(output);
            },
            error: function(){
                $('.toMD5 b').text("AUCUN ENCRYTAGE EFFECTUE");
            }
        });
    });

    $('#toSHA1').on('keyup', function(e){
        $.ajax({ url: 'ressources/functions.php',
            data: {
                action: 'sha1',
                value:  $('#toSHA1').val()
            },
            type: 'post',
            success: function(output){
                $('.toSHA1 b').text(output);
            },
            error: function(){
                $('.toSHA1 b').text("AUCUN ENCRYTAGE EFFECTUE");
            }
        });
    });

    $('#toSLUG').on('keyup', function(e){
        $.ajax({ url: 'ressources/functions.php',
            data: {
                action: 'slug',
                value:  $('#toSLUG').val()
            },
            type: 'post',
            success: function(output){
                $('.toSLUG b').text(output);
            },
            error: function(){
                $('.toSLUG b').text("AUCUNE CHAINE DE CHARACTERE A SLUGGER");
            }
        });
    });
</script>
</body>
</html>
