<?php
require_once 'config.php';

$success = '';
$error = '';
$current_year = date('Y');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    $type_attestation = filter_input(INPUT_POST, 'type_attestation', FILTER_SANITIZE_NUMBER_INT);
    $date_demande = filter_input(INPUT_POST, 'dateDem', FILTER_SANITIZE_STRING) ?: date('Y-m-d');
    
    // Format année comme YYYY-01-01 pour être compatible avec le format datetime
    $annee = filter_input(INPUT_POST, 'annee', FILTER_SANITIZE_NUMBER_INT);
    $annee_formatted = $annee . '-01-01';

    if (empty($nom) || empty($prenom) || empty($type_attestation)) {
        $error = "Veuillez remplir tous les champs du formulaire.";
    } else {
        try {
            // First, check if student exists
            $stmt = $pdo->prepare("SELECT IDEt FROM etudiant WHERE Nom = ? AND Prenom = ?");
            $stmt->execute([$nom, $prenom]);
            $student = $stmt->fetch();

            if (!$student) {
                // Insert new student
                $stmt = $pdo->prepare("INSERT INTO etudiant (Nom, Prenom) VALUES (?, ?)");
                $stmt->execute([$nom, $prenom]);
                $idet = $pdo->lastInsertId();
            } else {
                $idet = $student['IDEt'];
            }

            // Insert attestation request with formatted year
            $stmt = $pdo->prepare("INSERT INTO attestation (IDEt, IDType, DateDem, Annee) VALUES (?, ?, ?, ?)");
            $stmt->execute([$idet, $type_attestation, $date_demande, $annee_formatted]);
            
            $success = "Votre demande d'attestation a été enregistrée avec succès!";
        } catch(PDOException $e) {
            $error = "Erreur lors de l'enregistrement: " . $e->getMessage();
            error_log($e->getMessage());
        }
    }
}

// Fetch attestation types
$types = $pdo->query("SELECT * FROM typeattestation")->fetchAll(PDO::FETCH_ASSOC);

// Generate year options (current year and next 4 years)
$years = range($current_year, $current_year + 4);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Attestation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
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
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-primary-50 to-white min-h-screen font-[Poppins]">
<nav class="bg-white/90 backdrop-blur-md shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0">
                    <img src="./public/images/image12.png" alt="Logo" class="h-[12vh]">
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="./dashboard_etudiant.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg font-medium transition-all duration-300">
                        <i class="fas fa-home mr-2"></i>
                        Tableau de bord
                    </a>
                    <a href="./liste-cours.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg font-medium transition-all duration-300">
                        <i class="fas fa-book-open mr-2"></i>
                        Cours
                    </a>
                    <a href="./create_attestation.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition-all duration-300">
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
<div class="min-h-screen pt-28 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg p-8 space-y-8">
                <!-- Header -->
                <div class="flex justify-between items-center">
                    <h1 class="text-3xl font-bold text-gray-900 flex items-center">
                        <i class="fas fa-file-alt text-primary-600 mr-3"></i>
                        Nouvelle Attestation
                    </h1>
                </div>

                <?php if ($success): ?>
                    <div class="bg-primary-50 border-l-4 border-primary-500 p-4 rounded-r-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-check-circle text-primary-500"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-primary-700"><?php echo $success; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($error): ?>
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle text-red-500"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-700"><?php echo $error; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="space-y-6">
                    <!-- Student Information -->
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div class="space-y-2">
                            <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" name="nom" id="nom" required
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 transition-colors duration-200">
                        </div>
                        <div class="space-y-2">
                            <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                            <input type="text" name="prenom" id="prenom" required
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 transition-colors duration-200">
                        </div>
                    </div>

                    <!-- Attestation Details -->
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div class="space-y-2">
                            <label for="type_attestation" class="block text-sm font-medium text-gray-700">
                                Type d'attestation
                            </label>
                            <select id="type_attestation" name="type_attestation" required 
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 transition-colors duration-200">
                                <option value="">Sélectionnez un type</option>
                                <?php foreach ($types as $type): ?>
                                    <option value="<?php echo htmlspecialchars($type['IDType']); ?>">
                                        <?php echo htmlspecialchars($type['Type']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label for="annee" class="block text-sm font-medium text-gray-700">
                                Année Académique
                            </label>
                            <select id="annee" name="annee" required 
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 transition-colors duration-200">
                                <?php foreach ($years as $year): ?>
                                    <option value="<?php echo $year; ?>" <?php echo ($year == $current_year) ? 'selected' : ''; ?>>
                                        <?php echo $year; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="dateDem" class="block text-sm font-medium text-gray-700">
                            Date de Demande
                        </label>
                        <input type="date" id="dateDem" name="dateDem" 
                            value="<?php echo date('Y-m-d'); ?>" 
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 transition-colors duration-200">
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-center space-x-4 pt-4">
                        <button type="submit" 
                            class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all duration-200">
                            <i class="fas fa-save mr-2"></i>
                            Créer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

