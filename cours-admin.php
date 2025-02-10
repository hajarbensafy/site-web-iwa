<?php
require_once 'config.php';

// Gérer l'upload de fichier
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ref_mat = $_POST['ref_mat'];
    $titre = $_POST['titre'];

    if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === 0) {
        $upload_dir = 'uploads/cours/';
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $file_name = uniqid() . '_' . basename($_FILES['pdf_file']['name']);
        $file_path = $upload_dir . $file_name;

        if (move_uploaded_file($_FILES['pdf_file']['tmp_name'], $file_path)) {
            $stmt = $pdo->prepare("INSERT INTO cours (ref_mat, titre, pdf_path, date_upload) VALUES (?, ?, ?, NOW())");
            $stmt->execute([$ref_mat, $titre, $file_path]);
            $success = "Le cours a été ajouté avec succès.";
        }
    }
}

// Supprimer un cours
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("SELECT pdf_path FROM cours WHERE id = ?");
    $stmt->execute([$id]);
    $cours = $stmt->fetch();

    if ($cours && file_exists($cours['pdf_path'])) {
        unlink($cours['pdf_path']);
    }

    $stmt = $pdo->prepare("DELETE FROM cours WHERE id = ?");
    $stmt->execute([$id]);
    $success = "Le cours a été supprimé avec succès.";
}

// Récupérer la liste des matières
$matieres = $pdo->query("SELECT * FROM matiere ORDER BY Matiere")->fetchAll();

// Récupérer la liste des cours
$stmt = $pdo->query("SELECT c.*, m.Matiere 
                     FROM cours c 
                     JOIN matiere m ON c.ref_mat = m.RefMat 
                     ORDER BY c.date_upload DESC");
$cours = $stmt->fetchAll();

// Calculer les statistiques
$total_cours = count($cours);
$total_matieres = count($matieres);
$cours_recent = array_slice($cours, 0, 5);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Cours - Administration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        emerald: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            200: '#a7f3d0',
                            300: '#6ee7b7',
                            400: '#34d399',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',
                        },
                    },
                },
            },
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-emerald-50 min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0">
                    <img src="./public/images/Ingénierie_du_Web_Avancé__3_-removebg-preview (1).png" alt="IWA Logo" class="h-[18vh]">
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="./dashboard.php"
                        class="flex items-center px-4 py-2 text-emerald-600 bg-emerald-50 rounded-lg">
                        <i class="fas fa-home mr-2"></i>
                        Tableau de bord
                    </a>
                    <a href="./cours-admin.php"
                        class="flex items-center px-4 py-2 text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-laptop-code mr-2"></i>
                        Cours
                    </a>
                    <a href="etudiants.php"
                        class="flex items-center px-4 py-2 text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-user-graduate mr-2"></i>
                        Étudiants
                    </a>
                    <a href="./notes.php"
                        class="flex items-center px-4 py-2 text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-star mr-2"></i>
                        Notes
                    </a>
                    <a href="./attestations.php"
                        class="flex items-center px-4 py-2 text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-file-alt mr-2"></i>
                        Attestations
                    </a>
                    <button onclick="logout()"
                        class="flex items-center px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Déconnexion
                    </button>
                </div>
            </div>
        </div>
    </nav>


      <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 pt-28 pb-12">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
                <div class="flex items-center space-x-4">
                    <div class="bg-emerald-100 p-3 rounded-lg">
                        <i class="fas fa-book-open text-emerald-600 text-2xl"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">Gestion des Cours</h1>
                </div>
                <button onclick="document.getElementById('addCourseModal').classList.remove('hidden')"
                    class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-2 px-4 rounded transition duration-300">
                    <i class="fas fa-plus mr-2"></i>
                    Ajouter un cours
                </button>
            </div>

            <?php if (isset($success)): ?>
                <div class="bg-emerald-100 border-l-4 border-emerald-500 text-emerald-700 p-4 mb-8" role="alert">
                    <p class="font-bold">Succès!</p>
                    <p><?php echo $success; ?></p>
                </div>
            <?php endif; ?>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 px-6 py-4 flex justify-between items-center">
                    <h2 class="text-white font-semibold text-lg">Liste des cours</h2>
                    <input type="text" id="searchInput" placeholder="Rechercher un cours..."
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-emerald-50">
                                <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-900">Matière</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-900">Titre</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-900">Date d'ajout</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-900">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($cours as $c): ?>
                                <tr class="hover:bg-emerald-50/50 transition-colors">
                                        <td class="px-6 py-4 text-sm text-gray-700">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center">
                                                        <i class="fas fa-book-open text-emerald-600"></i>
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <?php echo htmlspecialchars($c['Matiere']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-700">
                                            <div class="text-sm text-gray-900"><?php echo htmlspecialchars($c['titre']); ?>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-700">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-emerald-100 text-emerald-800">
                                                <?php echo date('d/m/Y', strtotime($c['date_upload'])); ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="<?php echo htmlspecialchars($c['pdf_path']); ?>" target="_blank"
                                                class="text-emerald-600 hover:text-emerald-900 mr-3">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <button onclick="previewPDF('<?php echo htmlspecialchars($c['pdf_path']); ?>')"
                                                class="text-emerald-600 hover:text-emerald-900 mr-3">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <a href="?delete=<?php echo $c['id']; ?>"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?')"
                                                class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Add Course Modal -->
    <div id="addCourseModal" class="hidden fixed z-50 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Ajouter un nouveau cours
                                </h3>
                                <div class="mt-2">
                                    <div class="mb-4">
                                        <label for="ref_mat"
                                            class="block text-sm font-medium text-gray-700">Matière</label>
                                        <select id="ref_mat" name="ref_mat" required
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm">
                                            <?php foreach ($matieres as $matiere): ?>
                                                <option value="<?php echo $matiere['RefMat']; ?>">
                                                    <?php echo htmlspecialchars($matiere['Matiere']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="titre" class="block text-sm font-medium text-gray-700">Titre du
                                            cours</label>
                                        <input type="text" name="titre" id="titre" required
                                            class="mt-1 focus:ring-emerald-500 focus:border-emerald-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label for="pdf_file" class="block text-sm font-medium text-gray-700">Fichier
                                            PDF</label>
                                        <input type="file" name="pdf_file" id="pdf_file" accept=".pdf" required
                                            class="mt-1 focus:ring-emerald-500 focus:border-emerald-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-emerald-600 text-base font-medium text-white hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Ajouter
                        </button>
                        <button type="button"
                            onclick="document.getElementById('addCourseModal').classList.add('hidden')"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Annuler
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function logout() {
            if (confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
                window.location.href = 'index.php';
            }
        }

        function previewPDF(path) {
            window.open(path, '_blank');
        }

        document.getElementById('searchInput').addEventListener('keyup', function (e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });
    </script>
</body>

</html>