
document.getElementById('creerGroupeBtn').addEventListener('click', function(event) {
    event.preventDefault();
    // Logique de création de groupe
    var nomGroupe = prompt('Entrez le nom du nouveau groupe :');
    var description = prompt('Entrez la description du nouveau groupe :');

    if (nomGroupe && description) {
        var nouveauGroupe = document.createElement('div');
        nouveauGroupe.className = 'groupe';

        var titre = document.createElement('h2');
        titre.textContent = nomGroupe;
        nouveauGroupe.appendChild(titre);

        var paragraphe = document.createElement('p');
        paragraphe.textContent = description;
        nouveauGroupe.appendChild(paragraphe);

        var bouton = document.createElement('button');
        bouton.textContent = 'Rejoindre le Groupe';
        bouton.onclick = function() {
            rejoindreGroupe(nomGroupe);
        };
        nouveauGroupe.appendChild(bouton);

        document.getElementById('groupes').appendChild(nouveauGroupe);
    }
});

function rejoindreGroupe(nomGroupe) {
    // Affiche les détails du groupe
    alert("Vous avez rejoint le groupe : " + nomGroupe);
}