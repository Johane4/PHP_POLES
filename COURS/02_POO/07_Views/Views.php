<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Views</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container">
        <div class="header-img">
            <img src="./img/logo_poleS.png" alt="poleS logo">
        </div>

        <h1>Views</h1>
        <p>La vue est l'interface sur laquelle les données vont être affichées, qu'il y ait ou non besoin de la BDD. Elle affichera du simple HTML aux données utilisateurs.</p>

        <pre>
            <code>
&lt?php echo "&ltdiv&gt &lth2&gt Bonjour, il n'y a aucune données ici, j'affiche simplement du HTML &lt/h2&gt &lt/div&gt" ?&gt
            </code>
        </pre>

        <hr>
        <h2>Récupération des données</h2>
        <p>En revanche, si le contrôleur envoie des données à la vue, nous pouvons les utiliser pour les afficher.</p>

        <p>Exemple : Supposons que nous ayons récupéré la liste des utilisateurs de l'application.</p>

        <pre>
            <code>
// Dans le contrôleur

class NomController {

    // code de récupération des utilisateurs dans la BDD
    $users = $userRepository->findAll();

    // On retourne la vue avec les paramètres, la vue a donc accès à ces paramètres
    return $this->render('vue.html.php', [
        'utilisateurs' => $users
    ]);
}
            </code>
        </pre>

        <pre>
            <code>
// Dans la vue

&ltul&gt
    &lt?php foreach($utilisateurs as $user): ?&gt
        &ltli&gt &lt?php echo htmlspecialchars($user['nom']); ?&gt &lt/li&gt
    &lt?php endforeach; ?&gt
&lt/ul&gt
            </code>
        </pre>
    </div>

</body>

</html>
