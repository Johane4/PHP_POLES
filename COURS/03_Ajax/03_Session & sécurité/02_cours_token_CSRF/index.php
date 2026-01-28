<?php
require 'csrf.php';
require_once 'database.php';

// Génération du token CSRF
$csrf_token = generateCsrfToken();
var_dump($csrf_token);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire avec CSRF</title>
</head>
<body>
    <h1>Ajoutez un article</h1>

    <!-- Formulaire pour ajouter des articles -->
    <form id="articleForm">
        <input type="text" name="title" placeholder="Titre de l'article" required>
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
        <button type="submit">Ajouter</button>
    </form>

    <h2>Articles</h2>
    <div id="articles"></div>

    <script>
        // Gestion du formulaire avec fetch
        document.getElementById('articleForm').addEventListener('submit', (e) => {
            e.preventDefault(); // Empêche le rechargement de la page
            const formData = new FormData(e.target);

            fetch('./process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Article ajouté !');
                    getArticles(); // Recharge les articles
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Erreur réseau :', error);
                alert('Une erreur est survenue. Réessayez plus tard.');
            });
        });

        // Fonction pour charger les articles
        const getArticles = () => {
            fetch('./process.php')
                .then(response => response.json())
                .then(data => {
                    const articlesDiv = document.getElementById('articles');
                    articlesDiv.innerHTML = '';
                    data.forEach(article => {
                        const div = document.createElement('div');
                        div.textContent = article.title;
                        articlesDiv.appendChild(div);
                    });
                });
        }

        // Chargement initial des articles
        getArticles();
    </script>
</body>
</html>
