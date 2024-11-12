<?php
$serveur = 'mysql-boulbayem.alwaysdata.net';
$db = 'boulbayem_web';
$utilisateur = 'boulbayem';
$mot_passe = 'steloi123';

try {
    $connexion = new PDO("mysql:host=$serveur;dbname=$db", $utilisateur, $mot_passe);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si le formulaire est soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_POST["user"];
        $password = $_POST["password"];

        // Vérifier si les identifiants et mot de passe sont "admin"
        if ($user === 'admin' && $password === 'admin') {
            // Si l'identifiant et le mot de passe sont corrects, rediriger vers admin.php
            header("Location: admin.php");
            exit();
        } else {
            // Si ce n'est pas "admin", rediriger vers la page page_user.html
            header("Location: page_user.html");
            exit();
        }
    }
} catch (PDOException $event) {
    die('Erreur : ' . $event->getMessage());
}
?>
