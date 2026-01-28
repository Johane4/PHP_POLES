<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Contact</title>
</head>
<body>
    <h1>Contactez-nous</h1>
    <form id="contactForm">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" ><br><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" ><br><br>

        <label for="message">Message :</label><br>
        <textarea id="message" name="message" rows="5" ></textarea><br><br>

        <button type="submit">Envoyer</button>
    </form>

    <div id="result"></div>

    <script>
        document.getElementById("contactForm").addEventListener("submit", async (event) => {
            event.preventDefault(); // Empêche le rechargement de la page

            const formData = new FormData(event.target); // Autre manière

            try {
                const response = await fetch("contact.php", {
                    method: "POST",
                    body: formData,
                });

                const result = await response.text();
                document.getElementById("result").innerHTML = result;
            } catch (error) {
                console.error("Erreur au niveau de la requête:", error);
                document.getElementById("result").innerHTML = "Une erreur est survenue.";
            }
        });
    </script>
</body>
</html>