document.querySelector("#loading").addEventListener("click", async function () {
  try {
    const response = await fetch("artists.php");
    const artists = await response.json();
    const artistsList = document.querySelector("#artists");
    artists.map((art) => {
      const li = document.createElement("li");
      li.innerHTML = "";
      li.innerHTML = art;
      artistsList.appendChild(li);
    });
  } catch (error) {
    console.error("Erreur:", error);
  }
});
