<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO en PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="header-img">
        <img src="./img/logo_poleS.png" alt="Logo PoleS">
    </div>

    <h1>1. Les classes</h1>
    <p>Une classe est une structure qui définit un objet, c'est le modèle à partir duquel des objets (instances) sont créés.</p>
    <p>On la déclare avec le mot-clé <code>class</code>.</p>

    <pre><code>class Personne {
}</code></pre>
    <hr>

    <h2>2. Les propriétés</h2>
    <p>Les propriétés sont des variables définies dans une classe, elles représentent les caractéristiques ou attributs de l'objet.</p>

    <pre><code>class Personne {
    public $nom;
    public $age;
}</code></pre>
    <hr>

    <h2>3. Les méthodes</h2>
    <p>Les méthodes sont des fonctions définies à l'intérieur d'une classe, elles représentent les actions ou comportements que l'objet peut effectuer.</p>

    <pre><code>class Personne {
    public $nom;
    public $age;

    public function parler() {
        echo "Bonjour, je m'appelle " . $this->nom;
    }

    
}</code></pre>
    <hr>

    <h2>4. Visibilité (public, private, protected)</h2>
    <p>La visibilité détermine comment les propriétés et méthodes peuvent être accessibles à l'extérieur de la classe.</p>

    <ul>
        <li><code>public</code> : Accessible de n'importe où (à l'intérieur et à l'extérieur de la classe). Données publiques et non sensibles</li>
        <li><code>private</code> : Accessible uniquement dans la classe à laquelle elle appartient. Données sensibles et privées</li>
        <li><code>protected</code> : Accessible dans la classe à laquelle elle appartient ainsi que dans ses classes héritées. Données à moitié privées</li>
    </ul>

    <pre><code>class Personne {
    public $nom;
    private $age;
    protected $adresse;
}</code></pre>
    <hr>

    <h2>5. Le constructeur</h2>
    <p>Le constructeur est une méthode spéciale qui est automatiquement appelée lors de la création d'un objet, il est souvent utilisé pour initialiser les propriétés de l'objet.</p>

    <pre><code>class Personne {
    public $nom;
    public $age;

    public function __construct($nom, $age) {
        $this->nom = $nom;
        $this->age = $age;
    }
}

$personne = new Personne('Alice', 30); // Instanciation de classe</code></pre>
    <hr>

    <h2>6. <code>$this</code></h2>
    <p>Le mot-clé <code>$this</code> fait référence à l'objet actuel dans lequel le code est en train de s'exécuter. Il est utilisé pour accéder aux propriétés et méthodes de l'objet actuel.</p>

    <pre><code>class Personne {
    public $nom;

    public function afficherNom() {
        echo $this->nom;
    }
}</code></pre>
    <hr>

    <h2>7. Héritage</h2>
    <p>L'héritage permet à une classe (classe fille) d'avoir accès aux méthodes de sa classe parente (classe mère). Elle héritera de ses propriétés et méthodes (public et protected).</p>

    <p>On l'utilise de la manière suivante : <code>class Fille extends Mere</code>.</p>

    <pre><code>class Employe extends Personne {
    public $salaire;

    public function afficherSalaire() {
        echo $this->nom . " touche " . $this->salaire . " € en salaire";
    }
}</code></pre>
    <hr>

    <h2>8 . <code>parent::</code></h2>

    <p>Le mot clé parent est utilisé pour faire référence directement à la classe parente et accéder aux méthodes ou propriétés de cette classe</p>

    <p>Syntaxe de parent : parent::nomDeLaMethode();</p>
    <p>parent::nomDeLaPropriété;</p>

    <pre><code>class Personne{
        public $nom;

        public function __construct($nom){
        $this->nom = $nom;
        }

        public function jeSuis(){
        echo "Je suis une personne, $this->nom,";
        }
    }

    class Eleve extends Personne{

    public function __construct($nom){
    parent::__construct($nom); // On appelle le constructeur de la classe parente
    }

    public function jeSuis(){
    parent::jeSuis();

    echo "Je suis un élève et mon nom est $this->nom";

    // On passe à la propriété $nom de la classe parente la valeur passée lors de la création de l'objet new Eleve('jeremy');
    }
}

    $eleve1 = new Eleve("Jeremy");
    $eleve1->jeSuis();

    <?php

    class Personne
    {
        public $nom;
        private static $clickCount = 0;

        public function __construct($nom)
        {
            $this->nom = $nom;
            self::$clickCount++;
        }

        public function jeSuis()
        {
            echo "Je m'appelle: $this->nom. <br />";
        }

        public static function getClickCount()
        {
            return "On a créé " . self::$clickCount . " personne(s). <br />";
        }
    }

    $people = new Personne("Henry");
    $people->jeSuis();
    echo Personne::getClickCount();

    $people1 = new Personne("Jacques");
    $people1->jeSuis();

    echo Personne::getClickCount();

    ?>

    </code></pre>

    <hr>

    <h2>8. Polymorphisme</h2>
    <p>Le polymorphisme permet à des objets de classes différentes d'être traités de manière interchangeable, à condition qu'ils partagent une interface ou héritent d'une même classe parente.</p>

    <pre><code>class Personne {
    public function sePresenter() {
        echo "Je suis une personne.";
    }
}

