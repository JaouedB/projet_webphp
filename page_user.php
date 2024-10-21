

<?php
$serveur = 'mysql-boulbayem.alwaysdata.net';
$db = 'boulbayem_web';
$utilisateur = 'boulbayem';
$mot_passe = 'steloi123';

try {
  
    $connexion = new PDO("mysql:host=$serveur;dbname=$db", $utilisateur, $mot_passe);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $auteur = $_POST["name"];
        $citation = $_POST["citations"];

        $sql = "INSERT INTO Citation (auteur, citations) VALUES (:auteur, :citations)";
        $stmt = $connexion->prepare($sql);

        $stmt->execute([
            ':auteur' => $auteur,
            ':citations' => $citation
        ]);

        echo "La citation a été ajoutée avec succès !";
    }
} catch (PDOException $event) {

    die('Erreur : ' . $event->getMessage());
}
?>
