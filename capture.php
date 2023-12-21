<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Logique de capture du Pokémon
    if (isset($_POST['capturerPokemon'])) {
        $pokemonIdCapture = filter_input(INPUT_POST, 'pokemonId', FILTER_VALIDATE_INT);

        // Vérifiez si le Pokémon capturé existe dans la liste des Pokémon générés
        if ($pokemonIdCapture !== false && isset($_SESSION['pokemonsGeneres'][$pokemonIdCapture])) {
            // Récupérez les informations du Pokémon capturé
            $pokemonCapture = $_SESSION['pokemonsGeneres'][$pokemonIdCapture];

            // Effectuez la tentative de capture en fonction de la difficulté
            $tentativeCapture = mt_rand(1, 100);

            switch ($pokemonCapture['DifficulteCapture']) {
                case 'Facile':
                    $tauxCapture = 70; // ajustez selon vos besoins
                    break;
                case 'Normal':
                    $tauxCapture = 50; // ajustez selon vos besoins
                    break;
                case 'Difficile':
                    $tauxCapture = 30; // ajustez selon vos besoins
                    break;
                default:
                    $tauxCapture = 50; // taux par défaut si la difficulté n'est pas définie
                    break;
            }

            if ($tentativeCapture <= $tauxCapture) {
                // Le Pokémon a été capturé
                // Ajoutez le Pokémon à l'équipe du dresseur
                $sacha->attraperPokemon(new Pokemon(
                    $pokemonCapture['numero'],
                    $pokemonCapture['nom'],
                    $pokemonCapture['types'],
                    $pokemonCapture['sexe'],
                    $pokemonCapture['localisation'],
                    $pokemonCapture['description'],
                    $pokemonCapture['imagePath']
                ));

                // Retirez le Pokémon de la liste des Pokémon générés (si vous le souhaitez)
                unset($_SESSION['pokemonsGeneres'][$pokemonIdCapture]);

                // Vous pouvez également rediriger l'utilisateur vers une page de confirmation ou autre
                header('Location: index.php' . $_SERVER['REQUEST_URI']);
                exit;
            } else {
                // Le Pokémon a échappé à la capture
                echo 'Le Pokémon a échappé à la capture.';

                // Vous pouvez également rediriger l'utilisateur vers une page d'échec de capture
                // header('Location: echec_capture.php');
                // exit;
            }
        }
    }
}

