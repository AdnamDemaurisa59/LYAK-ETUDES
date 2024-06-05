
const offres = [
    { name: 'Stage developpeur front-end', url: 'https://www.hellowork.com/fr-fr/emplois/46760950.html' },
    { name: 'Stage developpeur back-end', url: 'https://www.welcometothejungle.com/fr/companies/sociabble/jobs/developpeur-developpeuse-web-c-stage_lyon_SOCIA_Ro8mLz' },
    { name: 'Stage developpeur full-stack', url: 'https://www.welcometothejungle.com/fr/companies/citalid-cybersecurite-1/jobs/stage-developpeur-full-stack_paris_CITAL_4oQ1Ye8' },
    { name: 'Stage Ui Design', url: 'https://www.welcometothejungle.com/fr/companies/groupe-tf1/jobs/stage-ux-ui-designer-f-h_boulogne-billancourt_GT_rNlwRkO' },
    { name: 'Stage Ux Design', url: 'https://www.hellowork.com/fr-fr/emplois/48383259.html' },
    { name: 'Stage Product Designer', url:'https://www.hellowork.com/fr-fr/emplois/48262400.html' },
    { name: 'Stage Cadreur', url:'https://www.hellowork.com/fr-fr/emplois/51154094.html' },
    { name: 'Stage Cadreuse', url:'https://www.hellowork.com/fr-fr/emplois/51154094.html' },
    { name: 'Stage Chargé/Chargée de production', url:'https://www.hellowork.com/fr-fr/emplois/50542130.html'},
    { name: 'Stage Product Owner', url:'https://www.hellowork.com/fr-fr/emplois/50896224.html' },
    { name: 'Stage Product Manager', url:'https://www.hellowork.com/fr-fr/emplois/50895922.html' },
    { name: 'Stage Architecte', url:'https://www.hellowork.com/fr-fr/emplois/49984523.html' },
    { name: 'Stage Architecte Interieur', url:'https://www.hellowork.com/fr-fr/emplois/50385800.html' },
    { name: 'Stage Ingénieur cybersécurité', url:'https://www.hellowork.com/fr-fr/emplois/51080438.html' },
    { name: 'Stage Architecte Cybersécurité', url:'https://www.hellowork.com/fr-fr/emplois/51135831.html' },
    { name: 'Stage Graphiste', url:'https://www.hellowork.com/fr-fr/emplois/50932466.html' },
    { name: 'Stage Chargé/Chargée d"études en marketing', url:'https://www.hellowork.com/fr-fr/emplois/48410287.html' },
    { name: 'Stage Chef/Cheffe de produit marketing', url:'https://www.hellowork.com/fr-fr/emplois/51323301.html' },
    { name: 'Stage Data manager', url:'https://www.hellowork.com/fr-fr/emplois/49678460.html' },
    { name: 'Stage Chargé/Chargée d"études média', url:'https://www.hellowork.com/fr-fr/emplois/50900711.html' },

    { name: 'Alternance developpeur front-end', url:'https://www.hellowork.com/fr-fr/emplois/51181640.html' },
    { name: 'Alternance developpeur back-end', url:'https://www.welcometothejungle.com/fr/companies/sopra-banking/jobs/alternance-back-end-developper-sbs-paris_courbevoie' },
    { name: 'Alternance developpeur full-stack', url:'https://www.hellowork.com/fr-fr/emplois/47238986.html' },
    { name: 'Alternance Ui Design', url:'https://www.hellowork.com/fr-fr/emplois/49623248.html' },
    { name: 'Alternance Ux Design', url:'https://www.hellowork.com/fr-fr/emplois/50967213.html' },
    { name: 'Alternance Product Designer', url: 'https://www.hellowork.com/fr-fr/emplois/50984214.html' },
    { name: 'Alternance Technicien Audiovisuel', url:'https://www.hellowork.com/fr-fr/emplois/50896066.html' },
    { name: 'Alternance Chargé Multimédia - Audiovisuel ', url:'https://www.hellowork.com/fr-fr/emplois/49267043.html' },
    { name: 'Alternance Chargé/Chargée de production Evenementiel', url:'https://www.hellowork.com/fr-fr/emplois/48548300.html'},
    { name: 'Alternance Product Owner', url:'https://www.hellowork.com/fr-fr/emplois/48155151.html' },
    { name: 'Alternance Product Manager', url: 'https://www.welcometothejungle.com/fr/companies/mobile-club/jobs/product-manager-stage-alternance_paris'},
    { name: 'Alternance Architecte', url:'https://www.hellowork.com/fr-fr/emplois/45643713.html' },
    { name: 'Alternance Infographiste 3D', url:'https://www.hellowork.com/fr-fr/emplois/51094477.html' },
    { name: 'Alternance Ingénieur cybersécurité', url:'https://www.hellowork.com/fr-fr/emplois/49103550.html' },
    { name: 'Alternance Architecte Cybersécurité', url:'https://www.hellowork.com/fr-fr/emplois/49355156.html' },
    { name: 'Alternance Graphiste', url:'https://www.hellowork.com/fr-fr/emplois/51017314.html' },
    { name: 'Alternance Chargé/Chargée d"études en marketing', url:'https://www.hellowork.com/fr-fr/emplois/51108144.html' },
    { name: 'Alternance Chef/Cheffe de produit marketing', url:'https://www.hellowork.com/fr-fr/emplois/51038614.html' },
    { name: 'Alternance Data manager', url:'https://www.hellowork.com/fr-fr/emplois/51093258.html'},
    { name: 'Alternance Chargé/Chargée d"études Commerciales', url:'https://www.hellowork.com/fr-fr/emplois/48611974.html' }
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


