<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premier Controller</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="header-img">
        <img src="./img/logo_poleS.png" alt="poleS logo">
    </div>

    <h1>Premier controller</h1>
    <p>Maintenant que nous avons mis en place la structure principale des routes de notre MVC, nous allons faire notre premier controller</p>

    <h2>BaseController</h2>
    <p>BaseController sera comme son nom l'indique le controller de Base, il sera chargé de fournir les méthodes utiles à toutes les classes heritières</p>

    <pre>
        <code>
namespace Controllers; 

abstract class BaseController {
    /**
     * Méthode pour afficher une vue
     * 
     * @param string $view Nom de la vue (sans extension .php)
     * @param array $data Données à transmettre à la vue
     */
    protected function render($view, $data = []) {
        // Extrait les données pour les rendre disponibles sous forme de variables
        extract($data);

        // Chemin vers la vue
        $viewPath = __DIR__ . '/../views/' . $view . '.php';

        if (file_exists($viewPath)) {
            // Inclure le header, la vue et le footer
            require __DIR__ . '/../inc/header.php';
            require $viewPath;
            require __DIR__ . '/../inc/footer.php';
        } else {
            echo "Vue introuvable : $viewPath";
        }
    }
}
        </code>
    </pre>

    <p>Cette méthode permet d’afficher une vue tout en incluant un en-tête et un pied de page.</p>


    <hr>
    <h2>Home Controller</h2>
    <p>HomeController sera l'enfant de BaseController, nous utiliserons les méthodes de BaseController pour les choses globales</p>
    <p>Exemple</p>

    <pre>
        <code>
            namespace Controller;

            class HomeController extends BaseController{
                public $productModel;

                 public function __construct() {
                    $this->productModel = new Products();
                }
            
                // $this->render est une méthode de BaseController pour afficher une vue;
                public function index() {

                    // Affiche la vue "home" avec un titre
                        $this->render('home', ['title' => 'Bienvenue sur notre site']);
                }

                public function about() {

                    // Affiche la vue "about" avec un titre
                    $this->render('about', ['title' => 'À propos de nous']);
                }

                public function list(){
                    $products = $this->productModel->getAllProducts();
                    return $this->render('achats/produits_list',['$products' => $products])
                }
            
            }
        </code>
    </pre>
        <p>Les méthodes comme <code>index</code> et <code>about</code> utilisent simplement la méthode <code>render</code> pour afficher la vue correspondante avec des données spécifiques.</p>

    <h3>Exemple de <code>header.php</code> :</h3>
    <pre>
        <code>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Mon Site' ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <h1>Mon Site</h1>
    </header>
    <main>
        </code>
    </pre>

    <h3>Exemple de <code>footer.php</code> :</h3>
    <pre>
        <code>
    </main>
    <footer>
        <p>&copy; 2024 - Mon Site. Tous droits réservés.</p>
    </footer>
</body>
</html>
        </code>
    </pre>

    <h3>Exemple de <code>home.php</code> :</h3>
    <pre>
        <code>
<h2><?= $title ?></h2>
<p>Bienvenue sur notre site !</p>
        </code>
    </pre>

    <h3>Exemple de <code>index.php</code> :</h3>
    <pre>
        <code>

        require_once __DIR__ . '/controllers/BaseController.php';
        require_once __DIR__ . '/controllers/HomeController.php';

        use Controllers\HomeController;

        // Gestion des routes
        $route = $_GET['route'] ?? 'home';
        $controller = new HomeController();

        if ($route === 'home') {
            $controller->index();
        } elseif ($route === 'about') {
            $controller->about();
        } else {
            echo "Page introuvable";
        }
        </code>
    </pre>

</body>

</html>