<?php
session_start();

// Predefined login credentials (for demo purposes, replace with real authentication in production)
$valid_username = 'admin';
$valid_password = 'admin'; // In a real app, hash and verify passwords

// Handle login form submission
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simple validation for demo purposes
    if ($username === $valid_username && $password === $valid_password) {
        // Set session variable to indicate that the user is logged in
        $_SESSION['isAdminLoggedIn'] = true;
        header("Location: ./dashboard.php"); // Redirect to the dashboard page
        exit;
    } else {
        $error_message = "Identifiants incorrects";
    }
}

// Redirect if already logged in
if (isset($_SESSION['isAdminLoggedIn']) && $_SESSION['isAdminLoggedIn'] === true) {
    header("Location: ./dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
</head>
<body class="bg-custom-green-50 flex justify-center items-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <div class="text-center mb-8">
            <img src="../public/images/image1.png" alt="Logo" class="mx-auto mb-6 h-24">
            <h1 class="text-3xl font-bold text-custom-green-800">Espace Administrateur</h1>
            <p class="text-sm text-custom-green-600 mt-2">Connectez-vous à votre espace administrateur</p>
        </div>

        <!-- Show error message if login fails -->
        <?php if (isset($error_message)): ?>
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
                <strong>Erreur:</strong> <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <!-- Login Form -->
        <form action="login.php" method="POST" class="space-y-6">
            <div class="form-group">
                <label for="username" class="block text-sm font-medium text-custom-green-700 mb-1">Identifiant</label>
                <input type="text" name="username" id="username" class="w-full p-3 border border-custom-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-green-500" required>
            </div>

            <div class="form-group">
                <label for="password" class="block text-sm font-medium text-custom-green-700 mb-1">Mot de passe</label>
                <input type="password" name="password" id="password" class="w-full p-3 border border-custom-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-green-500" required>
            </div>

            <button type="submit" name="login" class="w-full py-3 bg-custom-green-600 text-white font-semibold rounded-lg hover:bg-custom-green-700 transition duration-300">
                Se connecter
            </button>
        </form>

        <!-- Footer Link -->
        <div class="mt-8 text-center">
            <a href="./index.php" class="text-custom-green-600 hover:text-custom-green-800 hover:underline">Retour au site</a>
        </div>
    </div>

</body>
</html>

