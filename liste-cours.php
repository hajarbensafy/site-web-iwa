<?php
require_once 'config.php';

$success_message = '';
$error_message = '';

// Handle course upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_STRING);
    $ref_mat = filter_input(INPUT_POST, 'ref_mat', FILTER_SANITIZE_STRING);

    if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/cours/';
        $file_name = uniqid() . '_' . basename($_FILES['pdf_file']['name']);
        $file_path = $upload_dir . $file_name;

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        if (move_uploaded_file($_FILES['pdf_file']['tmp_name'], $file_path)) {
            $stmt = $pdo->prepare("INSERT INTO cours (ref_mat, titre, pdf_path, date_upload) VALUES (?, ?, ?, NOW())");
            if ($stmt->execute([$ref_mat, $titre, $file_path])) {
                $success_message = "Le cours a été uploadé avec succès.";
            } else {
                $error_message = "Une erreur est survenue lors de l'enregistrement du cours.";
            }
        } else {
            $error_message = "Une erreur est survenue lors de l'upload du fichier.";
        }
    } else {
        $error_message = "Veuillez sélectionner un fichier PDF valide.";
    }
}

// Récupérer toutes les matières avec leurs cours
$stmt = $pdo->query("
    SELECT m.*, c.id as cours_id, c.titre, c.pdf_path, c.date_upload 
    FROM matiere m 
    LEFT JOIN cours c ON m.RefMat = c.ref_mat 
    ORDER BY m.Semestre, m.Matiere
");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Grouper les matières et leurs cours par semestre
$matieresBySemester = [];
foreach ($results as $row) {
    if (!isset($matieresBySemester[$row['Semestre']][$row['RefMat']])) {
        $matieresBySemester[$row['Semestre']][$row['RefMat']] = [
            'Matiere' => $row['Matiere'],
            'RefMat' => $row['RefMat'],
            'cours' => []
        ];
    }
    if ($row['cours_id']) {
        $matieresBySemester[$row['Semestre']][$row['RefMat']]['cours'][] = [
            'id' => $row['cours_id'],
            'titre' => $row['titre'],
            'pdf_path' => $row['pdf_path'],
            'date_upload' => $row['date_upload']
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ressources Pédagogiques</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
<body class="bg-gradient-to-br from-primary-50 to-white min-h-screen font-[Poppins]">
<nav class="bg-white/90 backdrop-blur-md shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
            <div class="flex-shrink-0">
                    <img src="./public/images/Ingénierie_du_Web_Avancé__3_-removebg-preview (1).png" alt="IWA Logo" class="h-[18vh]">
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
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-custom-green-800 mb-4">Ressources Pédagogiques</h1>
            <p class="text-custom-green-600">Accédez à tous vos cours et supports pédagogiques</p>
        </div>

        <?php if ($success_message): ?>
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p><?php echo $success_message; ?></p>
        </div>
    <?php endif; ?>

    <?php if ($error_message): ?>
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
            <p><?php echo $error_message; ?></p>
        </div>
    <?php endif; ?>


    <?php foreach ($matieresBySemester as $semester => $matieres): ?>
        <div class="mb-12">
            <div class="bg-gradient-to-r from-custom-blue-500 to-custom-blue-700 rounded-xl p-4 mb-6">
                <h2 class="text-2xl font-bold bg-lime-100 text-center rounded-lg p-6 text-black">Semestre <?php echo htmlspecialchars($semester); ?></h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($matieres as $refMat => $matiere): ?>
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-custom-blue-200 transition-all duration-300 hover:shadow-xl">
                        <div class="bg-custom-blue-500 p-4">
                            <h3 class="text-xl font-bold text-black bg-green-100"><?php echo htmlspecialchars($matiere['Matiere']); ?></h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <?php if (empty($matiere['cours'])): ?>
                                <p class="text-gray-500 text-center">Aucun cours disponible</p>
                            <?php else: ?>
                                <?php foreach ($matiere['cours'] as $cours): ?>
                                    <a href="download.php?id=<?php echo $cours['id']; ?>" 
                                       class="flex items-center justify-between px-4 py-3 bg-custom-blue-50 hover:bg-custom-blue-100 text-custom-blue-700 rounded-lg group transition-all duration-300">
                                        <span class="flex items-center">
                                            <i class="fas fa-file-pdf mr-3 text-custom-blue-500"></i>
                                            <?php echo htmlspecialchars($cours['titre']); ?>
                                        </span>
                                        <i class="fas fa-download o text-green-300  transition-opacity"></i>
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
    <script>
    function logout() {
            sessionStorage.clear();
            window.location.href = './index.php';
        }
    </script>

    <footer class="bg-custom-green-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-wrap justify-between">
                <div class="w-full md:w-1/3 mb-6 md:mb-0">
                    <h3 class="text-xl font-bold mb-2">À propos</h3>
                    <p class="text-custom-green-100">Plateforme de ressources pédagogiques pour les étudiants IWA.</p>
                </div>
                <div class="w-full md:w-1/3 mb-6 md:mb-0">
                    <h3 class="text-xl font-bold mb-2">Contact</h3>
                    <p class="text-custom-green-100">Email: contact@iwa.com</p>
                    <p class="text-custom-green-100">Téléphone: +1234567890</p>
                </div>
                <div class="w-full md:w-1/3">
                    <h3 class="text-xl font-bold mb-2">Liens rapides</h3>
                    <ul class="text-custom-green-100">
                        <li><a href="#" class="hover:text-white">Accueil</a></li>
                        <li><a href="#" class="hover:text-white">Cours</a></li>
                        <li><a href="#" class="hover:text-white">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 text-center text-custom-green-200">
                <p>&copy; 2024 IWA. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>

