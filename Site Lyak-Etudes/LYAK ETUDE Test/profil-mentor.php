<?php
session_start();

// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=Lyak-Etude;charset=utf8', 'root', 'root');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activer le mode exception pour PDO

// Récupération des informations du mentor depuis la base de données
$mentor_id = $_GET['mentor_id']; // Assurez-vous que mentor_id est passé via l'URL
$get_mentor_info = $bdd->prepare("SELECT * FROM mentors WHERE mentor_id = ?");
$get_mentor_info->execute([$mentor_id]);
$mentor_info = $get_mentor_info->fetch(PDO::FETCH_ASSOC);

// Affichage des informations du mentor
echo "<div class='profile-details'>";
echo "<h2>{$mentor_info['nom']} {$mentor_info['prenom']}</h2>";
echo "<p>Domaine d'expertise : <span>{$mentor_info['domaine_expertise']}</span></p>";
echo "<p>Expérience professionnelle : <span>{$mentor_info['experience']} ans</span></p>";
echo "<p>Compétences : <span>{$mentor_info['competences']}</span></p>";
echo "<p>Description du mentor :</p>";
echo "<p>{$mentor_info['description']}</p>";
echo "</div>";

// Affichage des projets du mentor
$get_mentor_projects = $bdd->prepare("SELECT * FROM mentor_projects WHERE mentor_id = ?");
$get_mentor_projects->execute([$mentor_id]);
$mentor_projects = $get_mentor_projects->fetchAll(PDO::FETCH_ASSOC);

echo "<section id='portfolio'>";
echo "<h2>Mon Portfolio</h2>";

foreach ($mentor_projects as $project) {
    echo "<div class='project'>";
    echo "<img src='{$project['image']}' alt='{$project['titre']}'>";
    echo "<a href='{$project['lien_projet']}'>PROJET</a>";
    echo "<a href='{$project['lien_github']}' target='_blank'>GIT-HUB</a>";
    echo "<h3>{$project['titre']}</h3>";
    echo "<p>{$project['description']}</p>";
    echo "</div>";
}

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
    <link rel="stylesheet" href="profil-mentor.css">
    <title>Profil Mentor</title>
</head>
<body>

    <nav>
        <a href="mentorat.html">Mentor</a>
    </nav>

    <header>
        <h1>Profil du Mentor</h1>
    </header>

    <article>
        <a href="profil.html">Choisissez votre élève</a>
        <a href="entreprise.html">Profil Entreprises</a>
        <a href="etudiant.html">Votre Elève</a>
    </article>


    <section class="mentor-profile">
        <!-- Informations du mentor -->
        <div class="profile-picture">
            <img src="mentor-avatar.jpg" alt="Avatar du mentor">
        </div>

        <div class="profile-details">
            <h2>Nom du Mentor</h2>
            <p>Domaine d'expertise : <span>Domaine XYZ</span></p>
            <p>Expérience professionnelle : <span>10 ans</span></p>
            <p>Compétences : <span>Compétence 1, Compétence 2, Compétence 3</span></p>
            <p>Description du mentor :</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...</p>
        </div>
    </section>

    <section id="portfolio">
        <h2>Mon Portfolio</h2>

        <!-- Projet 1 -->
        <div class="project">
            <img src="project1.jpg" alt="Projet 1">
            <a href="lien-vers-projet1.html">PROJET
            <a href="lien-vers-github-projet1" target="_blank">GIT-HUB
            <h3>Titre du Projet 1</h3>
            <p>Description du Projet 1...</p>
        </div>

        <!-- Projet 2 -->
        <div class="project">
            <img src="project2.jpg" alt="Projet 2">
            <a href="lien-vers-projet1.html">PROJET
            <a href="lien-vers-github-projet1" target="_blank">GIT-HUB
            <h3>Titre du Projet 2</h3>
            <p>Description du Projet 2...</p>
        </div>
        <!-- Ajoutez d'autres projets ici -->

    </section>

    <section class="contact-mentor">
        <!-- Bouton pour contacter le mentor -->
        <button>Contactez le Mentor</button>
    </section>

    <footer>
        <p>© 2023 LYAK-ETUDES - Rubrique</p>
        <a href="conditions.fr">Conditions d'utilisation &nbsp;</a>
        <a href="confidentialité.fr">Politique de confidentialité</a>
    </footer>

    <script src="profil-mentor.js"></script>
</body>
</html>