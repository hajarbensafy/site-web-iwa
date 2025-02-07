<?php
require_once "config.php";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $IDEt = $_POST['IDEt']; // Récupérer l'IDE du formulaire
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $Tel = $_POST['Tel'];
    $Email = $_POST['Email'];
   

    // Insert the new student into the database
    $insert_sql = "INSERT INTO etudiant (IDEt, Nom, Prenom, Tel, Email) 
                   VALUES ('$IDEt', '$Nom', '$Prenom', '$Tel', '$Email')";

    if (mysqli_query($link, $insert_sql)) {
        header("Location: etudiants.php");
        exit();
    } else {
        echo "Erreur lors de l'ajout de l'étudiant : " . mysqli_error($link);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Étudiant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-50 via-blue-100 to-blue-200 min-h-screen">
    <!-- Navbar (Same as etudiants.php) -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <!-- Navbar content here -->
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 pt-28 pb-12">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
                <div class="flex items-center space-x-4">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <i class="fas fa-user-graduate text-blue-600 text-2xl"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">Ajouter un Étudiant</h1>
                </div>
            </div>

            <!-- Create Form -->
            <form method="POST" action="">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 p-6">
                    <div class="space-y-4">
                        <div>
                            <label for="IDEt" class="block text-sm font-medium text-gray-700">IDE:</label>
                            <input type="number" id="IDEt" name="IDEt" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="Nom" class="block text-sm font-medium text-gray-700">Nom:</label>
                            <input type="text" id="Nom" name="Nom" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="Prenom" class="block text-sm font-medium text-gray-700">Prénom:</label>
                            <input type="text" id="Prenom" name="Prenom" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="Tel" class="block text-sm font-medium text-gray-700">Téléphone:</label>
                            <input type="text" id="Tel" name="Tel" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="Email" class="block text-sm font-medium text-gray-700">Email:</label>
                            <input type="Email" id="Email" name="Email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                       
                       
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-8">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition-colors">
                        Ajouter
                    </button>
                    <a href="etudiants.php" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600 transition-colors ml-2">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer (Same as etudiants.php) -->
    <footer class="bg-blue-200 text-white">
        <!-- Footer content here -->
    </footer>
</body>
</html>