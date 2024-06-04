
const offres = [
    { name: 'Stage developpeur front-end', url: 'https://www.hellowork.com/fr-fr/emplois/46760950.html' },
    { name: 'Stage developpeur back-end' },
    { name: 'Stage developpeur full-stack' },
    { name: 'Stage Ui Design' },
    { name: 'Stage Ux Design' },
    { name: 'Stage Product Designer' },
    { name: 'Stage Cadreur' },
    { name: 'Stage Cadreuse' },
    { name: 'Stage Chargé/Chargée de production.'},
    { name: 'Stage Product Owner' },
    { name: 'Stage Product Manager' },
    { name: 'Stage Architecte' },
    { name: 'Stage Architecte Interieur' },
    { name: 'Stage Ingénieur cybersécurité' },
    { name: 'Stage Architecte Cybersécurité' },
    { name: 'Stage Graphiste' },
    { name: 'Stage Game Designer' },
    { name: 'Stage Chargé/Chargée d"études en marketing' },
    { name: 'Stage Chef/Cheffe de produit marketing.' },
    { name: 'Stage Data manager' },
    { name: 'Stage Chargé/Chargée d"études média' },

    { name: 'Alternance developpeur front-end' },
    { name: 'Alternance developpeur back-end' },
    { name: 'Alternance developpeur full-stack' },
    { name: 'Alternance Ui Design' },
    { name: 'Alternance Ux Design' },
    { name: 'Alternance Product Designer' },
    { name: 'Alternance Cadreur' },
    { name: 'Alternance Cadreuse' },
    { name: 'Alternance Chargé/Chargée de production.'},
    { name: 'Alternance Product Owner' },
    { name: 'Alternance Product Manager' },
    { name: 'Alternance Architecte' },
    { name: 'Alternance Architecte Interieur' },
    { name: 'Alternance Ingénieur cybersécurité' },
    { name: 'Alternance Architecte Cybersécurité' },
    { name: 'Alternance Graphiste' },
    { name: 'Alternance Game Designer' },
    { name: 'Alternance Chargé/Chargée d"études en marketing' },
    { name: 'Alternance Chef/Cheffe de produit marketing.' },
    { name: 'Alternance Data manager' },
    { name: 'Alternance Chargé/Chargée d"études média' }
];


const searchInput = document.getElementById('searchInput');
const suggestions = document.getElementById('suggestions');
const searchIcon = document.querySelector('.icon-loupe');




searchInput.addEventListener('keyup', function() {
    const input = searchInput.value.toLowerCase();

    const result = offres.filter(items => items.name.toLowerCase().includes(input));

    let suggestions = '';
    

    if(input !== '') {
        result.forEach(resultItem => {
            suggestions += `<div class="suggestions" onclick="insertSuggestion('${resultItem.name}')">${resultItem.name}</div>`;
        });
    }
    
    document.getElementById('suggestions').innerHTML = suggestions;

    suggestions.innerHTML = suggestionsList;

});

searchInput.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        redirectToOfferPage();
    }
});

searchIcon.addEventListener('click', function() {
    redirectToOfferPage();
});

function redirectToOfferPage() {
    const selectedSuggestion = offres.find(offre => offre.name === searchInput.value);
    if (selectedSuggestion && selectedSuggestion.url) {
        window.open(selectedSuggestion.url, '_blank');
    }
}

function insertSuggestion(suggestion, url) {
    searchInput.value = suggestion;
    suggestions.innerHTML = '';
}


