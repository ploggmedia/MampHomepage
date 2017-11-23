<?php

function slugify($text)
{
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}

if(isset($_POST['action'])){
    switch ($_POST['action']) {
        case 'md5':
            if(!empty($_POST['value'])) {
                echo md5($_POST['value']);
            } else {
                echo "AUCUN ENCRYPTAGE EFFECTUE";
            }
            break;
        case 'sha1':
            if(!empty($_POST['value'])) {
                echo sha1($_POST['value']);
            } else {
                echo "AUCUN ENCRYPTAGE EFFECTUE";
            }
            break;
        case 'slug':
            if(!empty($_POST['value'])) {
                echo slugify($_POST['value']);
            } else {
                echo "AUCUNE CHAINE DE CHARACTERE A SLUGGER";
            }
    }
    exit;
}