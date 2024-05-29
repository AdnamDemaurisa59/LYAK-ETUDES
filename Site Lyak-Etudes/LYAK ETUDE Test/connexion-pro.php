<?php
session_start();

try {
    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=Lyak-Etude;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activer le mode exception pour PDO

    if(isset($_POST['email'], $_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $mot_de_passe = $_POST['password'];

        // Préparation de la requête de sélection du professionnel en fonction de l'email
        $query = $bdd->prepare('SELECT * FROM `utilisateurs-pro` WHERE email = ?');
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if($user) {
            // Vérifier si le mot de passe est correct
            if(password_verify($mot_de_passe, $user['mot_de_passe'])) {
                // Authentification réussie
                $_SESSION['id_utilisateur'] = $user['id_utilisateur'];
                echo "Connexion réussie !";

                // Insertion dans la table connexion-pro
                $insertQuery = $bdd->prepare('INSERT INTO `connexion-pro` (id_utilisateur, email, mot_de_passe, date_connexion) VALUES (?, ?, ?, NOW())');
                $insertQuery->execute([$user['id_utilisateur'], $email, $user['mot_de_passe']]);

                // Redirection vers la page de profil professionnel
                header("Location: profil_pro.html");
                exit;
            } else {
                echo "Mot de passe incorrect.";
            }
        } else {
            echo "Aucun professionnel trouvé avec cet email.";
        }
    }
} catch(PDOException $e) {
    // Afficher les détails de l'erreur PDO
    echo "Erreur PDO : " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se Connecter</title>
    <link rel="stylesheet" href="connexion.css"> <!-- Lien vers votre fichier de styles CSS -->
</head>
<body>

    <header>
        <h1>LYAK-ETUDES</h1>
        <nav>
            <a href="index.html">Accueil</a>
            <a href="connexion-pro.html">Vous êtes un professionnel ?</a>
            <a href="contact.html">Contactez-nous</a>
        </nav>
    </header>


    <main>
    <div class="login-container">
        <h2>Se Connecter</h2>

        <!-- Formulaire de connexion -->
        <form action="#" method="post">
            <label for="email">Adresse Email</label>
            <input type="email" id="email" name="email" placeholder="Renseigner votre adresse mail" autocomplete="on" required>

            <label for="password">Mot de Passe</label>
            <input type="password" id="password" name="password"  placeholder="Renseigner votre  mot de passe" required autocomplete="off" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$" title="Le mot de passe doit contenir au moins 6 caractères, dont une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial (@,$,!,%,*,?,&).">

            <input type="submit" value="Se Connecter">
        </form>

        <!-- Lien vers la page d'inscription -->
        <p>Pas encore inscrit ? <a href="inscription.html">Inscrivez-vous ici</a>.</p>
    </div>
</main>

</body>
</html>
