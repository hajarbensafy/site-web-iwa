<?php
require_once "config.php";

$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $IDEt = mysqli_real_escape_string($link, $_POST['IDEt']);
    $RefMat = mysqli_real_escape_string($link, $_POST['RefMat']);
    $Note = mysqli_real_escape_string($link, $_POST['Note']);

    $sql = "INSERT INTO note (IDEt, RefMat, Note) VALUES ('$IDEt', '$RefMat', '$Note')";

    if (mysqli_query($link, $sql)) {
        $success_message = "La note a été ajoutée avec succès!";
    } else {
        $error_message = "Erreur: " . mysqli_error($link);
    }

    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Note</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-green-50 via-green-100 to-green-200 min-h-screen">
    <!-- Navbar
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0">
                    <img src="./public/images/image12.png" alt="IWA Logo" class="h-[12vh]">
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="./dashboard.php" class="flex items-center px-4 py-2 text-blue-600 bg-blue-50 rounded-lg">
                        <i class="fas fa-home mr-2"></i>
                        Tableau de bord
                    </a>
                    <a href="./cours-admin.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-laptop-code mr-2"></i>
                        Cours
                    </a>
                    <a href="etudiants.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-user-graduate mr-2"></i>
                        Étudiants
                    </a>
                    <a href="./notes.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-star mr-2"></i>
                        Notes
                    </a>
                    <a href="./attestations.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-file-alt mr-2"></i>
                        Attestations
                    </a>
                    <button onclick="logout()" class="flex items-center px-4 py-2 text-gray-700 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Déconnexion
                    </button>
                </div>
            </div>
        </div>
    </nav> -->

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 pt-28 pb-12">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
                <div class="flex items-center space-x-4">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <i class="fas fa-star text-blue-600 text-2xl"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">Ajouter une Note</h1>
                </div>
            </div>

            <!-- Feedback Messages -->
            <?php if (isset($success_message)): ?>
                <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4"><?= $success_message ?></div>
            <?php elseif (isset($error_message)): ?>
                <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-4"><?= $error_message ?></div>
            <?php endif; ?>

            <!-- Note Form -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mb-4">
                    <label for="IDEt" class="block text-sm font-medium text-gray-700">Étudiant</label>
                    <select id="IDEt" name="IDEt" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                        <?php
                        require_once "config.php";
                        $sql = "SELECT IDEt, Nom, Prenom FROM etudiant";
                        if ($result = mysqli_query($link, $sql)) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value='" . $row['IDEt'] . "'>" . $row['Nom'] . " " . $row['Prenom'] . "</option>";
                            }
                            mysqli_free_result($result);
                        }
                        mysqli_close($link);
                        ?>
                    </select>
                </div>

                <div class="mb-4">
    <label for="RefMat" class="block text-sm font-medium text-gray-700">Matière</label>
    <select id="RefMat" name="RefMat" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
        <?php
        require_once "config.php";

        // Ensure the connection to the database is established
        if ($link) {
            $sql = "SELECT RefMat, Matiere FROM matiere";
            $result = mysqli_query($link, $sql);

            // Check if the query was successful
            if ($result) {
                // Loop through and output each option for the dropdown
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['RefMat'] . "'>" . $row['Matiere'] . "</option>";
                }

                // Free the result set
                mysqli_free_result($result);
            } else {
                // Handle the case when the query fails
                echo "<option disabled>Aucune matière disponible</option>";
            }
        } else {
            // Handle the case when the database connection fails
            echo "<option disabled>Erreur de connexion à la base de données</option>";
        }

        // Close the database connection
        mysqli_close($link);
        ?>
    </select>
</div>


                <div class="mb-4">
                    <label for="Note" class="block text-sm font-medium text-gray-700">Note</label>
                    <input type="number" step="0.01" id="Note" name="Note" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="./notes.php" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Annuler</a>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-green-200 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <img src="./public/images/image12.png" alt="IWA Logo" class="h-14 mb-4">
                    <p class="text-black text-lg">Formation supérieure en ingénierie web avancée</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-green-800">Contact</h3>
                    <div class="space-y-2">
                        <a href="mailto:iwa@uae.ac.ma" class="text-black hover:text-white transition-colors flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            iwa@uae.ac.ma
                        </a>
                        <p class="text-black flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            06 62 10 21 67
                        </p>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-green-800">Restez connecté</h3>
                    <form class="space-y-4">
                        <div>
                            <input type="email" placeholder="Votre email" class="w-full px-4 py-2 rounded-lg bg-white focus:outline-none focus:border-green-500">
                        </div>
                        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition-colors">
                            S'inscrire
                        </button>
                    </form>
                </div>
            </div>
            <div class="border-t border-white justify-center mt-12 pt-8 items-center">
                <p class="text-black text-center">© 2025 IWA. Tous droits réservés.</p>
            </div>
        </div>
        <a href="#" class="fixed bottom-8 right-8 bg-green-600 p-3 rounded-full shadow-lg hover:bg-green-700 transition-colors">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
            </svg>
        </a>
    </footer>

    <script>
        function logout() {
            window.location.href = './logout.php'; // Redirection vers la page de déconnexion
        }
    </script>
</body>
</html>