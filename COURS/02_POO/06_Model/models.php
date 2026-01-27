<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entity</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="header-img">
        <img src="./img/logo_poleS.png" alt="poleS logo">
    </div>

    <h1>Repository/Entity</h1>
    <p>Notre controller est mis en place , il nous faut maintenant nous occuper de la BDD, pour cela, dans notre dossier Model, nous allons ajouter un fichier Database.php</p>

    <pre>
        <code>
    namespace Model;

    class Database 
    {
        private $host = "localhost";
        private $db_name = "societe";
        private $username = 'root';
        private $password = '';
        public $connexion = null;

        public function dbConnect()
        {
            try {
                $pdo = new \PDO("mysql:host=$this->host;dbname=$this->db_name",$this->username,$this->password,[\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);

                $this->connexion = $pdo;
            } catch (\PDOException $e){
             echo "Erreur de connexion : " . $e->getMessage();
            }
            return $this->connexion;
        }
    }
        </code>
    </pre>

    <h2>Entity (entité)</h2>
    <p>Partons du principe que la connexion s'est bien déroulée ou se déroulera bien à l'avenir, nous allons maintenant avoir besoin de représentants pour nos tables dans notre application, c'est là qu'interviennent les <code>Entités</code></p>


    <pre>
        <code>
        namespace Model\Entity;

        // Nous regrouperons dans cette classe toutes les similarités qui existent entre les différentes tables
        class BaseEntity{
            protected $id; // Toutes nos entités auront forcement un id en clé primaire (autant l'utiliser une seule fois pour toutes);

            public function getId(){
                return $this->id;
            }

            public function setId($id){
                $this->id = $id;
                return $this; // return $this = il nous retourne la classe actuelle, ce qui nous redonne accès aux propriétés et méthode (nous pouvons avec ça enchaîner les méthodes)
            }

            // Exemple : $entity = new BaseEntity();
                        $entity->setId(4)->getId(); // Enchaînement de méthodes avec return $this;
                        $entity->setId(4);
                        $entity->getId(); // sans return $this;
        }
    </code>
</pre>

    <hr>
    <h2>Employes Entity</h2>
    <p>Reprenons notre BDD societe, BaseEntity place les bases de nos entités (les id par exemple), mais chaque table dans notre bdd a quand même ses spécificités, sinon nous n'aurions qu'une seule table</p>
    <p>L'entité Employes reprendra toutes les colonnes de sa table dans la BDD sauf id (qui est déjà dans BaseEntity)</p>

    <pre>
        <code>
        namespace Model\Entity 

        class Employes extends BaseEntity
        {
            private $prenom;
            private $nom;
            private $sexe;
            private $service;
            private $date_embauche;
            private $salaire;

            // Nous allons ajouter des getters (récupère la valeur de la propriété) et des setters (met à jour (modifier) la valeur de la propriété). Toujours de façon non directe ! Ce qui permet de contrôler les données 
            
            public function getPrenom(){
                return $this->prenom;
            }

            public function setPrenom($prenom){
                $this->prenom = $prenom;
                return $this;
            }

            public function getNom()
            {
                return $this->nom;
            }

            public function setNom($nom)
            {
                $this->nom = $nom;
                return $this;
            }

            public function getSexe()
            {
                return $this->sexe;
            }

            public function setSexe($sexe)
            {
                $this->sexe = $sexe;
                return $this;
            }

            public function getService()
            {
                return $this->service;
            }

            public function setService($service)
            {
                $this->service = $service;
                return $this;
            }

            public function getDateEmbauche()
            {
                return $this->date_embauche;
            }

            public function setDateEmbauche($date){
                $this->date_embauche = $date;
                return $this;
            }

            public function getSalaire()
            {
                return $this->salaire;
            }

            public function setSalaire($salaire)
            {
                $this->salaire = $salaire;
                return $this;
            }
        }
        </code>
    </pre>

    <h2>
        Repository
    </h2>
    <p>Notre entité est faite, nous avons bien la représentante de notre table Employes sur notre application, mais il faut maintenant lui permettre de communiquer avec la base de données, et pour ça, on va utiliser les <code>Repository</code>, ils vont contenir toutes les requêtes SQL necessaires (Le CRUD) pour communiquer avec notre base de données</p>

    <h3>BaseRepository</h3>
    <p>Les repository ont aussi le droit à leur base, qu'est ce qu'on va retrouver de commun entre toutes nos requêtes ? </p>
    <p>
    <details>
        <summary> Requêtes communes </summary>
        <ul>
            <li>findAll() // Nous pouvons sur chacunes de nos tables récupérer tout le contenu</li>
            <li>findById() // Toutes nos tables ont des id, nous pouvons donc récupérer par id peu importe la table visée</li>
            <li>findByAttributes() // Nous pouvons définir les attributs à récupérer selon les cas</li>
            <li>Les Deletes // Toutes les tables peuvent avoir des elements supprimés</li>
        </ul>
    </details>
    </p>
    <pre>
            <code>
                namespace Model\Repository;

                use Model\Database; // On importe Database pour avoir accès à la méthode dbConnect();

                abstract class BaseRepository
                {
                    protected $db_connexion;

                    public function __construct()
                    {
                        $db = new Database();
                        $this->db_connexion = $db->dbConnect();
                    }
                
                    public function findAll($nomDeTable) // Nous aurons juste besoin du nom de la table à viser
                    {
                        $sql = "SELECT * FROM $nomDeTable";
                        
                            $request = $this->db_connexion->query($sql);
    
                            if($request) // la requête retourne un booleen
                            {
                                
                                return $request->fetchAll(PDO::FETCH_ASSOC); // Récupère tous les resultats de la requête (fetchAll) 
                            }   
                            
                            return null; // Si la requête echoue, retourne null
                    }

                public function findById($nomDeTable, $id)
                {
                    $sql = "SELECT * FROM $nomDeTable WHERE id = :id";

                    $request = $this->dbConnexion->prepare($sql);

                    $request->bindValue(':id',$id);

                    try 
                    {
                        $request->execute();

                        if($request)
                        {
                            return $request->fetch($query->fetch(PDO::FETCH_OBJ););
                        }
                        return null;
                        
                    } 
                    catch(\PDOException $e)
                    {
                        error_log($e->getMessage(),0);
                    }
                }
            </code>
        </pre>

    <p>Repository Employes</p>
    <pre>
            <code>
                namespace Model\Repository;

                use Model\Entity\Employes;

                class EmployesRepository extends BaseRepository
                {        
                    // On peut également inclure une méthode dans BaseRepository car toutes les tables peuvent être mises à jour, il faudra élaborer une méthode qui prend en compte tous les paramètres de chaque table
                    
                    public function updateEmployes(Employes $employes) // On prend l'entité employes comme parametre avec toutes ses propriétés
                    {
                         $sql = "INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) 
                                VALUES (:prenom, :nom, :sexe, :service, :date, :salaire)";

                        $request = $this->dbConnexion->prepare($sql);

                        $request->bindValue(':prenom', $employes->getPrenom());
                        $request->bindValue(':nom', $employes->getNom());
                        $request->bindValue(':sexe', $employes->getSexe());
                        $request->bindValue(':service', $employes->getService());
                        $request->bindValue(':date', $employes->getDateEmbauche());
                        $request->bindValue(':salaire', $employes->getSalaire());

                        try {
                            return $request->execute() ? true : false;
                        } catch (\PDOException $e) {
                            error_log($e->getMessage(), 0);
                            echo '<p>Il y a eu un problème lors de l\'insertion.</p>';
                        }
                    }
                }
            </code>
        </pre>

        <p>Controller Employes</p>
        <pre>
            <code>

                namespace Controllers;

                use Models\Entity\Employes;
                use Models\Repository\EmployesRepository;

                class EmployesController
                {
                    public function addEmploye()
                    {
                        // Création d'une instance de l'entité Employes
                        $employe = new Employes();
                        $employe->setPrenom("Alice")
                                ->setNom("Durand")
                                ->setSexe("F")
                                ->setService("Comptabilité")
                                ->setDateEmbauche("2024-11-01")
                                ->setSalaire(2500);

                        // Utilisation du repository pour insérer l'employé
                        $repository = new EmployesRepository();
                        if ($repository->insertEmployes($employe)) {
                            echo "L'employé a été ajouté avec succès.";
                        } else {
                            echo "Erreur lors de l'insertion.";
                        }
                    }
                }

            </code>
        </pre>

        <p>Index à la racine pour lancer le test</p>
        <pre>
            <code>

                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);

                require_once __DIR__ . '/autoload.php';

                use Controllers\EmployesController;

                $controller = new EmployesController();

                // Exécution de la méthode d'ajout
                $controller->addEmploye();

            </code>
        </pre>
    <p>En partant de ce test là, essayez de refaire la même chose pour nos contacts ;)</p>
</body>

</html>