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

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
  
    <div id="slider">
        <figure>
          <img src="img/mont.jpg" alt>
          <img src="img/nat.jpeg" alt>
          <img src="img/monstre.jpg" alt>
          <img src="img/gg.jpg" alt>
          <img src="img/oui.jpg" alt>
        </figure>
    </div>

    <h1 class="titre">Bienvenido a todos</h1>

    <form action="index.php" method="post" class="login">
        Identifiant : <input type="text" name="user" required><br>
        Mot de passe : <input type="password" name="password" required><br>
        <input type="submit" value="Valider">
    </form>

</body>
</html>
