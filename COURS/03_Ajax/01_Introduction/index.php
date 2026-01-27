<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax & PHP</title>
</head>
<body>
    <!-- Requête avec JSON -->
    <h1>Requête Fetch avec JSON</h1>
    <button id="fetchData">Charger les données</button>
    <div id="resultJson"></div>

    <!-- Encodage string -->
    <h1>Encodage avec encodeURIComponent</h1>
    <button id="request">Envoyer la requête</button>
    <div id="resultEncode"></div>

    <!-- ENCODAGE JSON -->

     <h1>Envoi d'un objet JSON encodé</h1>
    <button id="jsonRequest">Envoyer JSON</button>
    <div id="result"></div>

    <script src="request.js"></script>
</body>
</html>