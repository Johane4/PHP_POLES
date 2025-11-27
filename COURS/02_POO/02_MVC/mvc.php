<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="header-img">
        <img src="./img/logo_poleS.png" alt="logo_poleS">
    </div>
    <h1>L'architecture MVC</h1>
    <p>MVC est l'acronyme de Model-view-controller, qui sont les trois composants principaux qui caractèrisent le MVC</p>
    <hr>
    <h2>1 . Model (Modèle)</h2>
    <p>Le model gère la logique des données de l'application, en d'autres termes, il représente les données, la logique métier et les règles de l'application. </p>
    <p>Il est responsable de l'accès aux données, que ce soit à partir des bases de données, de fichiers ou d'autres sources</p>

    <hr>
    <h2>2 . View (Vue)</h2>
    <p>La vue gère la présentation des données (ce sont les pages que l'utilisateur verra), le format est généralement HTML ou encore template (comme twig pour symfony)</p>

    <hr>
    <h2>3 . Controller (Contrôleur)</h2>
    <p>Le contrôleur fait la passerelle entre la vue et le model, c'est lui qui est chargé de gérer la relation en récupérant les données de l'utilisateur de la view, les manipuler via le model, interroger la base de donnée si necessaire (envoie de requêtes SQL ou noSQL selon la BDD), et réafficher les données dans la view demandée</p>

    <hr>
    <h2>4 . Exemple : </h2>
    <p>Interaction de l'utilisateur : L'utilisateur interagit avec l'application via la vue</p>
    <p>Envoi de la requête : Lorsque l'utilisateur effectue une action (cliquer sur un bouton, cliquer sur un lien, soumettre un formulaire), la requête est envoyée vers le controller </p>
    <p>Traitement de la requête : Le controller traite la requête, interagit avec le model pour manipuler ou récupérer les données necessaires, et cible la vue demandée pour lui retransmettre les resultats récupérés</p>
    <p>Affichage des résultats : La view reçoit les données du controller et peut afficher les informations récupérées à l'utilisateur.</p>

    <hr>

    <h2>5 . Exemple d'utilisation : </h2>
    <p>Model :</p>
    <pre><code>
    class User{
        private $id;
        private $name;
        private $email;

    public function __construct($id,$name,$email){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function findAll(){
        // code avec requête SQL pour récuperer les données de la BDD

        $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }

    }
    </code></pre>
    <hr>
    <p>Controller : </p>
    <pre><code>
        require_once 'model/User.php';

        class UserController{
            public $users;

            public function __construct() {
                $this->users = new User();
            }

            public function list(){
                $usersList = $this->users->findAll();

                    include 'view/UserListe.php';
           
            }

            public function addUser() {
                 $usersList = $this->users->addNew();

                // Validation champs formulaire et gestion erreurs
                include 'view/add.php';
            }


        }
    </code></pre>
    <hr>

    <p>View : </p>
    <h2>User List</h2>
    <pre><code>
        &lt?php foreach($users as $user){?&gt
            <li>&ltli&gt &lt?php echo htmlspecialchars($user->name); ?&gt &lt/li&gt</li>
        &lt?php } &gt
        </code></pre>

    <hr>
    <h2>
        Le routeur
    </h2>
    <p>Le routeur determine quel contrôleur et quelle méthode utiliser en fonction de la requête HTTP, index.php est la porte d'entrée de notre application, c'est ici que sera gérée la manipulation des routes</p>

    <pre><code>
        // index.php
            require_once 'controller/UserController.php';

        $controller = new UserController();
        $action = isset($_GET['action']) ? $_GET['action'] : 'list';

        // Gère l'affichage de la page d'accueil
        if($action === 'list'){
            $controller->list();
        } else {
        // Gérer ici le cas où l'action serait autre que 'list';
        // Page d'erreur par exemple 404
        }
    </code></pre>
</body>

</html>