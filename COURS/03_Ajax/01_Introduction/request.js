// Requête simple fetch - AFFICHAGE DU ECHO

fetch("request.php")
  .then((response) => response.text()) // Traite la réponse comme du texte
  .then((data) => {
    console.log(data); // Affiche la réponse dans la console
    document.getElementById("result").innerHTML = data; // Met à jour la page
  })
  .catch((error) => console.error("Erreur:", error)); // Gestion des erreurs

// Requête asynchrone - AFFICHAGE DU ECHO

async function getData() {
  try {
    const response = await fetch("request.php"); // Requête HTTP
    const data = await response.text(); // Récupère les données
    document.getElementById("result").innerHTML = data; // Met à jour la page
  } catch (error) {
    console.error("Erreur:", error); // Gestion des erreurs
  }
}

getData();

// REQUÊTE JSON - BONNE PRATIQUE A AVOIR
document.getElementById("fetchData").addEventListener("click", () => {
  fetch("json.php")
    .then((response) => {
      if (!response.ok) {
        throw new Error(`Erreur HTTP : ${response.status}`);
      }
      return response.json(); // On parse la réponse en JSON
    })
    .then((data) => {
      console.log(data); // Affiche le JSON dans la console

      // Affiche les données formatées dans la page
      const resultDiv = document.getElementById("resultJson");
      resultDiv.innerHTML = `
                <ul>
                    ${data
                      .map((item) => `<li>${item.name} - ${item.email}</li>`)
                      .join("")}
                </ul>`;
    })
    .catch((error) => console.error("Erreur:", error)); // Gestion des erreurs
});

// ENCODAGE STRING

document.getElementById("request").addEventListener("click", () => {
  const name = encodeURIComponent("Jean Dupont");
  const email = encodeURIComponent("jean.dupont@example.com");

  fetch(
    `/PHP_POLES/COURS/03_Ajax/01_Introduction/request.php?name=${name}&email=${email}`,
  )
    .then((response) => response.text()) // Attente d'une réponse texte
    .then((data) => {
      document.getElementById("resultEncode").textContent = data; // Affiche la réponse
    })
    .catch((error) => console.error("Erreur :", error)); // Gestion des erreurs
});
