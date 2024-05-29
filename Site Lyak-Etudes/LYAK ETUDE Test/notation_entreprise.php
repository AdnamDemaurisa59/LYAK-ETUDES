<?php
session_start();

// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=Lyak-Etude;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activer le mode exception pour PDO

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des valeurs du formulaire
        $prenom_etudiant = htmlspecialchars($_POST['fName']);
        $nom_famille_etudiant = htmlspecialchars($_POST['lName']);
        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];
        $comprehension_missions = htmlspecialchars($_POST['etudiant_comprehension']);
        $autonomie_responsabilite = htmlspecialchars($_POST['etudiant_autonomie']);
        $initiative = htmlspecialchars($_POST['etudiant_initiative']);
        $atout_pour_entreprise = htmlspecialchars($_POST['etudiant_atout']);
        $recommandation = isset($_POST['recommandation']) ? 1 : 0; // Si la case est cochée, la valeur est 1, sinon 0
        $avis = htmlspecialchars($_POST['avis']);

        // Préparation de la requête d'insertion
        $insert_query = $bdd->prepare('INSERT INTO notation_entreprise (prenom_etudiant, nom_famille_etudiant, date_debut, date_fin, comprehension_missions, autonomie_responsabilite, initiative, atout_pour_entreprise, recommandation, avis, date_creation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())');
        
        // Exécution de la requête
        $insert_query->execute([$prenom_etudiant, $nom_famille_etudiant, $date_debut, $date_fin, $comprehension_missions, $autonomie_responsabilite, $initiative, $atout_pour_entreprise, $recommandation, $avis]);

        exit;
    }
} catch(PDOException $e) {
    // Afficher les détails de l'erreur PDO
    echo "Erreur PDO : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="notation-entreprise.css">
  <title>Espace Entreprise</title>
</head>
<body>

<nav>
    <a href="notation.html">Notation Stage/Alternance</a>
</nav>

<header>
    <h1>Espace Entreprise</h1>
</header>

<section class="evaluation-form">
    <form action="#" method="post">
        <label for="fName">Prénom de l'étudiant</label>
        <input type="text" name="fName" id="fName" placeholder="Renseigner le prénom de l'étudiant" autocomplete="given-name" value="" required>

        <label for="lName">Nom de famille de l'étudiant</label>
        <input type="text" name="lName" id="lName" placeholder="Renseigner le nom de famille de l'étudiant" autocomplete="family-name" required>

        <p>Date de début du stage ou de l'alternance<input type="text" id="date_debut" name="date_debut" placeholder="AAAA/MM/JJ"></p>
        <p>Date de fin du stage ou de l'alternance<input type="text" id="date_fin" name="date_fin" placeholder="AAAA/MM/JJ"></p>

        <label for="etudiant_comprehension">L'étudiant a-t-il bien compris les missions qui lui étaient confiées ?</label>
        <input type="text" id="etudiant_comprehension" name="etudiant_comprehension" required>

        <label for="etudiant_autonomie">L'étudiant a-t-il été autonome et responsable ?</label>
        <input type="text" id="etudiant_autonomie" name="etudiant_autonomie" required>

        <label for="etudiant_initiative">L'étudiant a-t-il fait preuve d'initiative ?</label>
        <input type="text" id="etudiant_initiative" name="etudiant_initiative" required>

        <label for="etudiant_atout">L'étudiant a-t-il été un atout pour l'entreprise ?</label>
        <input type="text" id="etudiant_atout" name="etudiant_atout" required>

        <label for="recommandation">Recommanderiez-vous cette étudiant(e) à votre réseau ?</label>
        <input type="checkbox" name="recommandation" value="1"> Oui
        <input type="checkbox" name="recommandation" value="0"> Non

        <label for="avis">Avis sur le stage/l'alternance :</label>
        <textarea id="avis" name="avis" rows="4" placeholder="Qu'en avez-vous pensé du stage/de l'alternance ?" required></textarea>

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
