<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion utilisateur</title>
</head>
<body>
    <h1>Connexion</h1>
    <form id="loginForm">
        <input type="text" id="name" name="name" placeholder="Nom d'utilisateur" >
        <input type="password" id="password" name="password" placeholder="Mot de passe" >
        <button type="submit">Se connecter</button>
    </form>
    <p id="message"></p>

    <script>
        const form = document.getElementById('loginForm');
        const message = document.getElementById('message');

        // Gérer l'envoi du formulaire via AJAX
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(event.target);

            const response = await fetch('login.php', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();

            if (result.success) {
                message.textContent = `Bienvenue, ${result.name}!`;
            } else {
                message.textContent = result.message;
            }
        });
    </script>
</body>
</html>
