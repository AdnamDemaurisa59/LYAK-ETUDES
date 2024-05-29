<?php
session_start();

// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=Lyak-Etude;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activer le mode exception pour PDO
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit(); // Arrêter le script en cas d'échec de la connexion
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Valider les données reçues
    $required_fields = ['entreprise', 'date_debut', 'date_fin', 'missions', 'informations', 'competences', 'experience', 'avis'];
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            echo "Veuillez remplir tous les champs obligatoires.";
            exit(); // Arrêter le script si un champ obligatoire est manquant
        }
    }

    // Échapper les données et préparer la requête
    $entreprise = strip_tags($_POST['entreprise']);
    $date_debut = strip_tags($_POST['date_debut']);
    $date_fin = strip_tags($_POST['date_fin']);
    $missions = strip_tags($_POST['missions']);
    $informations = strip_tags($_POST['informations']);
    $competences = strip_tags($_POST['competences']);
    $experience = strip_tags($_POST['experience']);
    $recommandation = isset($_POST['recommandation']) ? $_POST['recommandation'] : "";
    $avis = strip_tags($_POST['avis']);

    // Préparation de la requête d'insertion de l'évaluation de l'entreprise par l'étudiant
    try {
        $insert_query = $bdd->prepare('INSERT INTO notation_etudiant (entreprise, date_debut, date_fin, missions, informations, competences, experience, recommandation, avis, date_evaluation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())');
        $insert_query->execute([$entreprise, $date_debut, $date_fin, $missions, $informations, $competences, $experience, $recommandation, $avis]);
        echo "Évaluation envoyée avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de l'insertion des données : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="notation-etudiant.css">
  <title>Espace Etudiant</title>
</head>
<body>

<nav>
    <a href="notation.html">Notation Stage/Alternance</a>
</nav>

<header>
  <h1>Espace Etudiant</h1>
</header>

<section class="avis-form">
  <form action="#" method="post" autocomplete="on">
    <label for="entreprise">Nom de l'entreprise :</label>
    <input type="text" id="entreprise" name="entreprise" placeholder="Renseigner l'entreprise où le stage/l'alternance a été effectué" required>

    <p>Date de début du stage ou de l'alternance<input type="text" id="date_debut" name="date_debut" placeholder="AAAA/MM/JJ" required></p>
    <p>Date de fin du stage ou de l'alternance<input type="text" id="date_fin" name="date_fin" placeholder="AAAA/MM/JJ" required></p>

    <label for="missions">Les missions qui m'ont été confiées étaient-elles en adéquation avec mon cursus ?</label>
    <input type="text" id="missions" name="missions" placeholder="Quelles missions vous ont été confiées ?" required>

    <label for="informations">J'ai appris de nouvelles choses pendant mon stage/alternance ?</label>
    <input type="text" id="informations" name="informations" placeholder="Qu'avez-vous appris ?" required>

    <label for="competences">J'ai pu développer mes compétences professionnelles ?</label>
    <input type="text" id="competences" name="competences" placeholder="Quels compétences avez-vous pu développer ?"required>

    <label for="experience">J'ai pu acquérir une expérience professionnelle ?</label>
    <input type="text" id="experience" name="experience" placeholder="Avez-vous pu acquérir de l'expérience ?" required>

    <label>Recommanderiez-vous cette entreprise à votre entourage ?</label>
    <input type="radio" id="oui" name="recommandation" value="Oui"> Oui 
    <input type="radio" id="non" name="recommandation" value="Non"> Non

    <label for="avis">Avis sur le stage :</label>
    <textarea id="avis" name="avis" placeholder="Qu'avez-vous pensé de votre stage ?" rows="4" required></textarea>

    <button type="submit">Soumettre</button>
  </form>
</section>

<footer>
  <p>© 2023 LYAK-ETUDES</p>
  <a href="conditions.fr">Conditions d'utilisation &nbsp;</a>
  <a href="confidentialité.fr">Politique de confidentialité</a>
</footer>

</body>
</html>
