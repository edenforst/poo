<?php


class Pokemon extends PokemonBase {
    private int $niveau;
    private int $pointsDeVie;
    private int $attaque;
    private int $defense;
    private string $capture;


    public function __construct($numero, $nom, $types, $sexe, $localisation, $description, $imagePath) {
        parent::__construct($numero, $nom, $types, $sexe, $localisation, $description, $imagePath);

        $this->niveau = random_int(1, 100);
        $this->pointsDeVie = random_int(10, 250);
        $this->attaque = random_int(1, 10);
        $this->defense = random_int(1, 10);
        $this->capture = $this->difficulteCapture();
    }

    private function difficulteCapture() {
        $probabilite = random_int(1, 100);
        if ($probabilite <= 30) {
            return 'Facile';
        } elseif ($probabilite <= 70) {
            return 'Normal';
        } else {
            return 'Difficile';
        }
    }

    public function afficherCaracteristiques(): void {
        parent::afficherCaracteristiques();
        echo '<img src="' . $this->imagePath . '" alt="Image du Pokémon"><br>';
        echo "Niveau: {$this->niveau}<br>"; 
        echo "PV: {$this->pointsDeVie}<br>";
        echo "Attaque: {$this->attaque}<br>"; 
        echo "Défense: {$this->defense}<br>"; 
        echo "Capture: {$this->capture}<br>";
        
    }

    public function getNiveau(): int
    {
        return $this->niveau;
    }

    public function getPointsDeVie(): int
    {
        return $this->pointsDeVie;
    }

    public function getAttaque(): int
    {
        return $this->attaque;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }

    public function getCapture(): string
    {
        return $this->capture;
    }

}