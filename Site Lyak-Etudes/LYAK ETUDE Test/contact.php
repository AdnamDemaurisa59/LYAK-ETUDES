<?php
session_start();

try {
    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=Lyak-Etude;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activer le mode exception pour PDO

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['fName'], $_POST['lName'], $_POST['tel'], $_POST['email'], $_POST['message'])) {
            $prenom = htmlspecialchars($_POST['fName']);
            $nom = htmlspecialchars($_POST['lName']);
            $telephone = htmlspecialchars($_POST['tel']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            // Insertion des informations de contact
            $insert_query = $bdd->prepare('INSERT INTO contacts (prenom, nom, telephone, email, message, date_contact) VALUES (?, ?, ?, ?, ?, NOW())');
            $insert_query->execute([$prenom, $nom, $telephone, $email, $message]);

            echo "Message envoyé avec succès.";
        } else {
            echo "Veuillez remplir tous les champs.";
        }
    }
} catch (PDOException $e) {
    echo "Erreur PDO : " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
    <link rel="stylesheet" href="contact.css"> <!-- Lien vers votre fichier de styles CSS -->
</head>
<body>

    <header>
        <h1>LYAK-ETUDES</h1>
        <nav>
            <a href="index.html">Accueil</a>
            <a href="contact-pro.html">Contact Pro</a>
            <a href="forum.html">Forum</a>
            <a href="communaute.html">Communauté</a>
            <a href="rubrique.html">Boite à outil</a>
        </nav>
        <div class="search-bar">
            <input type="text" placeholder="Rechercher...">
            <button type="button">Rechercher</button>
        </div>
    </header>

    <section id="contact">
        <h1>Contactez-nous</h1>
        <p>Nous serions ravis d'avoir de vos nouvelles. Remplissez le formulaire ci-dessous pour nous contacter.</p>

        <form action="#" method="post">
            <label for="fName">Prénom:</label>
            <input type="text" id="fName" name="fName" placeholder="Renseigner votre prénom" required>

            <label for="lName">Nom:</label>
            <input type="text" id="lName" name="lName" placeholder="Renseigner votre nom de famille" required>

            <label for="tel">Téléphone:</label>
            <input type="tel" id="tel" name="tel" placeholder="Renseigner votre numéro de téléphone" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Renseigner votre adresse mail" required>

            <label for="message">Message:</label>
            <textarea id="text" name="message" placeholder="Laisser un message" rows="4"></textarea>

            <button type="submit">Envoyer</button>
        </form>
    </section>

    <article>
        <p>Contactez-nous à l'adresse contact-mon-projet@lyak-etudes.com</p>
        <p>Siège social: Lille</p>
        <p>Contactez le service au 01.03.04.05.06</p>
    </article>

    <footer>
        <p>© 2024 LYAK-ETUDES</p>
        <a href="conditions.html">Conditions d'utilisation &nbsp;</a>
        <a href="confidentialite.html">Politique de confidentialité</a>
    </footer>

</body>
</html>