document.addEventListener("DOMContentLoaded", function () {
    const nombreDeCentresElement = document.getElementById("part2");
  
    function mettreAJourNombreCentres() {
      // Faites ici une requête AJAX pour obtenir le nombre de centres depuis le serveur
      // et mettez à jour le texte dans l'élément HTML
      const xhr = new XMLHttpRequest();
      xhr.open("GET", "pages/forms/Api-Autoactualisation/APIweb/participant2.php", true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
          const nombreCentres = xhr.responseText;
          nombreDeCentresElement.textContent = `${nombreCentres}`;
        }
      };
      xhr.send();
    }
  
    mettreAJourNombreCentres(); // Mettre à jour immédiatement
  
    // Mettre à jour toutes les 10 secondes
    setInterval(mettreAJourNombreCentres, 1000);
  });