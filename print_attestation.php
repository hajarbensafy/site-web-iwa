<?php
require_once "config.php";

// Récupérer la référence de l'attestation depuis l'URL
$ref = $_GET['RefAtt'];

// Récupérer les détails de l'attestation depuis la base de données
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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimer l'Attestation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-green-50 flex justify-center items-center min-h-screen p-4">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl border-2 border-green-500">
        <!-- En-tête de l'attestation -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-green-600">Attestation</h1>
            <p class="text-sm text-green-500">Référence: <?php echo $row['RefAtt']; ?></p>
        </div>

        <!-- Détails de l'attestation -->
        <div class="space-y-4">
            <div class="flex justify-between border-b border-green-200 pb-2">
                <span class="font-semibold text-green-700">Date de Demande:</span>
                <span class="text-green-600"><?php echo $row['DateDem']; ?></span>
            </div>
            <div class="flex justify-between border-b border-green-200 pb-2">
                <span class="font-semibold text-green-700">Type:</span>
                <span class="text-green-600"><?php echo $row['IDType']; ?></span>
            </div>
            <div class="flex justify-between border-b border-green-200 pb-2">
                <span class="font-semibold text-green-700">Année:</span>
                <span class="text-green-600"><?php echo $row['Annee']; ?></span>
            </div>
            <div class="flex justify-between border-b border-green-200 pb-2">
                <span class="font-semibold text-green-700">Étudiant:</span>
                <span class="text-green-600"><?php echo $row['Nom'] . " " . $row['Prenom']; ?></span>
            </div>
        </div>

        <!-- Boutons d'action -->
        <div class="no-print mt-8 flex justify-end space-x-4">
            <button onclick="window.print()" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition-colors">
                Imprimer
            </button>
            <a href="./attestations.php" class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600 transition-colors">
                Retour
            </a>
        </div>
    </div>
</body>
</html>