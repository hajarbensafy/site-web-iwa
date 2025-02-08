<?php
require_once "config.php";

// Fetch courses from database
$sql = "SELECT * FROM courses ORDER BY date_added DESC";
$result = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Cours - Administration IWA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-emerald-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-20">
                <div class="flex-shrink-0 flex items-center">
                    <img src="./public/images/image12.png" alt="IWA Logo" class="h-[12vh]">
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="./dashboard.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-home mr-2"></i>
                        Tableau de bord
                    </a>
                    <a href="./cours-admin.php" class="flex items-center px-4 py-2 text-emerald-600 bg-emerald-50 rounded-lg">
                        <i class="fas fa-book mr-2"></i>
                        Cours
                    </a>
                    <a href="etudiants.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-user-graduate mr-2"></i>
                        Étudiants
                    </a>
                    <button onclick="logout()" class="flex items-center px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-all duration-300">
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
                        <i class="fas fa-book text-emerald-600 text-2xl"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">Gestion des Cours</h1>
                </div>
                <button onclick="openAddModal()" class="bg-gradient-to-r from-emerald-600 to-emerald-700 text-white px-6 py-3 rounded-lg hover:from-emerald-700 hover:to-emerald-800 transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center space-x-2">
                    <i class="fas fa-plus mr-2"></i>
                    <span>Ajouter un cours</span>
                </button>
            </div>

            <!-- Course Table -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 px-6 py-4">
                    <h2 class="text-white font-semibold text-lg">Liste des cours</h2>
                </div>
                <div class="p-6 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-emerald-50">
                                <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-900">Matière</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-900">Titre</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-900">Date d'ajout</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-900">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr class="hover:bg-emerald-50/50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-700"><?php echo htmlspecialchars($row['matiere']); ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-700"><?php echo htmlspecialchars($row['titre']); ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-700"><?php echo date('d/m/Y', strtotime($row['date_added'])); ?></td>
                                    <td class="px-6 py-4 text-sm space-x-3">
                                        <a href="view_course.php?id=<?php echo $row['id']; ?>" class="text-emerald-600 hover:text-emerald-800 transition-colors">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="edit_course.php?id=<?php echo $row['id']; ?>" class="text-emerald-600 hover:text-emerald-800 transition-colors">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="delete_course.php?id=<?php echo $row['id']; ?>" class="text-red-600 hover:text-red-800 transition-colors" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                }
                            } else {
                                echo '<tr><td colspan="4" class="px-6 py-4 text-center text-gray-500">Aucun cours trouvé</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Course Modal -->
    <div id="addModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-8 max-w-lg w-full">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-900">Ajouter un nouveau cours</h3>
                <button onclick="closeAddModal()" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form action="add_course.php" method="POST" class="space-y-6">
                <div>
                    <label for="matiere" class="block text-sm font-medium text-gray-700">Matière</label>
                    <input type="text" id="matiere" name="matiere" required 
                           class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                </div>
                <div>
                    <label for="titre" class="block text-sm font-medium text-gray-700">Titre</label>
                    <input type="text" id="titre" name="titre" required 
                           class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="4" 
                              class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"></textarea>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeAddModal()" 
                            class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                        Annuler
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openAddModal() {
            document.getElementById('addModal').classList.remove('hidden');
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.add('hidden');
        }

        function logout() {
            sessionStorage.clear();
            window.location.href = './index.php';
        }
    </script>
</body>
</html>