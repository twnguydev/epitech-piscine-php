<?php
function airport($str = "Veuillez spécifier une chaîne de caractères.") {
    echo "Bienvenue dans le jeu des chaînes de caractères !" . PHP_EOL;
    a:
    echo "Entrez une chaîne de caractères :" . PHP_EOL;
    $str = trim(fgets(STDIN));
    
    if (strlen($str) < 15 || !is_string($str)) {
        echo "Votre chaîne de caractères est invalide..." . PHP_EOL;
        goto a;
    }
    
    b:
    echo "Votre choix est : $str." . PHP_EOL;
    echo "Souhaitez-vous confirmer ?" . PHP_EOL;
    echo "Tapez \"Oui\" pour confirmer ou \"Non\" pour corriger." . PHP_EOL;
    $answer = trim(fgets(STDIN));
    
    if ($answer === "Oui") {
        goto c;
    }
    elseif ($answer === "Non") {
        goto a;
    }
    else {
        echo "Réponse incorrecte." . PHP_EOL;
        goto b;
    }
    
    c:
    echo "Veuillez spécifier une couleur : Rouge, Vert ou Bleu ?" . PHP_EOL;
    $choice = trim(fgets(STDIN));
    
    if ($choice === "Rouge") {
        echo "\033[31mBien joué, le $choice est ma couleur préférée !" . PHP_EOL;
        echo "Chargement en cours..." . PHP_EOL;
        sleep(5);
        affichage($str);
    }
    elseif ($choice === "Vert") {
        echo "\033[32mOk ! Vous avez choisi $choice, très bon choix !" . PHP_EOL;
        echo "Chargement en cours..." . PHP_EOL;
        sleep(5);
        affichage($str);
    }
    elseif ($choice === "Bleu") {
        echo "\033[96mOk ! Le $choice est une magnifique couleur !" . PHP_EOL;
        echo "Chargement en cours..." . PHP_EOL;
        sleep(5);
        affichage($str);
    }
    else {
        goto c;
    }
}

function affichage($str) {
    while(true) {
        for ($i = 0; $i < strlen($str); $i++) {
            $display = substr($str, $i, 15);
            echo $display . PHP_EOL;
            usleep(400000);
            @system('clear');
        }
    }
}

airport();
?>