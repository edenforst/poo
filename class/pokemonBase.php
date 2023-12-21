<?php

abstract class  PokemonBase {
    private int $numero;
    protected string $nom;
    private array $types;
    private string $sexe;
    private string $localisation;
    private string $description;
    public $imagePath;

    public function __construct($numero, $nom, $types, $sexe, $localisation, $description, $imagePath) {
        $this->numero = $numero;
        $this->nom = $nom;
        $this->types = $types;
        $this->sexe = $this->choisirSexeAleatoire();
        $this->localisation = $localisation;
        $this->description = $description;
        $this->imagePath = $imagePath;
    }

    private function choisirSexeAleatoire() {
        $sexesPossibles = ['♀', '♂', 'inconnu'];
        return $sexesPossibles[array_rand($sexesPossibles)];
    }

    // Méthode commune à tous les pokemons
    public function afficherCaracteristiques() {
        echo "Numéro: {$this->numero}<br>";
        echo "Nom: {$this->nom}<br>"; 
        echo "Types: " . implode(", ", $this->types) . "<br>";
        echo "Sexe: {$this->sexe}<br>";
        echo "Localisation: {$this->localisation}<br>";
        echo "Description: {$this->description}<br>";
    }
    
    public function getNumero():int {
        return $this->numero;
    }

    public function getNom():string {
        return $this->nom;
    }

    public function getTypes():array
    {
        return $this->types;
    }

    public function getSexe():string
    {
        return $this->sexe;
    }

    public function getLocalisation():string
    {
        return $this->localisation;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

}