<?php

/**
 * Classe représentant une équipe de pokemon.
 */
class Equipe {

    /**
     * @var string Le nom de l'équipe.
     */
    public string $nomequipe;

    /**
     * @var string Le type de poekmon de l'équipe.
     */
    public string $typeDePokemon;

    /**
     * Constructeur de la classe Equipe.
     *
     * @param string $nomequipe Le nom de l'équipe.
     * @param string $typeDePokemon Le type de pokemon de l'équipe.
     */
    public function __construct($nomequipe, $typeDePokemon) {
        $this->nomequipe = $nomequipe;
        $this->typeDePokemon = $typeDePokemon;
    }
}
