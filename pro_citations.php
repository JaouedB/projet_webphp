<?php
$serveur = 'mysql-boulbayem.alwaysdata.net';
$db = 'boulbayem_web';
$utilisateur = 'boulbayem';
$mot_passe = 'steloi123';

try {
    $connexion = new PDO("mysql:host=$serveur;dbname=$db", $utilisateur, $mot_passe);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"], $_POST["citations"])) {
        $auteur = $_POST["name"];
        $citation = $_POST["citations"];

        $sql = "INSERT INTO Citation (auteur, citations) VALUES (:auteur, :citations)";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([
            ':auteur' => $auteur,
            ':citations' => $citation
        ]);

        header("Location: page_user.html?success=1");
        exit();
    }
} catch (PDOException $event) {
    die('Erreur : ' . $event->getMessage());
}
?>
