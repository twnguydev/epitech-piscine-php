<?php
function colle(int $x, int $y) {

    if ($x == 0 || $y == 0) {
        return false;
    }

// Première ligne
    for ($i = 1; $i <= $x; $i++) {
        if ($x === 1) {
            echo "o\n";
            break;
        }

        if ($i == 1) {
            echo "o";
        }

        if ($i <= ($x - 2)) {
            echo "-";
        }

        if ($i == $x) {
            echo "o\n";
        }
    }

// Boucle Y
    $k = 2;
    while ($k < $y) {
        if ($y === 1) {
            break;
        }

        // Boucle toute la ligne
        for ($j = 1; $j <= $x; $j++) {
            if ($x === 1) {
                echo "|\n";
                break;
            }

            if ($j == 1) {
                echo "|";
            }

            if ($j <= ($x - 2)) {
                echo " ";
            }

            if ($j == $x) {
                echo "|\n";
            }
        }

        $k++;
    }

    // Dernière ligne
    for ($i = 1; $i <= $x; $i++) {
        if ($y === 1) {
            break;
        }

        if ($x === 1) {
            echo "o\n";
            break;
        }

        if ($i == 1) {
            echo "o";
        }

        if ($i <= ($x - 2)) {
            echo "-";
        }

        if ($i == $x) {
            echo "o\n";
        }
    }
}
colle(0,0);
colle(1,1);
colle(1,5);
colle(5,1);
colle(2,5);
colle(2,2);
colle(5,5);
?>