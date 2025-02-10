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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dateDem = $_POST['DateDem'];
    $Idtype = $_POST['IDType'];
    $Annee = $_POST['Annee'];

    $update_sql = "UPDATE attestation 
                   SET DateDem = '$dateDem', IDType = '$Idtype', Annee = '$Annee' 
                   WHERE RefAtt = '$ref'";

    if (mysqli_query($link, $update_sql)) {
        header("Location: attestations.php");
        exit();
    } else {
        echo "Error updating attestation: " . mysqli_error($link);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Attestation</title>
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
                    <h1 class="text-2xl font-bold text-gray-800">Modifier l'Attestation</h1>
                </div>
            </div>

            <!-- Update Form -->
            <form method="POST" action="">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 p-6">
                    <div class="space-y-4">
                        <p class="text-green-700"><strong>Étudiant:</strong> <?php echo $row['Nom'] . " " . $row['Prenom']; ?></p>
                        <div>
                            <label for="DateDem" class="block text-sm font-medium text-gray-700">Date de Demande:</label>
                            <input type="date" id="DateDem" name="DateDem" value="<?php echo $row['DateDem']; ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div>
                            <label for="IDType" class="block text-sm font-medium text-gray-700">Type:</label>
                            <input type="text" id="IDType" name="IDType" value="<?php echo $row['IDType']; ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div>
                            <label for="Annee" class="block text-sm font-medium text-gray-700">Année:</label>
                            <input type="text" id="Annee" name="Annee" value="<?php echo $row['Annee']; ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-8">
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition-colors">
                        Enregistrer
                    </button>
                    <a href="attestations.php" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600 transition-colors ml-2">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer (Same as attestations.php, but with green colors) -->
    <footer class="bg-green-200 text-white">
        <!-- Footer content here -->
    </footer>
</body>
</html>

