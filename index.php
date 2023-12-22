<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Générateur Pokémon</title>
    <?php
    require_once('class/PokemonBase.php');
    require_once('class/pokemon.php');
    require_once('class/pokemonShiny.php');
    require_once('class/equipe.php');
    require_once('class/dresseur.php');
    require_once('vider_session.php');
    require_once('capture.php');

    if (!isset($_SESSION['pokemonsGeneres'])) {
        $_SESSION['pokemonsGeneres'] = [];
    }
    $pokemonIdCapture = 0;
    ?>
</head>
<body>

<h1>Générateur Pokémon</h1>

<form method="post">
    <input type="submit" name="genererPokemon" value="Générer un pokemon" >
</form>

<form method="post" action="vider_session.php">
    <input type="submit" name="viderSession" value="Vider la session">
</form>

    <div class="card-container">
    <div class="card">
        <?php
            $bulbizarre = new Pokemon(1, "Bulbizarre", ["Plante", "Poison"], "sexe", "Forêt de Jade", "Un Pokémon de départ", "images/1.png");
            $bulbizarre->afficherCaracteristiques();
        ?>
    </div>

    <div class="card">
        <?php
            $carapuce = new Pokemon(2, "Carapuce", ["Eau"], "sexe", "Rivière Azur", "Un autre Pokémon de départ", "images/7.png");
            $carapuce->afficherCaracteristiques();
        ?>
    </div>

    <div class="card">
        <?php
            $psykokwak = new Pokemon(3, "Psykokwak", ["Normal"], "sexe", "Ocean", "Un pokemon loufoque", "images/54.png");
            $psykokwak->afficherCaracteristiques();
        ?>
    </div>

    <div class="card">
        <?php
            $bulbizarreShiny = new PokemonShiny(1, "Bulbizarre*", ["Plante", "Poison"], "sexe", "Forêt de Jade", "Un Pokémon de départ","images/shiny1.png", "Vert Clair","Lorsqu'il est chromatique, le bulbe de Bulbizarre et les taches qui le parsèment sont vert foncé. Son corps est plus clair qu'à l'accoutumée, mais ses yeux restent rouges. ");
            $bulbizarreShiny->afficherCaracteristiques();
        ?>
    </div>
    <div>
        <?php

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                echo "<p> méthode POST</p>";
                // générer un pokemon aléatoire parmis une fiche
                $pokemonAleatoire = new Pokemon(3, "Psykokwak", ["Normal"], "sexe", "Ocean", "Un pokemon loufoque", "images/54.png");
            
                // ajouter les caractéristique du pokemon a SESSION
                $_SESSION['pokemonsGeneres'][] = [
                    'numero' => $pokemonAleatoire->getNumero(),
                    'nom' => $pokemonAleatoire->getNom(),
                    'types' => $pokemonAleatoire->getTypes(),
                    'sexe' => $pokemonAleatoire->getSexe(),
                    'localisation' => $pokemonAleatoire->getLocalisation(),
                    'description' => $pokemonAleatoire->getDescription(),
                    'imagePath' => $pokemonAleatoire->imagePath,
                    'niveau' => $pokemonAleatoire->getNiveau(),
                    'pointsDeVie' => $pokemonAleatoire->getPointsDeVie(),
                    'attaque' => $pokemonAleatoire->getAttaque(),
                    'defense' => $pokemonAleatoire->getDefense(),
                    'capture' => $pokemonAleatoire->getCapture(),
                ];
            
                // Redirigez l'utilisateur vers la page actuelle pour éviter la réémission du formulaire
                header('Location: ' . $_SERVER['REQUEST_URI']);
                exit;
            }

            if (!empty($_SESSION['pokemonsGeneres'])) {
                echo '<div>';
                echo '<h2>Pokémons générés :</h2>';
                foreach ($_SESSION['pokemonsGeneres'] as $pokemon) {
                    echo '<div class="card">';
                    echo "Numéro : {$pokemon['numero']}<br>";
                    echo "Nom : {$pokemon['nom']}<br>";
                    echo "Types : " . implode(", ", $pokemon['types']) . "<br>";
                    echo "Sexe : {$pokemon['sexe']}<br>";
                    echo "Localisation : {$pokemon['localisation']}<br>";
                    echo "Description : {$pokemon['description']}<br>";
                    echo '<img src="' . $pokemon['imagePath'] . '" alt="Image du Pokémon"><br>';
                    echo "Niveau : {$pokemon['niveau']}<br>";
                    echo "pointsDeVie : {$pokemon['pointsDeVie']}<br>";
                    echo "attaque : {$pokemon['attaque']}<br>";
                    echo "defense : {$pokemon['defense']}<br>";
                    echo "capture : {$pokemon['capture']}<br>";
            
                    // Formulaire de capture
                    echo '<form method="post" action="capture.php">';
                        echo '<input type="hidden" name="pokemonId" value="' . $pokemon['numero'] . '">';
                        echo '<input type="submit" name="capturerPokemon" value="Capturer">';
                    echo '</form>';
            
                    echo '</div>';
                }
                echo '</div>';
            }



        
        ?>
    </div>


    </div>
</body>
</html>


<?php

var_dump($_POST);
var_dump($pokemonIdCapture);


$equipe = new Equipe("Team Rocket", "Ténèbres");
var_dump($equipe);

$sacha = new Dresseur("solo", "Feu", "Sacha", 6, "Détermination", 6);
var_dump($sacha);

// $sacha->attraperPokemon($bulbizarreShiny);
// echo "<br>";
// $sacha->attraperPokemon($carapuce);
// echo "<br>";
// $sacha->attraperPokemon($psykokwak);
// echo "<br>";
// $sacha->attraperPokemon($bulbizarre);
// echo "<br>";
$sacha->afficherEquipe();