class Employe extends Personne {
    public function sePresenter() {
        echo "Je suis un employé.";
    }
}

<?php
// class Personne {
//     public function sePresenter() {
//         echo "Je suis une personne.<br />";
//     }
// }

// class Employe extends Personne {
//     public function sePresenter() {
//         echo "Je suis un employé.<br />";
//     }
// }

// $personnes = [new Personne(), new Employe()];

// foreach ($personnes as $personne) {
//     $personne->sePresenter(); // Appellera la méthode appropriée selon l'objet
// }

// $personne = new Personne();
// $employe = new Employe();

// $personne->sePresenter();
// $employe->sePresenter();
?>

$personnes = [new Personne(), new Employe()];

foreach ($personnes as $personne) {
    $personne->sePresenter(); // Appellera la méthode appropriée selon l'objet
}</code></pre>
    <hr>

    <h2>9. Encapsulation</h2>
    <p>L'encapsulation est le concept de restreindre l'accès direct aux propriétés d'un objet, en utilisant des méthodes publiques pour manipuler ces propriétés.</p>

    <pre><code>class CompteBancaire {
    private $solde = 0;

    public function deposer($montant) {
        $this->solde += $montant;
    }

    public function afficherSolde() {
        return $this->solde;
    }
}</code></pre>

    <hr>
    <h2>10. Méthodes et propriétés statiques</h2>
    <p>Une méthode ou propriété statique est un élément qui n'a pas besoin que la classe à laquelle il appartient soit instanciée. On les appelle directement de la manière suivante : <code>Class::methodeStatique</code>, <code>Class::proprieteStatique</code>.</p>

    <p>Elles offrent plusieurs avantages :</p>
    <ul>
        <li>Il n'est pas nécessaire d'instancier leur classe pour les utiliser.</li>
        <li>Elles peuvent être utilisées pour stocker des données qui doivent être accessibles à partir de n'importe quel endroit du programme. Exemple : un compteur d'incrémentation pour un bouton.</li>
    </ul>

    <p>On appelle la propriété ou la méthode statique dans la classe avec <code>self::</code> et non avec <code>$this-&gt;</code>.</p>

    <pre><code>
class Button {
    // Propriété statique pour compter les clics
    private static $clickCount = 0;

    // Méthode pour cliquer sur le bouton
    public function click() {
        self::$clickCount++;
    }

    // Méthode statique pour récupérer le nombre total de clics
    public static function getClickCount() {
        return self::$clickCount;
    }
}

// Création de plusieurs instances de Button
$button1 = new Button();
$button2 = new Button();
$button3 = new Button();

// Simulation de clics sur les boutons
$button1->click();
$button2->click();
$button3->click();
$button3->click();

// Récupération du nombre total de clics
echo "Nombre total de clics : " . Button::getClickCount(); // Affiche 4

<?php
class Button
{
    // Propriété statique pour compter les clics
    private static $clickCount = 0;

    // Méthode pour cliquer sur le bouton
    public function click()
    {
        self::$clickCount++;
    }

    // Méthode statique pour récupérer le nombre total de clics
    public static function getClickCount()
    {
        return self::$clickCount;
    }
}

// Création de plusieurs instances de Button
$button1 = new Button();
$button2 = new Button();
$button3 = new Button();

// Simulation de clics sur les boutons
$button1->click();
$button2->click();
$button3->click();
$button3->click();

// Récupération du nombre total de clics
echo "Nombre total de clics : " . Button::getClickCount(); // Affiche 4
?>

</code></pre>

    <p>Important : Toutes les instances de la classe Button partagent la même propriété statique <code>$clickCount</code>, ce qui signifie que chaque clic sur un bouton incrémente ce compteur partagé.</p>


</body>

</html>