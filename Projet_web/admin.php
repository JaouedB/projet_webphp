<?php
$serveur = 'mysql-boulbayem.alwaysdata.net';
$db = 'boulbayem_web';
$utilisateur = 'boulbayem';
$mot_passe = 'steloi123';

// Connexion à la base de données
$conn = new mysqli($serveur, $utilisateur, $mot_passe, $db);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Suppression de la citation si le bouton "Supprimer" est cliqué
if (isset($_POST['delete'])) {
    $id_citation = $_POST['id_citation'];

    // Requête SQL pour supprimer la citation
    $delete_sql = "DELETE FROM Citation WHERE IDcitations = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $id_citation);
    $stmt->execute();
    $stmt->close();
}

// Requête SQL pour récupérer les données de la table "Citation"
$sql = "SELECT IDcitations, auteur, citations FROM Citation";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration Citation</title>
    <link rel="stylesheet" href="stylea.css">
    <link rel="stylesheet" href="responsive.css">
</head>
<body>
    <header>
        <div class="logosec">
            <div class="logo">Administration Citation</div>
        </div>
    </header>

    <main class="main">
        <div class="report-container">
            <div class="report-header">
                <h1 class="recent-citation">Citations</h1>
            </div>
            <div class="report-body">
                <div class="report-topic-heading">
                    <h3>Utilisateur</h3>
                    <h3>Auteur</h3>
                    <h3>Citation</h3>
                    <h3>Action</h3>
                </div>

                <!-- Début des citations -->
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="item">';
                        echo '<p class="t-op">#' . $row['IDcitations'] . '</p>';  // Identifiant utilisateur ou citation
                        echo '<p class="t-op">' . $row['auteur'] . '</p>';
                        echo '<p class="t-op">' . $row['citations'] . '</p>';
                        echo '<form method="POST" action="admin.php">';
                        echo '<input type="hidden" name="id_citation" value="' . $row['IDcitations'] . '">';
                        echo '<input type="submit" name="delete" value="Supprimer" class="label-tag">';
                        echo '</form>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>Aucune citation trouvée.</p>';
                }
                ?>
                <!-- Fin des citations -->
            </div>

            <!-- Bouton de retour -->
            <div style="margin-top: 20px; text-align: center;">
                <a href="index.html" class="label-tag" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Retour à l'accueil</a>
            </div>
        </div>
    </main>

</body>
</html>

<?php
// Fermer la connexion à la base de données
$conn->close();
?>
