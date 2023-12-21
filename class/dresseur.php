<?php
class Dresseur extends Equipe {
    private string $nomdresseur;
    private int $nbbadge;
    private string $caracteristiques;
    private int $nombrePokemonMax;
    private array $pokemons = [];

    public function __construct($nomequipe, $typeDePokemon, $nomdresseur, $nbbadge, $caracteristiques, $nombrePokemonMax) {
        parent::__construct($nomequipe, $typeDePokemon);
        $this->nomdresseur = $nomdresseur;
        $this->nbbadge = $nbbadge;
        $this->caracteristiques = $caracteristiques;
        $this->nombrePokemonMax = $nombrePokemonMax;
        $this->pokemons = [];
    }

    public function attraperPokemon($pokemon) {
        // Vérifiez si le dresseur peut attraper plus de Pokémon
        if (count($this->pokemons) < $this->nombrePokemonMax) {
            // Ajoutez le Pokémon au tableau
            $this->pokemons[] = $pokemon;
            echo "{$this->nomdresseur} a attrapé un nouveau Pokémon : {$pokemon->getNom()}\n";
        } else {
            echo "{$this->nomdresseur} ne peut pas attraper plus de Pokémon. Son équipe est complète.\n";
        }
    }

    public function afficherEquipe() {
        echo "Équipe de {$this->nomdresseur} :\n";
        foreach ($this->pokemons as $pokemon) {
            echo "- {$pokemon->getNom()}\n";
        }
    }
}