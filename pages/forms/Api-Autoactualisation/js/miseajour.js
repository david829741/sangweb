function executeQuery() {
    // Effectuer une requête fetch vers le script PHP
    fetch("pages/forms/Api-Autoactualisation/APIweb/miseajour.php")
    .then(response => {
        // Gérer la réponse du script PHP si nécessaire
        console.log("Requête exécutée avec succès !");
    })
    .catch(error => {
        // Gérer les erreurs de la requête si nécessaire
        console.error("Erreur lors de l'exécution de la requête :", error);
    });
}

// Fonction pour mettre à jour le champ "temp" avec le temps restant
function updateTempField() {
    var now = new Date();
    var timeUntil1035AM = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 0, 0, 0) - now;

    // Convertir le temps restant en heures, minutes et secondes
    var hours = Math.floor(timeUntil1035AM / (1000 * 60 * 60));
    var minutes = Math.floor((timeUntil1035AM % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((timeUntil1035AM % (1000 * 60)) / 1000);

    // Mettre à jour le champ "temp" avec le temps restant
    document.getElementById("temp").innerHTML = hours + "h " + minutes + "m " + seconds + "s";

    // Mettre à jour le champ toutes les secondes
    setTimeout(updateTempField, 1000);
}

// Appeler la fonction pour mettre à jour le champ "temp" initialement
updateTempField();

// Retarder l'exécution jusqu'à 10h35
setTimeout(function() {
    // Exécuter la requête à 11h et répéter toutes les 24 heures
    executeQuery();
    setInterval(executeQuery, 24 * 60 * 60 * 1000);
}, timeUntil11AM);