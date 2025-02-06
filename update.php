<?php
require_once "config.php";

// Get the student ID from the URL
$IDEt = $_GET['IDEt'];

// Fetch the student details from the database
$sql = "SELECT * FROM etudiant WHERE IDEt = $IDEt";
$result = mysqli_query($link, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    die("Étudiant non trouvé.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $Tel = $_POST['Tel'];
    $Email = $_POST['Email'];
    $RefFil = $_POST['RefFil'];

    $update_sql = "UPDATE etudiant 
                   SET Nom = '$Nom', Prenom = '$Prenom', Tel = '$Tel', 
                       Email = '$Email', RefFil = '$RefFil' 
                   WHERE IDEt = $IDEt";

    if (mysqli_query($link, $update_sql)) {
        header("Location: etudiants.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour de l'étudiant : " . mysqli_error($link);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Étudiant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-green-50 via-green-100 to-green-200 min-h-screen">
    <!-- Navbar (Same as etudiants.php, but with green colors) -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <!-- Navbar content here -->
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 pt-28 pb-12">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
                <div class="flex items-center space-x-4">
                    <div class="bg-green-100 p-3 rounded-lg">
                        <i class="fas fa-user-graduate text-green-600 text-2xl"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">Modifier l'Étudiant</h1>
                </div>
            </div>

            <!-- Update Form -->
            <form method="POST" action="">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 p-6">
                    <div class="space-y-4">
                        <div>
                            <label for="Nom" class="block text-sm font-medium text-gray-700">Nom:</label>
                            <input type="text" id="Nom" name="Nom" value="<?php echo $row['Nom']; ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div>
                            <label for="Prenom" class="block text-sm font-medium text-gray-700">Prénom:</label>
                            <input type="text" id="Prenom" name="Prenom" value="<?php echo $row['Prenom']; ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div>
                            <label for="Tel" class="block text-sm font-medium text-gray-700">Téléphone:</label>
                            <input type="text" id="Tel" name="Tel" value="<?php echo $row['Tel']; ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div>
                            <label for="Email" class="block text-sm font-medium text-gray-700">Email:</label>
                            <input type="email" id="Email" name="Email" value="<?php echo $row['Email']; ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div>
                            <label for="RefFil" class="block text-sm font-medium text-gray-700">ID Filière:</label>
                            <input type="text" id="RefFil" name="RefFil" value="<?php echo $row['RefFil']; ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-8">
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition-colors">
                        Enregistrer
                    </button>
                    <a href="etudiants.php" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600 transition-colors ml-2">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer (Same as etudiants.php, but with green colors) -->
    <footer class="bg-green-200 text-white">
        <!-- Footer content here -->
    </footer>
</body>
</html>

