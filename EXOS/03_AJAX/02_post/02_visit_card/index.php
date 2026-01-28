<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte de visite</title>
</head>
<body>
    <h1>Générateur de carte de visite</h1>
    <form id="businessCard">
        <label for="name">Nom Complet :</label>
        <input type="text" id="name" name="name" />
        <br>
        <br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" />
        <br>
        <br>

        <label for="phone">Téléphone :</label>
        <input type="text" id="phone" name="phone" />
        <br>
        <br>

        <label for="job">Poste :</label>
        <input type="text" id="job" name="job" />
        <br>
        <br>

        <label for="logo">Logo :</label>
        <input type="file" id="logo" name="logo" accept="image/*" />
        <!-- accepte toutes les images -->
        <br>
        <br>

        <button type="submit">Générer</button>
    </form>
    <br>
    <br>
    <br>
    <div id="result"></div>

    <script>
        document.getElementById("businessCard").addEventListener("submit", async (event) => {
            event.preventDefault(); // Empêche le rechargement de la page

            // Récupérer les données du formulaire
            const formData = new FormData(event.target);

            try {
                // Envoi des données au serveur
                const response = await fetch("card.php", {
                    method: "POST",
                    body: formData,
                });

                const result = await response.text();
                document.getElementById("result").innerHTML = result;
            } catch (error) {
                document.getElementById("result").innerText = "Une erreur s'est produite.";
                console.error("Erreur :", error);
            }
        });
    </script>
</body>
</html>
