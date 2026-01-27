<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>functions.inc</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="header-img">
        <img src="./img/logo_poleS.png" alt="logo poleS">
    </div>
    <h1>Init - Functions.inc</h1>
    <h2>init.inc.php</h2>
    <p>Le fichier <code>init.inc.php</code> est crucial pour la configuration de notre application. Il permet :</p>
    <ul>
        <li>De configurer nos constantes globales.</li>
        <li>Démarrer la session, évitant ainsi de devoir le faire à chaque page.</li>
        <li>De configurer l'autoloading pour charger automatiquement les classes nécessaires.</li>
        <li>D'inclure des fonctions utilitaires accessibles globalement.</li>
    </ul>
    <p>Chaque requête est dirigée vers <code>index.php</code>, qui inclut <code>init.inc.php</code>. Cela garantit que toutes ces configurations sont appliquées, car les constantes ont une portée globale et les fichiers inclus le sont dans tout le code.</p>

    <pre><code>
    // Autoloading avant session_start pour éviter les erreurs
    require "autoload.php";
    session_start();
    include __DIR__ . "/functions.inc.php";

    define("ROOT", "/Nom dossier de l'application/");
</code></pre>

    <hr>

    <h2>Fonctions.inc</h2>
    <p>Le fichier <code>functions.inc.php</code> contient les fonctions globales utilisées à divers endroits de l'application. Ces fonctions incluent :</p>

    <hr>

    <h2>Fonctions de redirection</h2>
    <p>La fonction <code>addLink()</code> construit une URL en utilisant le contrôleur, la méthode et éventuellement un ID :</p>
    <pre><code>
    function addLink($controller, $method = 'list', $id = null) {
        return ROOT . "$controller/$method" . ($id ? "/$id" : "");
    }

    // Exemple d'utilisation :
    addLink('home', 'list');
</code></pre>

    <p>La fonction <code>redirection()</code> redirige vers une URL spécifiée :</p>
    <pre><code>
    function redirection($url) {
        header("Location: $url");
        exit;
    }

    // Exemple d'utilisation :
    redirection('/errors/404.php');

    // Ou en utilisant addLink :
    redirection(addLink('user', 'list'));
</code></pre>

    <hr>

    <h2>Fonctions de débogage</h2>
    <p>La fonction <code>d_die()</code> est utilisée pour déboguer une partie du code. Elle affiche le contenu de la variable et arrête l'exécution :</p>
    <pre><code>
    function d_die($var) {
        echo "&ltpre&gt";
        var_dump($var);
        echo "&lt/pre&gt";
        die;
    }

    // La fonction debug() fait la même chose mais sans arrêter le script
    function debug($var) {
        echo "&ltpre&gt";
        var_dump($var);
        echo "&lt/pre&gt";
    }
</code></pre>

    <hr>

    <h2>Fonction d'erreur</h2>
    <p>La fonction <code>error()</code> permet de rediriger vers une page d'erreur spécifique en fonction du numéro fourni :</p>
    <pre><code>
    function error($num = 404) {
        redirection("errors/$num.php");
        exit;
    }
</code></pre>
</body>

</html>