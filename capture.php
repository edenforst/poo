<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo "<p> méthode POST</p>";
    var_dump($_POST);

    if (isset($_POST['capturerPokemon'])) {
        $pokemonIdCapture = filter_input(INPUT_POST, 'pokemonId', FILTER_VALIDATE_INT);

        // vérifier si le pokemon existe dans la liste généré
        if ($pokemonIdCapture !== false && isset($_SESSION['pokemonsGeneres'][$pokemonIdCapture])) {
            // recuperer infos pokemon capturé
            $pokemonCapture = $_SESSION['pokemonsGeneres'][$pokemonIdCapture];

            // tentative en fonction de la difficulte de capture
            $tentativeCapture = mt_rand(1, 100);
            

            switch ($pokemonCapture['DifficulteCapture']) {
                case 'Facile':
                    $tauxCapture = 70;
                    break;
                case 'Normal':
                    $tauxCapture = 50;
                    break;
                case 'Difficile':
                    $tauxCapture = 30;
                    break;
                default:
                    $tauxCapture = 50;
                    break;
            }

            if ($tentativeCapture <= $tauxCapture) {
                // pokemon capturé
                // Ajoutez le Pokémon à l'équipe sacha
                $sacha->attraperPokemon(new Pokemon(
                    $pokemonCapture['numero'],
                    $pokemonCapture['nom'],
                    $pokemonCapture['types'],
                    $pokemonCapture['sexe'],
                    $pokemonCapture['localisation'],
                    $pokemonCapture['description'],
                    $pokemonCapture['imagePath']
                ));

                // retirez le pokemon de la liste des pokemon generé
                unset($_SESSION['pokemonsGeneres'][$pokemonIdCapture]);

                // redirige l'utilisateur vers une page 
                header('Location: index.php' . $_SERVER['REQUEST_URI']);
                exit;
            } else {

                echo 'Le Pokémon a échappé à la capture.';
                // header('Location: echec_capture.php');
                // exit;
            }
        }
    }
    // var_dump($pokemonCapture);
    // var_dump($sacha);
}

