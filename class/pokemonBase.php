<?php

/**
 * Classe de base abstraite représentant les caractéristiques communes d'un pokemon.
 */
abstract class PokemonBase {

    /**
     * @var int Le numéro du pokemon.
     */
    private int $numero;

    /**
     * @var string Le nom du pokemon.
     */
    protected string $nom;

    /**
     * @var array Les types du pokemon.
     */
    private array $types;

    /**
     * @var string Le sexe du pokemon.
     */
    private string $sexe;

    /**
     * @var string La localisation du pokemon.
     */
    private string $localisation;

    /**
     * @var string La description du pokemon.
     */
    private string $description;

    /**
     * @var string Le chemin vers l'image du pokemon.
     */
    public $imagePath;

    /**
     * Constructeur de la classe pokemonBase.
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
        $this->numero = $numero;
        $this->nom = $nom;
        $this->types = $types;
        $this->sexe = $this->choisirSexeAleatoire();
        $this->localisation = $localisation;
        $this->description = $description;
        $this->imagePath = $imagePath;
    }

    /**
     * Choisi le sexe du pokemon de manière aléatoire parmi les options possibles.
     *
     * @return string Le sexe du pokemon (♀, ♂, inconnu).
     */
    private function choisirSexeAleatoire() {
        $sexesPossibles = ['♀', '♂', 'inconnu'];
        return $sexesPossibles[array_rand($sexesPossibles)];
    }

    /**
     * Affiche les caractéristiques communes à tous les pokemon.
     */
    public function afficherCaracteristiques() {
        echo "Numéro: {$this->numero}<br>";
        echo "Nom: {$this->nom}<br>"; 
        echo "Types: " . implode(", ", $this->types) . "<br>";
        echo "Sexe: {$this->sexe}<br>";
        echo "Localisation: {$this->localisation}<br>";
        echo "Description: {$this->description}<br>";
    }

    /**
     * Obtient le numéro du pokemon.
     *
     * @return int Le numéro du pokemon.
     */
    public function getNumero():int {
        return $this->numero;
    }

    /**
     * Obtient le nom du pokemon.
     *
     * @return string Le nom du pokemon.
     */
    public function getNom():string {
        return $this->nom;
    }

    /**
     * Obtient les types du pokemon.
     *
     * @return array Les types du pokemon.
     */
    public function getTypes():array
    {
        return $this->types;
    }

    /**
     * Obtient le sexe du pokemon.
     *
     * @return string Le sexe du pokemon.
     */
    public function getSexe():string
    {
        return $this->sexe;
    }

    /**
     * Obtient la localisation du pokemon.
     *
     * @return string La localisation du pokemon.
     */
    public function getLocalisation():string
    {
        return $this->localisation;
    }

    /**
     * Obtient la description du pokemon.
     *
     * @return string La description du pokemon.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

}
