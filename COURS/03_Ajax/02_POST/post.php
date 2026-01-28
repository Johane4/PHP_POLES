<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST avec Ajax et PHP</title>
</head>
<body>
    <!-- ENVOI DE DONNÉES SIMPLES -->
    <h2>Exemple de requête POST avec Fetch</h2>
    <button id="sendData">Envoyer les données</button>
    <div id="result"></div>

    <script>
        document.getElementById("sendData").addEventListener("click", () => {
            fetch("process.php", {
                method: "POST", // Méthode POST
                body: "name=Thierry&email=thierry@email.com", // Données à envoyer
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded", // Type des données envoyées
                },
            })
                .then((response) => response.text()) // Lire la réponse en texte brut
                .then((data) => {
                    console.log(data); // Afficher la réponse dans la console
                    document.getElementById("result").innerHTML = data; // Mettre à jour la page
                })
                .catch((error) => console.error("Erreur :", error)); // Gestion des erreurs
        });
    </script>

    <!-- ENVOI DE DONNÉES JSON -->
     <h2>Envoi de données JSON avec Fetch</h2>
    <button id="sendjson">Envoyer les données</button>
    <div id="response"></div>

    <script>
        document.getElementById("sendjson").addEventListener("click", () => {
            fetch("server.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json", // Indique que le corps contient du JSON
                },
                body: JSON.stringify({
                    name: "Thierry",
                    email: "thierry@email.com"
                }), // Conversion en JSON
            })
                .then((response) => response.text()) // Lire la réponse comme texte
                .then((data) => {
                    console.log(data); // Affiche la réponse dans la console
                    document.getElementById("response").innerHTML = data; // Affiche la réponse sur la page
                })
                .catch((error) => console.error("Erreur :", error)); // Gestion des erreurs
        });
    </script>

    <!-- ENVOI DE DONNÉES AVEC FORMDATA -->
     <h2>Envoi de données avec FormData</h2>
    <form id="uploadForm">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="file">Photo de profil :</label>
        <input type="file" id="file" name="file" accept="image/*" required><br><br>

        <button type="submit">Envoyer</button>
    </form>

    <div id="resultForm"></div>

    <script>
        // Gère l'événement de soumission du formulaire
        document.getElementById("uploadForm").addEventListener("submit", async (event) => {
            event.preventDefault(); // Empêche le rechargement de la page

            const formData = new FormData();
            formData.append("name", document.getElementById("name").value); // Ajoute le nom
            formData.append("profilePhoto", document.getElementById("file").files[0]); // Ajoute le fichier

            try {
                const response = await fetch("upload.php", {
                    method: "POST",
                    body: formData, // FormData est envoyé directement
                });

                const result = await response.text(); // Lit la réponse comme texte
                document.getElementById("resultForm").innerHTML = result; // Affiche le résultat
            } catch (error) {
                console.error("Erreur :", error);
                document.getElementById("result").innerHTML = "Une erreur est survenue.";
            }
        });
        </script>
</body>
</html>