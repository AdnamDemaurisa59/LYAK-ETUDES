<?php
session_start();

// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=Lyak-Etude;charset=utf8', 'root', 'root');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activer le mode exception pour PDO

// Traitement du formulaire de recherche
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['search'])) {
        $search_query = htmlspecialchars($_POST['search']);
        // Requête de recherche d'étudiants
        $search_students = $bdd->prepare("SELECT * FROM etudiants WHERE nom LIKE ? OR prenom LIKE ?");
        $search_students->execute(["%$search_query%", "%$search_query%"]);
        $students = $search_students->fetchAll(PDO::FETCH_ASSOC);
        // Affichage des résultats de recherche
        foreach ($students as $student) {
            echo "<h2>{$student['prenom']} {$student['nom']}</h2>";
            echo "<p>Email: {$student['email']}</p>";
            echo "<p>Statut: {$student['statut']}</p>";
            // Affichage d'autres informations de l'étudiant si nécessaire
        }
    }
}

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
    <title>Profil de l'Étudiant</title>
    <link rel="stylesheet" href="profil.css"> <!-- Lien vers le fichier CSS pour les styles -->
</head>
<body>

    <header>
    <!-- Barre de navigation -->
    <nav>
        <!-- Liens de navigation, par exemple : Accueil, Offres, Profil, Déconnexion, etc. -->
            <a href="index.html">Accueil</a>
            <a href="offres.html">Offres</a>
            <a href="communaute.html">Communauté</a>
            <a href="entreprise.html">Entreprise</a>
            <a href="forum.html">Forum</a>
            <a href="rubrique.html">Boite à Outil</a>

    </nav>

    <!-- Barre de recherche -->
    <div class="search-bar">
        <input type="text" placeholder="Rechercher...">
        <button type="button">Rechercher</button>
    </div>
</header>

<main>
    <!-- Section des etudiants -->
    <section id="etudiants">
        <h1>Profils Etudiants</h1>
        <!-- Liste des etudiants -->
        <ul class="etudiants-list">
            <li>
                <img src="images/etudiant.jpg" alt="Photo Etudiant 1">
                <h2>Nom de l'Etudiant 1</h2>
                <p>Description de l'etudiant 1.</p>
                <a href="etudiant.html">Voir Profil</a>
            </li>
            <li>
                <img src="images/etudiant2.jpg" alt="Photo etudiant 2">
                <h2>Nom de l'Etudiant 2</h2>
                <p>Description de l'etudiant 2.</p>
                <a href="etudiant.html">Voir Profil</a>
            </li>
            <li>
                <img src="images/etudiant.jpg" alt="Photo Etudiant 3">
                <h2>Nom de l'Etudiant 3</h2>
                <p>Description de l'etudiant 3.</p>
                <a href="etudiant.html">Voir Profil</a>
            </li>
            <li>
                <img src="images/etudiant4.jpg" alt="Photo Etudiant 4">
                <h2>Nom de l'Etudiant 4</h2>
                <p>Description de l'etudiant 4.</p>
                <a href="etudiant.html">Voir Profil</a>
            </li>
            <li>
                <img src="images/etudiant5.jpg" alt="Photo Etudiant 5">
                <h2>Nom de l'Etudiant 5</h2>
                <p>Description de l'etudiant 5.</p>
                <a href="etudiant.html">Voir Profil</a>
            </li>
            <li>
                <img src="images/etudiant6.jpg" alt="Photo Etudiant 6">
                <h2>Nom de l'Etudiant 6</h2>
                <p>Description de l'etudiant 6.</p>
                <a href="etudiant.html">Voir Profil</a>
            </li>
            <li>
                <img src="images/etudiant7.jpg" alt="Photo Etudiant 7">
                <h2>Nom de l'Etudiant 7</h2>
                <p>Description de l'etudiant 7.</p>
                <a href="etudiant.html">Voir Profil</a>
            </li>
            <li>
                <img src="images/etudiant8.jpg" alt="Photo Etudiant 8">
                <h2>Nom de l'Etudiant 8</h2>
                <p>Description de l'etudiant 8.</p>
                <a href="etudiant.html">Voir Profil</a>
            </li>
            <li>
                <img src="images/etudiant9.jpg" alt="Photo Etudiant 9">
                <h2>Nom de l'Etudiant 9</h2>
                <p>Description de l'etudiant 9.</p>
                <a href="etudiant.html">Voir Profil</a>
            </li>
            <li>
                <img src="images/etudiant10.jpg" alt="Photo Etudiant 10">
                <h2>Nom de l'Etudiant 10</h2>
                <p>Description de l'etudiant 10.</p>
                <a href="etudiant.html">Voir Profil</a>
            </li>
            <li>
                <img src="images/etudiant11.jpg" alt="Photo Etudiant 11">
                <h2>Nom de l'Etudiant 11</h2>
                <p>Description de l'étudiant 11.</p>
                <a href="etudiant.html">Voir Profil</a>
            </li>
            <li>
                <img src="images/etudiant12.jpg" alt="Photo Etudiant 12">
                <h2>Nom de l'Etudiant 12</h2>
                <p>Description de l'etudiant 12.</p>
                <a href="etudiant.html">Voir Profil</a>
            </li>
            <li>
                <img src="images/etudiant13.jpg" alt="Photo Etudiant 13">
                <h2>Nom de l'Etudiant 13</h2>
                <p>Description de l'etudiant 13.</p>
                <a href="etudiant.html">Voir Profil</a>
            </li>
            <li>
                <img src="images/etudiant14.jpg" alt="Photo Etudiant 14">
                <h2>Nom de l'Etudiant 14</h2>
                <p>Description de l'etudiant 14.</p>
                <a href="etudiant.html">Voir Profil</a>
            </li>
            <li>
                <img src="images/etudiant15.jpg" alt="Photo Etudiant 15">
                <h2>Nom de l'Etudiant 15</h2>
                <p>Description de l'etudiant 15.</p>
                <a href="etudiant.html">Voir Profil</a>
            </li>
            <li>
                <img src="images/etudiant16.jpg" alt="Photo Etudiant 16">
                <h2>Nom de l'Etudiant 16</h2>
                <p>Description de l'etudiant 16.</p>
                <a href="etudiant.html">Voir Profil</a>
            </li>
            <li>
                <img src="images/etudiant17.jpg" alt="Photo Etudiant 17">
                <h2>Nom de l'Etudiant 17</h2>
                <p>Description de l'etudiant 17.</p>
                <a href="etudiant.html">Voir Profil</a>
            </li>
            <li>
                <img src="images/etudiant18.jpg" alt="Photo Etudiant 18">
                <h2>Nom de l'Etudiant 18</h2>
                <p>Description de l'etudiant 18.</p>
                <a href="etudiant.html">Voir Profil</a>
            </li>
            <li>
                <img src="images/etudiant19.jpg" alt="Photo Etudiant 19">
                <h2>Nom de l'Etudiant 19</h2>
                <p>Description de l'etudiant 19.</p>
                <a href="etudiant.html">Voir Profil</a>
            </li>
            <li>
                <img src="images/etudiant20.jpg" alt="Photo Etudiant 20">
                <h2>Nom de l'Etudiant 20</h2>
                <p>Description de l'etudiant 20.</p>
                <a href="etudiant.html">Voir Profil</a>
            </li>
            <!-- Ajoutez d'autres profil etudiant ici -->
        </ul>
    </section>


    <!-- Section latérale avec les informations sur l'utilisateur -->
    <aside>
        <div class="user-info">
            <h2>Nom de l'Utilisateur</h2>
            <p>Email: utilisateur@example.com</p>
            <p>Statut: Étudiant en Informatique</p>
            <button type="button">Déconnexion</button>
        </div>
    </aside>
