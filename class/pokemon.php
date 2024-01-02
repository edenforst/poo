<?php

/**
 * Classe représentant un pokemon avec des caractéristiques d'instance.
 */
class Pokemon extends PokemonBase {

    /**
     * @var int Le niveau du pokemon.
     */
    private int $niveau;

    /**
     * @var int Les points de vie du pokemon.
     */
    private int $pointsDeVie;

    /**
     * @var int L'attaque du pokemon.
     */
    private int $attaque;

    /**
     * @var int La défense du pokemon.
     */
    private int $defense;

    /**
     * @var string Le niveau de difficulté de capture du pokemon (Facile, Normal, Difficile).
     */
    private string $capture;

    /**
     * Constructeur de la classe pokemon.
     *
     * @param int $numero Le numéro du pokemon.
     * @param string $nom Le nom du pokemon.
     * @param array $types Les types du pokemon.
     * @param string $sexe Le sexe du pokemon.
     * @param string $localisation La localisation du pokemon.
     * @param string $description La description du pokemon.
     * @param string $imagePath Le chemin vers l'image du pokemon.
     */
    public function __construct($numero, $nom, $types, $sexe, $localisation, $description, $imagePath) {
        parent::__construct($numero, $nom, $types, $sexe, $localisation, $description, $imagePath);

        $this->niveau = random_int(1, 100);
        $this->pointsDeVie = random_int(10, 250);
        $this->attaque = random_int(1, 10);
        $this->defense = random_int(1, 10);
        $this->capture = $this->difficulteCapture();
    }

    /**
     * Calcule la difficulté de capture du pokemon en fonction d'une probabilité aléatoire.
     *
     * @return string Le niveau de difficulté de capture (Facile, Normal, Difficile).
     */
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

    /**
     * Affiche les caractéristiques du pokemon, y compris l'image, le niveau, les PV, l'attaque, la défense et la difficulté de capture.
     */
    public function afficherCaracteristiques(): void {
        parent::afficherCaracteristiques();
        echo '<img src="' . $this->imagePath . '" alt="Image du pokemon"><br>';
        echo "Niveau: {$this->niveau}<br>"; 
        echo "PV: {$this->pointsDeVie}<br>";
        echo "Attaque: {$this->attaque}<br>"; 
        echo "Défense: {$this->defense}<br>"; 
        echo "Capture: {$this->capture}<br>";
    }

    /**
     * Obtient le niveau du pokemon.
     *
     * @return int Le niveau du pokemon.
     */
    public function getNiveau(): int
    {
        return $this->niveau;
    }

    /**
     * Obtient les points de vie du pokemon.
     *
     * @return int Les points de vie du pokemon.
     */
    public function getPointsDeVie(): int
    {
        return $this->pointsDeVie;
    }

    /**
     * Obtient l'attaque du pokemon.
     *
     * @return int L'attaque du pokemon.
     */
    public function getAttaque(): int
    {
        return $this->attaque;
    }

    /**
     * Obtient la défense du pokemon.
     *
     * @return int La défense du pokemon.
     */
    public function getDefense(): int
    {
        return $this->defense;
    }

    /**
     * Obtient le niveau de difficulté de capture du pokemon.
     *
     * @return string Le niveau de difficulté de capture (Facile, Normal, Difficile).
     */
    public function getCapture(): string
    {
        return $this->capture;
    }

}
