<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=Lyak-Etude;charset=utf8', 'root', 'root');
// Connexion à la base de données
if(isset($_POST['companyName'], $_POST['email'], $_POST['nom_utilisateurPro'], $_POST['password'], $_POST['password1'])) {
    $nom_entreprise = htmlspecialchars($_POST['companyName']);
    $email = htmlspecialchars($_POST['email']);
    $nom_utilisateur_pro = htmlspecialchars($_POST['nom_utilisateurPro']);
    $mot_de_passe = $_POST['password'];
    $mot_de_passe_conf = $_POST['password1'];

    // Vérifier si les mots de passe correspondent
    if ($mot_de_passe !== $mot_de_passe_conf) {
        echo "Les mots de passe ne correspondent pas.";
        exit;
    }

    // Vérifier si le champ nom_utilisateurPro est rempli
    if (empty($nom_utilisateur_pro)) {
        echo "Le nom de l'utilisateur professionnel est requis.";
        exit;
    }

    // Hachage du mot de passe
    $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    try {
        // Préparation de la requête d'insertion
        $insertUserPro = $bdd->prepare('INSERT INTO `utilisateurs-pro` (nom_entreprise, email, nom_utilisateurPro, mot_de_passe) VALUES(?, ?, ?, ?)');

        // Exécution de la requête avec les valeurs fournies
        if($insertUserPro->execute([$nom_entreprise, $email, $nom_utilisateur_pro, $hashed_password])) {
            $_SESSION['nom_utilisateurPro'] = $nom_utilisateur_pro;
            echo "Inscription réussie !";
        } else {
            echo "Erreur lors de l'inscription.";
            var_dump($insertUserPro->errorInfo()); // Afficher les informations sur l'erreur PDO
        }
    } catch (PDOException $e) {
        echo "Erreur PDO: " . $e->getMessage();
    }
} else {
    echo "Veuillez remplir tous les champs du formulaire.";
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Entreprise</title>
    <link rel="stylesheet" href="inscription-pro.css">
</head>
<body>

<header>
    <h1>LYAK-ETUDES</h1>
    <nav>
        <a href="accueil.html">Accueil</a>
        <a href="inscription.html">Vous êtes un étudiant ?</a>
        <a href="contactez-nous-pro.html">Contactez-nous</a>
    </nav>
</header>

<main>
    <div class="container">
        <h1>Inscription Entreprise</h1>
        <form action="#" method="post">
            <div class="form-group">
                <label for="companyName">Nom de l'Entreprise</label>
                <input type="text" id="companyName" name="companyName" placeholder="Renseigner le nom de votre entreprise" autocomplete="on">
            </div>

            <div class="form-group">
                <label for="email">Adresse Email</label>
                <input type="email" id="email" name="email" placeholder="Renseigner l'adresse mail de votre entreprise" autocomplete="on">
            </div>

            <div class="form-group">
                <label for="nom_utilisateurPro">Nom de l'utilisateur Professionnel</label>
                <input type="text" id="nom_utilisateurPro" name="nom_utilisateurPro" placeholder="Renseigner le nom de l'utilisateur professionnel" autocomplete="on">
            </div>

            <div class="form-group">
                <label for="password">Mot de Passe</label>
                <input type="password" id="password" name="password" placeholder="Choisissez votre mot de passe" autocomplete="off" maxlength="16" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$" title="Le mot de passe doit contenir au moins 6 caractères, dont une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial (@,$,!,%,*,?,&). - Le mot de passe ne doit pas dépasser 16 caractères.">
            </div>

            <div class="form-group">
                <label for="password1">Confirmer votre Mot de Passe</label>
                <input type="password" id="password1" name="password1" placeholder="Confirmez votre mot de passe" autocomplete="off" maxlength="16" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$" title="Le mot de passe doit contenir au moins 6 caractères, dont une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial (@,$,!,%,*,?,&). - Le mot de passe ne doit pas dépasser 16 caractères.">
            </div>

            <button type="submit">S'inscrire</button>
        </form>
        <article>
            <p>Déjà inscrit ? <a href="connexion-pro.html">Connectez-vous ici</a>.</p>
        </article>
    </div>
</main>

</body>
</html>
