<?php
require_once "config.php";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $IDEt = $_POST['IDEt'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form input
    if (!empty($IDEt) && !empty($email) && !empty($password)) {
        // Prepare and execute the query to fetch the etudiant record by etudiant_id or email
        $query = "SELECT * FROM etudiant WHERE IDEt = :etudiant_IDEt OR email = :email LIMIT 1";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['etudiant_IDEt' => $IDEt, 'email' => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Store session information if login is successful
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['IDEt'] = $user['etudiant_IDEt'];
            $_SESSION['email'] = $user['email'];

            // Redirect to etudiant space
            header("Location: ./dashboard_etudiant.php");
            exit;
        } else {
            $error_message = "Identifiants incorrects";
        }
    } else {
        $error_message = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Espace Étudiant</title>
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
            <img src="./public/images/image12.png" alt="Logo" class="mx-auto mb-4 h-20">
            <h1 class="text-3xl font-bold text-custom-green-800">Espace Étudiant</h1>
            <p class="text-sm text-custom-green-600 mt-2">Connectez-vous pour accéder à votre espace</p>
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
                <label for="IDEt" class="block text-sm font-medium text-custom-green-700 mb-1">Numéro étudiant</label>
                <input type="text" name="IDEt" id="IDEt" class="w-full p-3 border border-custom-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-green-500" required>
            </div>

            <div class="form-group">
                <label for="email" class="block text-sm font-medium text-custom-green-700 mb-1">Email</label>
                <input type="email" name="email" id="email" class="w-full p-3 border border-custom-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-green-500" required>
            </div>

            <div class="form-group">
                <label for="password" class="block text-sm font-medium text-custom-green-700 mb-1">Mot de passe</label>
                <input type="password" name="password" id="password" class="w-full p-3 border border-custom-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-green-500" required>
            </div>

            <button type="submit" class="w-full py-3 bg-custom-green-600 text-white font-semibold rounded-lg hover:bg-custom-green-700 transition duration-300">
                Se connecter
            </button>
        </form>

        <!-- Footer Link -->
        <div class="mt-8 text-center">
            <a href="./index.php" class="text-custom-green-600 hover:text-custom-green-800 hover:underline">Retour à l'accueil</a>
        </div>
    </div>

</body>
</html>

