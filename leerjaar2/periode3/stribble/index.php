<?php 
    require 'includes/config.php'; 
    require 'model/getContent.php';

    $lang = (empty($_GET['lang'])) ? '' : $_GET['lang'];

    switch ($lang) {
        case 'dutch':
            include 'dutch_index.php';
            break;

        case 'english':
             include 'english_index.php';
             break; 
        
        default:
            include 'english_index.php'; 
        break;
    }
?>



