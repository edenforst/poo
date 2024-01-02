<?php

/**
 * Classe représentant un dresseur de pokemon, étendant la classe Equipe.
 */
class Dresseur extends Equipe {

    /**
     * @var string Le nom du dresseur.
     */
    private string $nomdresseur;

    /**
     * @var int Le nombre de badges du dresseur.
     */
    private int $nbbadge;

    /**
     * @var string Les caractéristiques du dresseur.
     */
    private string $caracteristiques;

    /**
     * @var int Le nombre maximum de pokemon que le dresseur peut avoir dans son équipe.
     */
    private int $nombrePokemonMax;

    /**
     * @var array Le tableau contenant les pokemon de l'équipe du dresseur.
     */
    private array $pokemons = [];

    /**
     * Constructeur de la classe Dresseur.
     *
     * @param string $nomequipe Le nom de l'équipe du dresseur.
     * @param string $typeDePokemon Le type de pokemon de l'équipe du dresseur.
     * @param string $nomdresseur Le nom du dresseur.
     * @param int $nbbadge Le nombre de badges du dresseur.
     * @param string $caracteristiques Les caractéristiques du dresseur.
     * @param int $nombrePokemonMax Le nombre maximum de pokemon que le dresseur peut avoir dans son équipe.
     */
    public function __construct($nomequipe, $typeDePokemon, $nomdresseur, $nbbadge, $caracteristiques, $nombrePokemonMax) {
        parent::__construct($nomequipe, $typeDePokemon);
        $this->nomdresseur = $nomdresseur;
        $this->nbbadge = $nbbadge;
        $this->caracteristiques = $caracteristiques;
        $this->nombrePokemonMax = $nombrePokemonMax;
        $this->pokemons = [];
    }

    /**
     * Permet au dresseur d'attraper un nouveau pokemon et l'ajoute à son équipe.
     *
     * @param Pokemon $pokemon Le pokemon à attraper.
     */
    public function attraperPokemon($pokemon) {
        // Vérifiez si le dresseur peut attraper plus de pokemon
        if (count($this->pokemons) < $this->nombrePokemonMax) {
            // Ajoutez le pokemon au tableau
            $this->pokemons[] = $pokemon;
            echo "{$this->nomdresseur} a attrapé un nouveau pokemon : {$pokemon->getNom()}\n";
        } else {
            echo "{$this->nomdresseur} ne peut pas attraper plus de pokemon. Son équipe est complète.\n";
        }
    }

    /**
     * Affiche la liste des pokemon dans l'équipe du dresseur.
     */
    public function afficherEquipe() {
        echo "Équipe de {$this->nomdresseur} :\n";
        foreach ($this->pokemons as $pokemon) {
            echo "- {$pokemon->getNom()}\n";
        }
    }
}