<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système de commentaires</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Système de commentaires</h1>
    <form id="commentForm">
        <label for="pseudo">Pseudo :</label>
        <input type="text" id="pseudo" name="pseudo" />
        <br>
        <br>
        <label for="comment">Commentaire :</label>
        <textarea id="comment" name="comment" ></textarea>
        <br>
        <br>
        <button type="submit">Envoyer</button>
    </form>

    <h2>Commentaires :</h2>
    <div id="comments"></div>

    <script>
        const form = document.getElementById('commentForm');
        const commentsDiv = document.getElementById('comments');

        // Charger les commentaires existants au chargement de la page
        async function getComments() {
            try {
                const response = await fetch('getComments.php');
                const comments = await response.json();
                commentsDiv.innerHTML = '';
                // Pour chaque commentaire on crée une nouvelle div
                comments.forEach(comment => {
                    const commentDiv = document.createElement('div');
                    commentDiv.classList.add('comment');
                    commentDiv.innerHTML = `
                        <p class="pseudo">${comment.pseudo}</p>
                        <p>${comment.comment}</p>
                        <p class="timestamp">${comment.created_at}</p>
                    `;
                    commentsDiv.appendChild(commentDiv);
                });
            } catch (error) {
                console.error('Erreur lors du chargement des commentaires :', error);
            }
        }

        // Envoi du commentaire via fetch
        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            const formData = new FormData(event.target);
            try {
                const response = await fetch('postComment.php', {
                    method: 'POST',
                    body: formData,
                });
                const result = await response.json();
                if (result.success) {
                    // Remettre à zéro le formulaire
                    form.reset();
                    // Mis à jour de l'affichage des commentaires
                    getComments();
                } else {
                    // Récupération du message créé côté back
                    alert(result.message || 'Erreur lors de l\'envoi du commentaire.');
                }
            } catch (error) {
                console.error('Erreur lors de l\'envoi du commentaire :', error);
            }
        });

        // Charger les commentaires dès le premier affichage
        getComments();
    </script>
</body>
</html>
