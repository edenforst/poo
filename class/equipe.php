<?php

class Equipe {
    public string $nomequipe;
    public string $typeDePokemon;

    public function __construct($nomequipe, $typeDePokemon) {
        $this->nomequipe = $nomequipe;
        $this->typeDePokemon = $typeDePokemon;
    }
}
