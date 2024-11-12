<?php
$serveur = 'mysql-boulbayem.alwaysdata.net';
$db = 'boulbayem_web';
$utilisateur = 'boulbayem';
$mot_passe = 'steloi123';

try {
    $connexion = new PDO("mysql:host=$serveur;dbname=$db", $utilisateur, $mot_passe);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour récupérer toutes les citations
    $sql = "SELECT * FROM Citation";
    $stmt = $connexion->query($sql);
    $citations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Vérifier si des citations existent
    if (!empty($citations)): ?>
        <ul>
            <?php foreach ($citations as $citation): ?>
                <li><strong><?= htmlspecialchars($citation['auteur']); ?>:</strong> <?= htmlspecialchars($citation['citations']); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucune citation trouvée.</p>
    <?php endif;
} catch (PDOException $event) {
    die('Erreur : ' . $event->getMessage());
}
?>
