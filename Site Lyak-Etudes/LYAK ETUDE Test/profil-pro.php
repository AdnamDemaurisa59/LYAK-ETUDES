<?php
session_start();

// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=Lyak-Etude;charset=utf8', 'root', 'root');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activer le mode exception pour PDO

// Récupération des informations de l'entreprise depuis la base de données
$entreprise_id = $_GET['entreprise_id']; // Assurez-vous que entreprise_id est passé via l'URL
$get_entreprise_info = $bdd->prepare("SELECT * FROM entreprises WHERE entreprise_id = ?");
$get_entreprise_info->execute([$entreprise_id]);
$entreprise_info = $get_entreprise_info->fetch(PDO::FETCH_ASSOC);

// Affichage des informations de l'entreprise
echo "<header>";
echo "<h1>{$entreprise_info['nom']}</h1>";
echo "<p>Secteur d'Activité: {$entreprise_info['secteur_activite']}</p>";
echo "<p>Localisation: {$entreprise_info['localisation']}</p>";
echo "<p>Description: {$entreprise_info['description']}</p>";
echo "</header>";

// Affichage de la section "À Propos de l'Entreprise"
echo "<section class='about'>";
echo "<h2>À Propos de l'Entreprise</h2>";
echo "<p>{$entreprise_info['description']}</p>";
echo "</section>";

// Affichage des offres de poste de l'entreprise
$get_offres = $bdd->prepare("SELECT * FROM offres WHERE entreprise_id = ?");
$get_offres->execute([$entreprise_id]);
$offres = $get_offres->fetchAll(PDO::FETCH_ASSOC);

echo "<section id='Offres'>";
echo "<h1>Offres de Poste</h1>";

echo "<ul class='offres-list'>";
foreach ($offres as $offre) {
    echo "<li>";
    echo "<h2>{$offre['intitule']}</h2>";
    echo "<p>{$offre['description']}</p>";
    echo "<a href=''>Postuler</a>";
    echo "</li>";
}
echo "</ul>";

// Affichage des informations de contact de l'entreprise
echo "<h3>Contact</h3>";
echo "<p>Email: {$entreprise_info['email']}</p>";
echo "<p>Téléphone: {$entreprise_info['telephone']}</p>";

echo "</section>";

// Afficher les erreurs PDO après l'exécution du code
if (isset($bdd) && $bdd->errorCode() != '00000') {
    $errorInfo = $bdd->errorInfo();
    echo "Erreur PDO : " . $errorInfo[2];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de l'Entreprise</title>
    <link rel="stylesheet" href="profil-pro.css">
</head>
<body>

    <nav>
        <a href="index.html">Accueil</a>
        <a href="entreprise.html">Entreprise</a>
        <a href="profil.html">Etudiants</a>
        <a href="rubrique.html">Boite à outil</a>
    </nav>

    <header>
        <h1>Nom de l'Entreprise</h1>
        <p>Secteur d'Activité</p>
        <p>Secteur d'activité: Technologies de l'information</p>
        <p>Localisation: Ville, Pays</p>
        <p>Description: Une brève description de l'entreprise et de ses activités.</p>


        <section class="about">
            <h2>À Propos de l'Entreprise</h2>
            <p>Description de l'entreprise...</p>
        </section>

        <div class="container">

            <h1>Nom de l'Entreprise</h1>
            <p>Secteur d'Activité</p>
        </div>
    </header>

<main> 


    <article>
        <a href="notation-entreprise.html">Notation Stage - Espace Entreprise</a>
        <a href="profil.html">Profil Etudiant</a>
    </article>

    <section id="Offres">
        <h1>Offres de Poste</h1>

        <ul class="offres-list">
            <li>
                <h2>Intitulé du poste 1</h2>
                <p>Description du poste 1.</p>
                <a href="">Postuler</a>
            </li>
            <li>
                <h2>Intitulé du poste 2</h2>
                <p>Description du poste 2.</p>
                <a href="">Postuler</a>
            </li>
            <li>
                <h2>Intitulé du poste 3</h2>
                <p>Description du poste 3</p>
                <a href="">Postuler</a>
            </li>

            <h3>Notation Stage/Alternance</h3>
        <p>Moyenne des notes des étudiants lors des stages et alternances: 4.5/5</p>

        <h3>Contact</h3>
        <p>Email: contact@entreprise.com</p>
        <p>Téléphone: +XX XXX XXX XXX</p>
        </ul>
    </section>
</main>


<section class="contact-entreprise">
    <!-- Bouton pour contacter l'étudiant -->
    <button>Contactez l'entreprise</button>
</section>

    <footer>
        <p>&copy; 2023 LYAK-ETUDES. Tous droits réservés.</p>
        <a href="conditions.html">Conditions Général&nbsp;</a>
        <a href="confidentialite.html">Politique de confidentialite</a>
    </footer>

</body>
</html>