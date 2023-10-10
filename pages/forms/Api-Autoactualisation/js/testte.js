// Fonction pour envoyer une requête POST
function sendPostRequest(url, data) {
    return fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: data
    })
    .then(response => {
        if (response.ok) {
            return response.text();
        } else {
            throw new Error('Erreur lors de la requête : ' + response.status);
        }
    })
    .then(responseText => {
        console.log(responseText);
    })
    .catch(error => {
        console.error('Erreur lors de la requête :', error);
    });
}

// Fonction pour gérer le clic sur le bouton
function handleClick() {
    // Valeur de la clé unique
    var keyUnique = 'e80b42f9b354db7da4e5a6939bd24673';

    // URL du script PHP
    var url = 'pages/forms/Api-Autoactualisation/APIweb/reporogram.php';

    // Données à envoyer dans la requête POST
    var data = 'keyunique=' + keyUnique;

    // Envoi de la requête POST
    sendPostRequest(url, data);
}

// Ajout d'un gestionnaire d'événement au clic sur le bouton
document.getElementById('ff').addEventListener('click', handleClick);