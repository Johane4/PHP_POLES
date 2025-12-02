<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTAccess</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="header-img">
        <img src="./img/logo_poleS.png" alt="logo PoleS">
    </div>
    <h1>HTAccess</h1>
    <p>Le fichier <code>.htaccess</code> (hypertext access) est un fichier de configuration utilisé par les serveurs web Apache pour gérer divers aspects du fonctionnement d'un site web. Il permet de contrôler des paramètres sans avoir accès à la configuration principale du serveur.</p>
    <p>Ce fichier est placé dans le répertoire racine du site ou dans un sous-répertoire pour appliquer des règles spécifiques à cette partie du site.</p>
    <p>Les directives définies dans un fichier <code>.htaccess</code> s'appliquent au répertoire dans lequel il se trouve et à tous ses sous-répertoires, sauf si un autre fichier <code>.htaccess</code> dans un sous-répertoire redéfinit ces règles.</p>

    <hr>
    <h2>1 . Configuration de base</h2>
    <p>1.1 <code>mod_rewrite</code></p>
    <p>Pour que le serveur Apache reconnaisse et exécute les directives d'un fichier <code>.htaccess</code>, il faut s'assurer que le module <code>mod_rewrite</code> est activé sur le serveur Apache.</p>
    <p>Sur un serveur local, cela peut généralement être fait via le fichier de configuration d'Apache (par exemple <code>xampp/apache/conf/httpd.conf</code> ou <code>apache2.conf</code>). Vérifiez la ligne : <code>'LoadModule rewrite_module modules/mod_rewrite.so'</code>. Si elle est commentée avec <code>#</code>, supprimez le <code>#</code> et redémarrez le serveur Apache.</p>

    <hr>
    <h2>2 . Créer un fichier .htaccess</h2>
    <p>Placez le fichier <code>.htaccess</code> dans le répertoire racine du projet.</p>

    <hr>
    <h2>3 . Configurer les règles de réécriture</h2>
    <p>3.1 Réécriture d'une URL simple</p>
    <p>Par exemple, transformer une URL de la forme <code>site.com/page.php?paramètre1=valeur1</code> en <code>site.com/paramètre1/valeur1</code>.</p>

    <h3>Configuration :</h3>
    <pre><code>
RewriteEngine On
// On active le moteur de réécriture

// On va exclure tous les fichiers du répertoire assets de la réécriture
RewriteCond %{REQUEST_URI} ^/public/ [OR]
// Vérifie si l'URL demandée commence par /public/, le [OR] indique que cette condition est une condition alternative (OU)

RewriteCond %{REQUEST_FILENAME} -f [OR]
// Vérifie si le fichier demandé existe (-f pour fichier existant)

RewriteCond %{REQUEST_FILENAME} -d
// Vérifie si le répertoire demandé existe (-d pour répertoire existant)

RewriteRule ^ - [L]
// Si l'une des conditions est vraie, cette règle est appliquée. Le - signifie pas de réécriture (URL laissée telle quelle). [L] indique que c'est la dernière règle à appliquer si elle correspond.
    
RewriteRule ^404$ errors/404.php
// Redirige vers errors/404.php pour les erreurs 404.
    </code></pre>

    <hr>
    <h3>Règles de réécriture pour le cas d'un admin :</h3>
    <pre><code>
RewriteRule ^admin/?$ index.php?doc=admin [L,QSA]
// Réécrit /admin ou /admin/ en index.php?doc=admin

RewriteRule ^admin/(\w+)/?$ index.php?doc=admin&controller=$1 [L,QSA]
// Réécrit /admin/controller ou /admin/controller/ en index.php?doc=admin&controller=controller

RewriteRule ^admin/(\w+)/(\w+)$ index.php?doc=admin&controller=$1&method=$2 [L,QSA]
// Réécrit /admin/controller/method en index.php?doc=admin&controller=controller&method=method

RewriteRule ^admin/(\w+)/(\w+)/(\S+)$ index.php?doc=admin&controller=$1&method=$2&id=$3 [L,QSA]
// Réécrit /admin/controller/method/id en index.php?doc=admin&controller=controller&method=method&id=id
    </code></pre>

    <hr>
    <p>Réécriture pour la page d'accueil :</p>
    <pre><code>
RewriteRule ^$ index.php [L]
// Réécrit la racine du site '/' en index.php
    </code></pre>

     <hr>
    <p>Réécriture pour plusieurs fichiers:</p>
    <pre><code>
RewriteRule ^about/$ about.php?action=about [L,QSA]
RewriteRule ^contact/$ contact.php?action=contact [L,QSA]
// Réécrit about.php?action=about en /about
// Réécrit contact.php?action=contact en /contact
    </code></pre>

    <hr>
    <h3>Réécriture pour les URLs non admin :</h3>
    <pre><code>
RewriteRule ^(\w+)/?$ index.php?controller=$1 [L,QSA]
// Réécrit /controller/ en index.php?controller=controller

RewriteRule ^(\w+)/(\w+)$ index.php?controller=$1&method=$2 [L,QSA]
// Réécrit /controller/method en index.php?controller=controller&method=method

RewriteRule ^(\w+)/(\w+)/(\S+)$ index.php?controller=$1&method=$2&id=$3 [L,QSA]
// Réécrit /controller/method/id en index.php?controller=controller&method=method&id=id
    </code></pre>

</body>

</html>
