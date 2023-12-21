<?php


class PokemonShiny extends Pokemon {
    private string $couleurUnique;
    private string $caracteristique;

    public function __construct($numero, $nom, $types, $sexe, $localisation, $description, $imagePath, $couleurUnique, $caracteristique) {
        parent::__construct($numero, $nom, $types, $sexe, $localisation, $description, $imagePath);
        $this->couleurUnique = $couleurUnique;
        $this->caracteristique = $caracteristique;
    }

    public function afficherCaracteristiques(): void {
        parent::afficherCaracteristiques();
        echo "Couleur Unique: {$this->couleurUnique}\n";
    }
}