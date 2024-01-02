<?php

/**
 * Classe représentant un Pokémon brillant (shiny).
 */
class PokemonShiny extends Pokemon {

    /**
     * @var string La couleur unique du Pokémon brillant.
     */
    private string $couleurUnique;

    /**
     * @var string La caractéristique spécifique du Pokémon brillant.
     */
    private string $caracteristique;

    /**
     * Constructeur de la classe PokemonShiny.
     * @param string $couleurUnique La couleur unique du Pokémon brillant.
     * @param string $caracteristique La caractéristique spécifique du Pokémon brillant.
     */
    public function __construct($numero, $nom, $types, $sexe, $localisation, $description, $imagePath, $couleurUnique, $caracteristique) {
        parent::__construct($numero, $nom, $types, $sexe, $localisation, $description, $imagePath);
        $this->couleurUnique = $couleurUnique;
        $this->caracteristique = $caracteristique;
    }

    /**
     * Affiche les caractéristiques du Pokémon brillant, y compris la couleur unique.
     */
    public function afficherCaracteristiques(): void {
        parent::afficherCaracteristiques();
        echo "Couleur Unique: {$this->couleurUnique}\n";
    }
}
