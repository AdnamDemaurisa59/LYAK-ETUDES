<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=Lyak-Etude;charset=utf8', 'root', 'root');

if(isset($_POST['username'], $_POST['password1'], $_POST['fName'], $_POST['lName'], $_POST['dob'], $_POST['email'], $_POST['address'], $_POST['tel'], $_POST['country'])) {
    $nom_utilisateur = htmlspecialchars($_POST['username']);
    $mot_de_passe = $_POST['password1'];
    $prenom = htmlspecialchars($_POST['fName']);
    $nom = htmlspecialchars($_POST['lName']);
    $date_naissance = $_POST['dob'];
    $email = htmlspecialchars($_POST['email']);
    $adresse = htmlspecialchars($_POST['address']);
    $telephone = htmlspecialchars($_POST['tel']);
    $nationalite = htmlspecialchars($_POST['country']);

    // Vérifier si le nom d'utilisateur n'est pas déjà utilisé
    $checkUsername = $bdd->prepare('SELECT COUNT(*) AS count FROM utilisateurs WHERE nom_utilisateur = ?');
    $checkUsername->execute([$nom_utilisateur]);
    $result = $checkUsername->fetch(PDO::FETCH_ASSOC);
    if($result['count'] > 0) {
        echo "Ce nom d'utilisateur est déjà pris.";
        exit;
    }

    // Hachage du mot de passe
    $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    // Préparation de la requête d'insertion
    $insertUser = $bdd->prepare('INSERT INTO utilisateurs(prenom, nom, date_naissance, email, adresse, telephone, nationalite, type_utilisateur, nom_utilisateur, mot_de_passe) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

    // Exécution de la requête avec les valeurs fournies
    if($insertUser->execute([$prenom, $nom, $date_naissance, $email, $adresse, $telephone, $nationalite, 'type_utilisateur', $nom_utilisateur, $hashed_password])) {
        $_SESSION['nom_utilisateur'] = $nom_utilisateur;
        echo "Inscription réussie !";
    } else {
        echo "Erreur lors de l'inscription.";
    }
} else {
    echo "Veuillez remplir tous les champs du formulaire.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="inscription.css">
    <title>Inscription - LYAK-ETUDES</title>
</head>
<body>

<header>
    <a href="accueil.html"><h1>LYAK-ETUDES</h1></a>
    <nav>
        <a href="inscription-pro.html">Vous êtes un professionnel ?</a>
        <a href="contactez-nous.html">Contactez-nous</a>
    </nav>
</header>
    
<h2>Rejoignez notre plateforme et commencez votre parcours professionnel.</h2>
    
<main> 
    <section id="inscription">
        <section>
            <form action="" method="post" id="frmregistration" novalidate >  
                <fieldset> 
                    <legend>Informations Personnel </legend>
                    <div class="text">
                        <label for="fName">Votre prénom</label>
                        <input type="text" name="fName" id="fName" placeholder="Votre prénom" autocomplete="given-name" value="" required>
                    </div>
                    <div class="text">
                        <label for="lName">Votre nom de famille</label>
                        <input type="text" name="lName" id="lName" placeholder="Votre nom de famille" autocomplete="family-name" required>
                    </div>
                    <div class="text">
                        <label for="dob">Votre date de naissance</label>
                        <input type="date" name="dob" id="dob" placeholder="Votre date de naissance" autocomplete="on" required>
                    </div>
                    <div class="text">
                        <label for="email">Votre adresse email</label>
                        <input type="email" name="email" id="email" placeholder="Votre adresse email" required>
                    </div>
                    <div class="text">
                        <label for="address">Adresse postal:</label>
                        <input type="text" id="address" name="address" placeholder="Entrez votre adresse" required>
                    </div>
                    <div class="text">
                        <label for="tel">Votre numéro de téléphone</label>
                        <input type="tel" name="tel" id="tel" placeholder="Votre numéro de téléphone"  required>
                    </div>
                    <div class="select">
                        <label for="country">Votre nationalité</label>
                        <select name="country" id="country">
                            <option>-- Choisissez votre pays </option>
                                  <!-- Options générées dynamiquement à partir de l'API -->
                        </select>
                    </div>
                </fieldset>  
                <fieldset>  
                    <legend>Votre compte</legend>
                    <div class="text">
                        <label for="username">Choisissez un nom d'utilisateur</label>
                        <input type="text" name="username" id="username" placeholder="Choisissez un nom d'utilisateur" maxlength="12" required="">
                    </div>
                    <div class="text">
                        <label for="password1">Choisissez votre mot de passe</label>
                        <input type="password" name="password1" id="password1" placeholder="Choisissez votre mot de passe" autocomplete="off" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$" title="Le mot de passe doit contenir au moins 6 caractères, dont une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial (@,$,!,%,*,?,&).">
                    </div>
                    <div class="text">
                        <label for="password2">Répétez votre mot de passe</label>
                        <input type="password" name="password2" id="password2" placeholder="Répéter votre mot de passe" autocomplete="off" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$" title="Le mot de passe doit contenir au moins 6 caractères, dont une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial (@,$,!,%,*,?,&).">
                    </div>
                </fieldset>
                <fieldset>  
                    <legend>Envoyer </legend>
                    <div class="checkboxes">
                        <label><input id="terms" type="checkbox" name="termes" value="yes">J'accepte les termes et conditions général</label>
                    </div>
                    <div class="button">
                        <input type="hidden" value="123456789" >
                       <button type="submit">Enregistrer les paramètres</button>
                    </div>
                </fieldset>
            </form>
        </section> 

    <article>
        <p>Déjà inscrit ? <a href="connexion.html">Connectez-vous</a></p>
    </