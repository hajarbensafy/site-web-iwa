<?php
require_once "config.php";

// Get the attestation reference from the URL
$ref = $_GET['RefAtt'];

// Fetch the attestation details from the database
$sql = "SELECT a.*, e.Nom, e.Prenom 
        FROM attestation a 
        INNER JOIN etudiant e ON a.IDEt = e.IDEt 
        WHERE a.RefAtt = '$ref'";

$result = mysqli_query($link, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    die("Attestation non trouvée.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $delete_sql = "DELETE FROM attestation WHERE RefAtt = '$ref'";

    if (mysqli_query($link, $delete_sql)) {
        header("Location: attestations.php");
        exit();
    } else {
        echo "Erreur lors de la suppression de l'attestation : " . mysqli_error($link);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer l'Attestation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-green-50 via-green-100 to-green-200 min-h-screen">
    <!-- Navbar (Same as attestations.php) -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <!-- Navbar content here -->
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 pt-28 pb-12">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
                <div class="flex items-center space-x-4">
                    <div class="bg-green-100 p-3 rounded-lg">
                        <i class="fas fa-file-alt text-green-600 text-2xl"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">Supprimer l'Attestation</h1>
                </div>
            </div>

            <!-- Confirmation Message -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-green-100 p-6">
                <p class="text-lg text-gray-700">Êtes-vous sûr de vouloir supprimer cette attestation ?</p>
                <div class="mt-6 space-y-4">
                    <p><strong>Référence:</strong> <?php echo htmlspecialchars($row['RefAtt']); ?></p>
                    <p><strong>Étudiant:</strong> <?php echo htmlspecialchars($row['Nom'] . " " . $row['Prenom']); ?></p>
                    <p><strong>Date de Demande:</strong> <?php echo htmlspecialchars($row['DateDem']); ?></p>
                    <p><strong>Type:</strong> <?php echo htmlspecialchars($row['IDType']); ?></p>
                    <p><strong>Année:</strong> <?php echo htmlspecialchars($row['Annee']); ?></p>
                </div>
            </div>

            <!-- Delete and Cancel Buttons -->
            <form method="POST" action="" class="mt-8">
                <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-700 transition-colors">
                    <i class="fas fa-trash mr-2"></i>Supprimer
                </button>
                <a href="attestations.php" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition-colors ml-2">
                    <i class="fas fa-times mr-2"></i>Annuler
                </a>
            </form>
        </div>
    </div>

    <!-- Footer (Same as attestations.php) -->
    <footer class="bg-green-200 text-white">
        <!-- Footer content here -->
    </footer>
</body>
</html>