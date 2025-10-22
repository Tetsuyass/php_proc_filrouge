<?php
/**
 * QuizMusic - Page d'accueil
 * Jour 1 : PHP Procédural - Sélection des questionnaires
 *
 * OBJECTIF PÉDAGOGIQUE :
 * Ce fichier enseigne les bases du PHP procédural :
 * - Syntaxe PHP de base (balises <?php ?>)
 * - Tableaux associatifs multidimensionnels
 * - Boucles foreach pour parcourir des données
 * - Fonctions personnalisées
 * - Mélange PHP/HTML pour du contenu dynamique
 * - Sessions PHP pour conserver les données
 */

// 📚 CONCEPT : Sessions PHP
// Les sessions permettent de conserver des données entre les pages
// Toujours démarrer session_start() en début de fichier, avant tout HTML
session_start();

// 📚 CONCEPT : Tableaux associatifs multidimensionnels
// Un tableau PHP peut contenir d'autres tableaux comme valeurs
// Ici, chaque clé (ex: 'rock') correspond à un questionnaire
// Chaque questionnaire est lui-même un tableau associatif avec ses propriétés
$questionnaires = [
    'rock' => [
        'titre' => 'Rock Classique',
        'description' => 'Testez vos connaissances sur les légendes du rock : Queen, Led Zeppelin, AC/DC...',
        'emoji' => '🎸',
        'difficulte' => 3,
        'nb_questions' => 5,
        'couleur' => 'from-red-500 to-pink-600'
    ],
    'pop_fr' => [
        'titre' => 'Pop Française',
        'description' => 'De Brel à Stromae, en passant par Indochine et Louise Attaque',
        'emoji' => '🇫🇷',
        'difficulte' => 2,
        'nb_questions' => 5,
        'couleur' => 'from-blue-500 to-purple-600'
    ],
    'rap_us' => [
        'titre' => 'Rap US',
        'description' => 'Hip-hop américain : Eminem, Jay-Z, Kendrick Lamar et les autres',
        'emoji' => '🎤',
        'difficulte' => 4,
        'nb_questions' => 5,
        'couleur' => 'from-gray-700 to-gray-900'
    ],
    'electro' => [
        'titre' => 'Électro/Dance',
        'description' => 'Musique électronique : Daft Punk, David Guetta, Skrillex...',
        'emoji' => '🎛️',
        'difficulte' => 3,
        'nb_questions' => 5,
        'couleur' => 'from-green-400 to-blue-500'
    ],
    'disney' => [
        'titre' => 'Disney/Dessins animés',
        'description' => 'Chansons Disney et musiques de films d\'animation',
        'emoji' => '🎬',
        'difficulte' => 1,
        'nb_questions' => 5,
        'couleur' => 'from-yellow-400 to-orange-500'
    ]
];

// 📚 CONCEPT : Fonctions personnalisées en PHP
// Une fonction permet de réutiliser du code et d'organiser la logique
// Paramètres : ce que la fonction reçoit (ici $niveau)
// Return : ce que la fonction renvoie (ici une chaîne d'étoiles)
function afficherDifficulte($niveau) {
    // Variable pour stocker le résultat
    $etoiles = '';

    // 📚 CONCEPT : Boucle for
    // for ($i = valeur_départ; $i <= condition; $i++)
    // Répète le code tant que la condition est vraie
    for ($i = 1; $i <= 5; $i++) {
        // 📚 CONCEPT : Structure conditionnelle if/else
        // Teste une condition et exécute du code selon le résultat
        if ($i <= $niveau) {
            // 📚 CONCEPT : Concaténation avec .=
            // .= ajoute du texte à la fin d'une variable existante
            $etoiles .= '⭐';  // Étoile pleine
        } else {
            $etoiles .= '☆';  // Étoile vide
        }
    }

    // 📚 CONCEPT : Return
    // Renvoie le résultat calculé à l'endroit où la fonction a été appelée
    return $etoiles;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizMusic 🎵 - Testez vos connaissances musicales !</title>

    <!-- Tailwind CSS depuis CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Configuration Tailwind personnalisée -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    backgroundImage: {
                        'gradient-quiz': 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                        'gradient-alt': 'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)'
                    }
                }
            }
        }
    </script>

    <!-- Styles personnalisés -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-gradient-to-br from-purple-900 via-blue-900 to-indigo-900 min-h-screen">
