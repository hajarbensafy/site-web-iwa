<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "IWA_db"; // Remplacez par le nom de votre base de données

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $username_or_email = $_POST['username_or_email'];
    $motdepasse = $_POST['motdepasse'];

    // Vérifier si l'utilisateur est un admin
    $sql_admin = "SELECT * FROM admins WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql_admin);
    $stmt->bind_param("ss", $username_or_email, $motdepasse);
    $stmt->execute();
    $result_admin = $stmt->get_result();

    if ($result_admin->num_rows > 0) {
        // L'utilisateur est un admin, redirection vers dashboard.php
        header("Location: dashboard.php");
        exit();
    }

    // Vérifier si l'utilisateur est un étudiant
    $sql_etudiant = "SELECT * FROM etudiant WHERE Email = ? AND MotDePasse = ?";
    $stmt = $conn->prepare($sql_etudiant);
    $stmt->bind_param("ss", $username_or_email, $motdepasse);
    $stmt->execute();
    $result_etudiant = $stmt->get_result();

    if ($result_etudiant->num_rows > 0) {
        // L'utilisateur est un étudiant, redirection vers dashboard_etudiant.php
        header("Location: dashboard_etudiant.php");
        exit();
    } else {
        // L'utilisateur n'est ni admin ni étudiant
        echo "Identifiants incorrects";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion - IWA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'custom-green': {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        },
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="h-full bg-gradient-to-br from-custom-green-50 to-custom-green-100 flex justify-center items-center p-4">
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md transition-all duration-300 hover:shadow-xl">
        <div class="text-center mb-8">
            <img src="./public/images/Ingénierie_du_Web_Avancé__3_-removebg-preview (1).png" alt="Logo" class="mx-auto mb-4 w-32 h-auto">
            <h1 class="text-3xl font-bold text-custom-green-800 mb-2">Connexion</h1>
            <p class="text-sm text-custom-green-600">Connectez-vous pour accéder à votre espace</p>
        </div>
        <form method="POST" action="" class="space-y-6">
            <div>
                <label for="username_or_email" class="block text-sm font-medium text-custom-green-700 mb-1">Nom d'utilisateur ou Email</label>
                <input type="text" id="username_or_email" name="username_or_email" required
                    class="w-full px-4 py-2 border border-custom-green-300 rounded-lg focus:ring-2 focus:ring-custom-green-500 focus:border-transparent transition duration-200 outline-none"
                    placeholder="Entrez votre nom d'utilisateur ou email">
            </div>
            <div>
                <label for="motdepasse" class="block text-sm font-medium text-custom-green-700 mb-1">Mot de passe</label>
                <input type="password" id="motdepasse" name="motdepasse" required
                    class="w-full px-4 py-2 border border-custom-green-300 rounded-lg focus:ring-2 focus:ring-custom-green-500 focus:border-transparent transition duration-200 outline-none"
                    placeholder="Entrez votre mot de passe">
            </div>
            <div>
                <button type="submit" 
                    class="w-full py-3 bg-custom-green-600 text-white font-semibold rounded-lg hover:bg-custom-green-700 focus:outline-none focus:ring-2 focus:ring-custom-green-500 focus:ring-offset-2 transition duration-300 transform hover:scale-105">
                    Se connecter
                </button>
            </div>
        </form>
        <div class="mt-6 text-center">
            <a href="#" class="text-sm text-custom-green-600 hover:text-custom-green-800 transition duration-200">Mot de passe oublié ?</a>
        </div>
    </div>
</body>
</html>