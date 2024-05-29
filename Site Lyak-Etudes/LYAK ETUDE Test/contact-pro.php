<?php
session_start();

try {
    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=Lyak-Etude;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activer le mode exception pour PDO

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['companyName'], $_POST['contactPerson'], $_POST['contactPhone'], $_POST['email'], $_POST['message'])) {
            $nom_entreprise = htmlspecialchars($_POST['companyName']);
            $personne_contact = htmlspecialchars($_POST['contactPerson']);
            $telephone_contact = htmlspecialchars($_POST['contactPhone']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            // Vérification de l'existence des préférences de contact
            $contactPreference = "";
            if (isset($_POST['contactPreference'])) {
                $contactPreference = implode(", ", $_POST['contactPreference']);
            }

            // Insertion des informations de contact professionnel
            $insert_query = $bdd->prepare('INSERT INTO contact_pro (nom_entreprise, personne_contact, telephone, email, message, contact_mail, contact_telephone, date_creation) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())');
            $insert_query->execute([$nom_entreprise, $personne_contact, $telephone_contact, $email, $message, (strpos($contactPreference, 'mail') !== false) ? 'Oui' : 'Non', (strpos($contactPreference, 'phone') !== false) ? 'Oui' : 'Non']);

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
    <link rel="stylesheet" href="contact-pro.css">
    <title>Contactez-nous Professionels</title>
</head>
<body>

    <nav>
        <a href="index.html">Introduction Site</a>
        <a href="inscription-pro.html">Inscription Pro</a>
        <a href="offres.html">Opportunités</a>
        <a href="forum.html">Forum</a>
        <a href="rubrique.html">Boite à outil</a>
    </nav>

    <header>
        <h1>Contactez-nous - Professionnels et Partenariats</h1>
    </header>

    <section>
        <form action="#" method="post">
            <label for="companyName">Nom de l'Entreprise :</label>
            <input type="text" id="companyName" name="companyName" placeholder="Renseigner le nom de votre entreprise" required>

            <label for="contactPerson">Personne de Contact :</label>
            <input type="text" id="contactPerson" name="contactPerson" placeholder="Renseigner votre nom" required>

            <label for="contactPhone">Numéro de téléphone :</label>
            <input type="text" id="contactPhone" name="contactPhone" placeholder="Renseigner un numéro de téléphone" required>

            <label for="email">Email de Contact :</label>
            <input type="email" id="email" name="email" placeholder="Renseigner votre adresse mail" required>

            <label for="message">Message :</label>
            <textarea id="message" name="message" required></textarea>

            <p>Préférez-vous être recontacté par mail ou par téléphone ?</p>
            <label>
                <input type="checkbox" name="contactPreference[]" value="mail">
                <span>Par mail</span>
            </label>
            <label>
                <input type="checkbox" name="contactPreference[]" value="phone">
                <span>Par téléphone</span>
            </label>

            <button type="submit">Envoyer</button>
        </form>
    </section>

    <article>
        <p>Contactez-nous à l'adresse pro : contact-partenariats@lyak-etudes.com</p>
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