<!-- Container principal -->
<div class="container mx-auto px-4 py-8 max-w-6xl">

    <!-- En-tête avec titre principal -->
    <header class="text-center mb-12">
        <h1 class="text-5xl md:text-6xl font-bold text-white mb-4">
            🎵 QuizMusic
        </h1>
        <p class="text-xl md:text-2xl text-purple-200 mb-2">
            Testez vos connaissances musicales !
        </p>
        <p class="text-lg text-purple-300">
            Choisissez votre thème et découvrez votre niveau musical
        </p>
    </header>

    <!-- Grille des questionnaires -->
    <main class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
        <?php
        // 📚 CONCEPT : Boucle foreach avec clé et valeur
        // foreach parcourt chaque élément d'un tableau
        // $id récupère la clé ('rock', 'pop_fr', etc.)
        // $quiz récupère la valeur (le tableau des informations du quiz)
        foreach ($questionnaires as $id => $quiz):
            ?>
            <!-- Card pour chaque questionnaire -->
            <div
                class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition-all duration-300 hover:shadow-2xl">

                <!-- En-tête coloré de la card -->
                <div class="bg-gradient-to-r <?php echo $quiz['couleur']; ?> p-6 text-white">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-4xl"><?php
                            // 📚 CONCEPT : Accès aux valeurs d'un tableau associatif
                            // $quiz['emoji'] récupère la valeur associée à la clé 'emoji'
                            echo $quiz['emoji'];
                            ?></span>
                        <span class="text-sm font-medium bg-white/20 px-2 py-1 rounded-full">
                            <?php
                            // 📚 CONCEPT : Echo pour afficher du contenu dynamique
                            // echo affiche directement la valeur dans le HTML
                            echo $quiz['nb_questions'];
                            ?> questions
                        </span>
                    </div>
                    <h3 class="text-2xl font-bold mb-2"><?php echo $quiz['titre']; ?></h3>
                    <div class="text-sm opacity-90">
                        Difficulté : <?php
                        // 📚 CONCEPT : Appel de fonction
                        // On appelle notre fonction personnalisée en lui passant la difficulté
                        echo afficherDifficulte($quiz['difficulte']);
                        ?>
                    </div>
                </div>

                <!-- Contenu de la card -->
                <div class="p-6">
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        <?php echo $quiz['description']; ?>
                    </p>

                    <!-- Bouton pour démarrer le quiz -->
                    <a href="quiz.php?theme=<?php
                    // 📚 CONCEPT : Paramètres GET dans l'URL
                    // On passe l'ID du quiz dans l'URL avec ?theme=valeur
                    // La page quiz.php pourra récupérer cette valeur avec $_GET['theme']
                    echo $id;
                    ?>"
                       class="block w-full bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white font-semibold py-3 px-6 rounded-xl text-center transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        🎯 Commencer le quiz
                    </a>
                </div>
            </div>
        <?php
            // 📚 CONCEPT : Fin de boucle foreach
            // endforeach; termine la boucle commencée avec foreach:
            // Alternative : on peut aussi utiliser des accolades { }
        endforeach;
        ?>
    </main>

    <!-- Section informations -->
    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 text-center">
        <h2 class="text-2xl font-bold text-white mb-4">
            🏆 Comment ça marche ?
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-purple-200">
            <div>
                <div class="text-3xl mb-2">🎯</div>
                <h3 class="font-semibold mb-2">Choisissez</h3>
                <p class="text-sm">Sélectionnez votre thème musical préféré</p>
            </div>
            <div>
                <div class="text-3xl mb-2">🎵</div>
                <h3 class="font-semibold mb-2">Jouez</h3>
                <p class="text-sm">Répondez aux 5 questions sans stress</p>
            </div>
            <div>
                <div class="text-3xl mb-2">🏅</div>
                <h3 class="font-semibold mb-2">Progressez</h3>
                <p class="text-sm">Découvrez votre niveau et vos résultats</p>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-center py-8">
    <p class="text-purple-300 text-sm">
        🎓 QuizMusic - Projet pédagogique PHP
    </p>
</footer>
</body>

</html>