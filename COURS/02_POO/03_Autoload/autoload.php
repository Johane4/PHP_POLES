<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoload - PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="header-img">
        <img src="./img/logo_poleS.png" alt="logo poleS">
    </div>
    <h1>Autoload</h1>
    <p>Pour charger nos classes dynamiquement, nous allons les autoloader.</p>

    <h2>Dossier inc</h2>
    <p>Nous allons créer un dossier <code>autoload</code> à la racine du projet.</p>
    <p>Ensuite, nous allons créer le fichier <code>autoload.php</code>.</p>

    <p>Ce fichier contiendra une fonction qui sera en charge d'inclure le fichier d'une classe lorsqu'il détecte une instanciation quelque part dans le code.</p>

    <pre><code>
    function chargeClass($className){
        // Remplace les barres obliques inverses par des barres obliques pour le chemin du fichier
        $filePath = str_replace("\\", "/", $className);
        
        // Construit le chemin complet du fichier de la classe
        $root = __DIR__ . "/../" . $filePath . ".php";

        // Vérifie si le fichier de la classe existe et l'inclut
        if (file_exists($root)) {
            require $root;
        } else {
            throw new Exception("La classe $className n'a pas été trouvée !");
        }
    }

    // Enregistre la fonction chargeClass pour qu'elle soit appelée automatiquement pour charger les classes
    spl_autoload_register("chargeClass");
    </code></pre>

    <hr>
    <p>Index.php sera la porte d'entrée de notre application.</p>
    <p>Elle va récupérer nos URL et les traiter pour les envoyer au bon contrôleur et à la bonne méthode.</p>

    <hr>
    <h2>Autoload</h2>
    <p>Pour charger nos classes dynamiquement, nous allons les autoloader.</p>

    <h2>Introduction aux namespaces</h2>
    <p>Les <strong>namespaces</strong> (ou espaces de noms) sont une fonctionnalité de PHP qui permet d'organiser le code en groupes logiques. Cela aide à éviter les conflits entre des classes ou des fonctions portant le même nom dans différents fichiers.</p>
    <p>En utilisant des namespaces, vous pouvez :</p>
    <ul>
        <li>Créer des structures claires et organisées pour votre projet.</li>
        <li>Utiliser des noms de classes similaires dans différents modules sans conflits.</li>
        <li>Importer facilement des classes ou des fonctions spécifiques avec l'instruction <code>use</code>.</li>
    </ul>
    <p>Exemple d'utilisation d'un namespace :</p>
    <pre><code>
    namespace Controller;

    class HomeController {
        public function index() {
            echo "Bienvenue sur la page d'accueil !";
        }
    }
    </code></pre>
    <p>Pour appeler cette classe depuis un autre fichier :</p>
    <pre><code>
    //require_once 'Controller/HomeController.php';
    use Controller\HomeController.php;

    // Appeler la classe en utilisant son namespace
    $controller = new HomeController();
    $controller->index();
    </code></pre>
</body>

</html>