</main>

<section id="mentors">
    <h1>Profils Mentors</h1>
    <!-- Liste des etudiants -->
    <ul class="mentors-list">
        <li>
            <img src="images/mentor1.jpg" alt="Photo Mentor 1">
            <h2>Nom du mentor 1</h2>
            <p>Description du mentor 1.</p>
            <a href="profil-mentor.html">Voir Profil</a>
        </li>
        <li>
            <img src="images/mentor2.jpg" alt="Photo Mentor 2">
            <h2>Nom du mentor 2</h2>
            <p>Description du mentor 2.</p>
            <a href="profil-mentor.html">Voir Profil</a>
        </li>
        <li>
            <img src="images/mentor3.jpg" alt="Photo Mentor 3">
            <h2>Nom du mentor 3</h2>
            <p>Description du mentor 3.</p>
            <a href="profil-mentor.html">Voir Profil</a>
        </li>
        <li>
            <img src="images/mentor4.jpg" alt="Photo Mentor 4">
            <h2>Nom du mentor 4</h2>
            <p>Description du mentor 4.</p>
            <a href="profil-mentor.html">Voir Profil</a>
        </li>
        <li>
            <img src="images/mentor5.jpg" alt="Photo Mentor 5">
            <h2>Nom du mentor 5</h2>
            <p>Description du mentor 5.</p>
            <a href="profil-mentor.html">Voir Profil</a>
        </li>
        <li>
            <img src="images/mentor6.jpg" alt="Photo Mentor 6">
            <h2>Nom du mentor 6</h2>
            <p>Description du mentor 6.</p>
            <a href="profil-mentor.html">Voir Profil</a>
        </li>
        <li>
            <img src="images/mentor7.jpg" alt="Photo Mentor 7">
            <h2>Nom du mentor 7</h2>
            <p>Description du mentor 7.</p>
            <a href="profil-mentor.html">Voir Profil</a>
        </li>
        <li>
            <img src="images/mentor8.jpg" alt="Photo Mentor 8">
            <h2>Nom du mentor 8</h2>
            <p>Description du mentor 8.</p>
            <a href="profil-mentor.html">Voir Profil</a>
        </li>
        <li>
            <img src="images/mentor9.jpg" alt="Photo Mentor 9">
            <h2>Nom du mentor 9</h2>
            <p>Description du mentor 9.</p>
            <a href="profil-mentor.html">Voir Profil</a>
        </li>
        <li>
            <img src="images/mentor10.jpg" alt="Photo Mentor 10">
            <h2>Nom du mentor 10</h2>
            <p>Description du mentor 10.</p>
            <a href="profil-mentor.html">Voir Profil</a>
        </li>
        <li>
            <img src="images/mentor11.jpg" alt="Photo Mentor 11">
            <h2>Nom du mentor 11</h2>
            <p>Description du mentor 11.</p>
            <a href="profil-mentor.html">Voir Profil</a>
        </li>
              <!-- Ajoutez d'autres profil mentor ici -->
    </ul>
</section>
</main>

    <!-- Pied de page -->
    <footer>
        <!-- Informations complémentaires, liens utiles, droits d'auteur, etc. -->
        <p>© 2023 LYAK-ETUDES</p>
        <a href="conditions.html">Conditions d'utilisation &nbsp;</a>
        <a href="confidentialite.html">Politique de confidentialité</a>
    </footer>

    <script src="main.js"></script>

</body>
</html>