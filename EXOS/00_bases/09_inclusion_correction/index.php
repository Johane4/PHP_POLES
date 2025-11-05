<?php


/* J'inclus le config ici, le footer et le header vont hériter automatiquement des constantes
Header et footer étant considérés comme étant des éléments enfants et index comme un fichier parent !
*/
require 'config/config.php';

// Le fichier peut être inclus plusieurs fois ou lorsque son absence n'empêche pas l'exécution du script
include 'includes/header.php';



echo "<h2>Page d'accueil de " . SITE_NAME . "</h2>";
echo "<p>Version: " . SITE_VERSION . "</p>";


// Le fichier peut être inclus plusieurs fois ou lorsque son absence n'empêche pas l'exécution du script
include 'includes/footer.php';
