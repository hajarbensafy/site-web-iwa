<?php
require_once 'config.php';

$success = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $idet = filter_input(INPUT_POST, 'IDEt', FILTER_SANITIZE_STRING);
    $type_attestation = filter_input(INPUT_POST, 'type_attestation', FILTER_SANITIZE_NUMBER_INT);
    $date_demande = date('Y-m-d');
    $annee = date('Y');

    if (empty($idet) || empty($type_attestation)) {
        $error = "Veuillez remplir tous les champs du formulaire.";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO attestation (IDEt, IDType, DateDem, Annee) VALUES (?, ?, ?, ?)");
            $stmt->execute([$idet, $type_attestation, $date_demande, $annee]);
            $success = "Votre demande d'attestation a été enregistrée avec succès!";
        } catch(PDOException $e) {
            $error = "Erreur: " . $e->getMessage();
            // Log the error for debugging purposes
            error_log($e->getMessage());
        }
    }
}

// Fetch attestation types
$types = $pdo->query("SELECT * FROM typeattestation")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande d'Attestation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-green-50 to-emerald-50 min-h-screen">
    <nav class="bg-white/90 backdrop-blur-md shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0">
                    <img src="./public/images/image12.png" alt="Logo" class="h-[12vh]">
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="./dashboard_etudiant.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg font-medium transition-all duration-300">
                        <i class="fas fa-home mr-2"></i>
                        Tableau de bord
                    </a>
                    <a href="./liste-cours.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg font-medium transition-all duration-300">
                        <i class="fas fa-book-open mr-2"></i>
                        Cours
                    </a>
                    <a href="./chat-cours.php" class="flex items-center px-4 py-2 text-white bg-green-600 rounded-lg font-medium transition-all duration-300">
                        <i class="fas fa-comments mr-2"></i>
                        Chat des Cours
                    </a>
                    <a href="./demandeAttestation.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-file-alt mr-2"></i>
                        Attestations
                    </a>
                    <button onclick="logout()" class="flex items-center px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg font-medium transition-all duration-300">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Déconnexion
                    </button>
                </div>
            </div>
        </div>
    </nav> 
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-xl shadow-lg">
            <div>
                <h2 class="text-center text-3xl font-extrabold text-gray-900">
                    Demande d'Attestation
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Remplissez le formulaire ci-dessous
                </p>
            </div>

            <?php if (!empty($success)): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline"><?php echo htmlspecialchars($success); ?></span>
                </div>
            <?php endif; ?>

            <?php if (!empty($error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline"><?php echo htmlspecialchars($error); ?></span>
                </div>
            <?php endif; ?>

            <form class="mt-8 space-y-6" method="POST">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="IDEt" class="block text-sm font-medium text-gray-700">
                            Numéro d'étudiant
                        </label>
                        <input id="IDEt" name="IDEt" type="text" required 
                            class="mt-1 appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm">
                    </div>

                    <div class="mt-4">
                        <label for="type_attestation" class="block text-sm font-medium text-gray-700">
                            Type d'attestation
                        </label>
                        <select id="type_attestation" name="type_attestation" required 
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            <option value="">Sélectionnez un type</option>
                            <?php foreach ($types as $type): ?>
                                <option value="<?php echo htmlspecialchars($type['IDType']); ?>">
                                    <?php echo htmlspecialchars($type['Type']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div>
                    <button type="submit" 
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Soumettre la demande
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>