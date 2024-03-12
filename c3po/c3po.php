<?php
class C3PO /*extends Robot*/ {
    protected static $numeroDeSerie = 1;
    private $nom;
    private $type;

    public function __construct($nom, $type = "droide de protocole") {
        $this->nom = $nom;
        $this->type = $type;
        echo "Je suis le {$this->type} numéro " . self::$numeroDeSerie++ . ", enchanté de vous rencontrer !" . PHP_EOL;
    }

    public function getNumeroDeSerie() {
        return self::$numeroDeSerie - 1;
    }
    public function getNom() {
        return $this->nom;
    }
    public function setNom($nom) {
        $this->nom = $nom;
    }
    public function getType() {
        return $this->type;
    }
    public function setType($type) {
        $this->type = $type;
    }

    public function dire($str) {
        echo "C3PO no {$this->getNumeroDeSerie()} : " . $str . PHP_EOL;
    }

    public function marcher() {
        echo "Je me mets en route, inutile d'insister." . PHP_EOL;
        //parent::marcher();
    }

    public function initierProtocole() {
        
        do {
            echo "En attente d'intéraction utilisateur :" . PHP_EOL;
            $user_input = trim(fgets(STDIN));
            $input = explode(" ", $user_input, 2);
            $cmd = isset($input[0]) ? $input[0] : "";
            $cmd_str = isset($input[1]) ? $input[1] : "";
            $str = str_replace("\"", "", $cmd_str);
            
            switch ($cmd) {
                case "marcher":
                    echo $this->marcher();
                    $this->initierProtocole();
                    break;
                case "dire":
                    if (!empty($str)) {
                        echo $this->dire($str);
                        $this->initierProtocole();
                    }
                    else {
                        echo "Je n'ai donc rien à dire..." . PHP_EOL;
                        $this->initierProtocole();
                    }
                    break;
                case "repos":
                    echo "Fin du protocole." . PHP_EOL;
                    exit();
                    break;
                default:
                    echo "Vous n'avez donc pas besoin de moi..." . PHP_EOL;
            }

        }
        while ($cmd !== "repos");

    }
}

$tester = new C3PO("C3PO", "droide d'exécution");
$droide = new C3PO("R2D2");
$droide->initierProtocole();
?>