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
    die("Attestation not found.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Attestation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-green-50 via-green-100 to-green-200 min-h-screen">
    <!-- Navbar (Same as attestations.php, but with green colors) -->
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
                    <h1 class="text-2xl font-bold text-gray-800">Détails de l'Attestation</h1>
                </div>
            </div>

            <!-- Attestation Details -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-green-200">
                <div class="p-6">
                    <div class="space-y-4">
                        <p><strong class="text-green-700">Référence:</strong> <span class="text-green-600"><?php echo $row['RefAtt']; ?></span></p>
                        <p><strong class="text-green-700">Date de Demande:</strong> <span class="text-green-600"><?php echo $row['DateDem']; ?></span></p>
                        <p><strong class="text-green-700">Type:</strong> <span class="text-green-600"><?php echo $row['IDType']; ?></span></p>
                        <p><strong class="text-green-700">Année:</strong> <span class="text-green-600"><?php echo $row['Annee']; ?></span></p>
                        <p><strong class="text-green-700">Étudiant:</strong> <span class="text-green-600"><?php echo $row['Nom'] . " " . $row['Prenom']; ?></span></p>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-8">
                <a href="attestations.php" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition-colors">
                    Retour
                </a>
            </div>
        </div>
    </div>

    <!-- Footer (Same as attestations.php, but with green colors) -->
    <footer class="bg-green-200 text-white">
        <!-- Footer content here -->
    </footer>
</body>
</html>

