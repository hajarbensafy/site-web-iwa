<?php
require_once 'config.php';

// ... (Keep the existing PHP logic for handling course uploads and fetching data)

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
<body class="bg-gradient-to-br from-custom-green-50 via-custom-green-100 to-white min-h-screen">
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0">
                    <img src="./public/images/image12.png" alt="IWA Logo" class="h-12">
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="text-custom-green-600 hover:text-custom-green-800 px-3 py-2 rounded-md text-sm font-medium">Accueil</a>
                    <a href="#" class="text-custom-green-600 hover:text-custom-green-800 px-3 py-2 rounded-md text-sm font-medium">Cours</a>
                    <a href="#" class="text-custom-green-600 hover:text-custom-green-800 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 pt-28 pb-12">
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
                <div class="bg-gradient-to-r from-custom-green-500 to-custom-green-700 rounded-xl p-4 mb-6">
                    <h2 class="text-2xl font-bold text-white">Semestre <?php echo htmlspecialchars($semester); ?></h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($matieres as $refMat => $matiere): ?>
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-custom-green-200 transition-all duration-300 hover:shadow-xl">
                            <div class="bg-custom-green-500 p-4">
                                <h3 class="text-xl font-bold text-white"><?php echo htmlspecialchars($matiere['Matiere']); ?></h3>
                            </div>
                            <div class="p-6 space-y-4">
                                <?php if (empty($matiere['cours'])): ?>
                                    <p class="text-gray-500 text-center">Aucun cours disponible</p>
                                <?php else: ?>
                                    <?php foreach ($matiere['cours'] as $cours): ?>
                                        <a href="download.php?id=<?php echo $cours['id']; ?>" 
                                           class="flex items-center justify-between px-4 py-3 bg-custom-green-50 hover:bg-custom-green-100 text-custom-green-700 rounded-lg group transition-all duration-300">
                                            <span class="flex items-center">
                                                <i class="fas fa-file-pdf mr-3 text-custom-green-500"></i>
                                                <?php echo htmlspecialchars($cours['titre']); ?>
                                            </span>
                                            <i class="fas fa-download opacity-0 group-hover:opacity-100 transition-opacity"></i>
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

