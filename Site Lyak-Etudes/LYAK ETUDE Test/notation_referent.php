<?php
session_start();

// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=Lyak-Etude;charset=utf8', 'root', 'root');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activer le mode exception pour PDO

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['fName'], $_POST['lName'], $_POST['entreprise'], $_POST['date_debut'], $_POST['date_fin'], $_POST['missions'], $_POST['informations'], $_POST['implication'], $_POST['experience'], $_POST['avis'])) {
        $prenom = htmlspecialchars($_POST['fName']);
        $nom = htmlspecialchars($_POST['lName']);
        $entreprise = htmlspecialchars($_POST['entreprise']);
        $date_debut = htmlspecialchars($_POST['date_debut']);
        $date_fin = htmlspecialchars($_POST['date_fin']);
        $missions = htmlspecialchars($_POST['missions']);
        $informations = htmlspecialchars($_POST['informations']); // corrected variable name
        $implication = htmlspecialchars($_POST['implication']);
        $experience = htmlspecialchars($_POST['experience']);
        $avis = htmlspecialchars($_POST['avis']);

        // Préparation de la requête d'insertion de l'évaluation du professeur référent/établissement
        $insert_query = $bdd->prepare('INSERT INTO notation_referent (prenom_etudiant, nom_etudiant, entreprise, date_debut, date_fin, missions, investissement, implication, pratique, avis, date_evaluation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())');
        $insert_query->execute([$prenom, $nom, $entreprise, $date_debut, $date_fin, $missions, $informations, $implication, $experience, $avis]);

        echo "Évaluation envoyée avec succès.";
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}

// Afficher les erreurs PDO après l'exécution du code
if (isset($bdd) && $bdd->errorCode() != '00000') {
    $errorInfo = $bdd->errorInfo();
    echo "Erreur PDO : " . $errorInfo[2];
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="notation-referent.css">
  <title>Espace Etudiant</title>
</head>
<body>

        <nav>
            <a href="notation.html">Notation Stage/Alternance</a>
        </nav>

  <header>
    <h1>Espace Prof Referent/Etablissement</h1>
  </header>

  <section class="evaluation-form">
    <form action="#" method="post" autocomplete="on">
      <label for="fName">Prénom de l'étudiant</label>
      <input type="text" name="fName" id="fName" placeholder="Renseigner le prénom de l'étudiant" autocomplete="given-name" value="" required>

      <label for="lName">Nom de famille de l'étudiant</label>
      <input type="text" name="lName" id="lName" placeholder="Renseigner le nom de famille de l'étudiant" autocomplete="family-name" required>


      <label for="entreprise">Nom de l'entreprise :</label>
      <input type="text" id="entreprise" name="entreprise" placeholder="Renseigner l'entreprise où le stage/l'alternance a été effectué" required>

      <p>Date de début du stage ou de l'alternance<input type="text" id="date" name="date" placeholder="JJ/MM/AAAA"></p>
      <p>Date de fin du stage ou de l'alternance<input type="text" id="date" name="date" placeholder="JJ/MM/AAAA"></p>

      <label for="missions">L'étudiant a-t-il atteint les objectifs fixés ?</label>
      <input type="text" id="missions" name="missions" required>

      <label for="informations">L'étudiant a-t-il fait preuve d'investissement ?</label>
      <input type="text" id="informations" name="informations" required>

      <label for="entreprise">L'étudiant a-t-il été impliqué dans son stage/alternance ?</label>
      <input type="text" id="entreprise" name="entreprise" required>

      <label for="experience">L'étudiant a-t-il pu mettre en pratique les connaissances acquises en cours ?</label>
      <input type="text" id="experience" name="experience" required>

      <label for="avis">Avis sur le stage/l'alternance :</label>
      <textarea id="avis" name="avis" rows="4" placeholder="Qu'en avez-vous penser du stage/de l'alternance ?" required></textarea>

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
