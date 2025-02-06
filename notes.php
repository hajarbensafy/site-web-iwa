<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Notes - Administration</title>
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
<body class="bg-gradient-to-br from-custom-green-50 via-custom-green-100 to-custom-green-200 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0">
                    <img src="./public/images/image12.png" alt="IWA Logo" class="h-[12vh]">
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="./dashboard.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-custom-green-600 hover:bg-custom-green-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-home mr-2"></i>
                        Tableau de bord
                    </a>
                    <a href="./etudiants.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-custom-green-600 hover:bg-custom-green-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-user-graduate mr-2"></i>
                        Étudiants
                    </a>
                    <a href="./notes.php" class="flex items-center px-4 py-2 text-custom-green-600 bg-custom-green-50 rounded-lg">
                        <i class="fas fa-star mr-2"></i>
                        Notes
                    </a>
                    <a href="./attestations.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-custom-green-600 hover:bg-custom-green-50 rounded-lg transition-all duration-300">
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
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 pt-28 pb-12">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
                <div class="flex items-center space-x-4">
                    <div class="bg-custom-green-100 p-3 rounded-lg">
                        <i class="fas fa-star text-custom-green-600 text-2xl"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">Gestion des Notes</h1>
                </div>
                <a href="create_note.php" class="bg-gradient-to-r from-custom-green-600 to-custom-green-700 text-white px-6 py-3 rounded-lg hover:from-custom-green-700 hover:to-custom-green-800 transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center space-x-2">
                    <i class="fas fa-plus"></i>
                    <span>Nouvelle Note</span>
                </a>
            </div>

            <!-- Table Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-custom-green-600 to-custom-green-700 px-6 py-4">
                    <h2 class="text-white font-semibold text-lg">Liste des notes</h2>
                </div>
                <div class="p-6 overflow-x-auto">
                    <?php
                    require_once "config.php";

                    // Requête SQL corrigée
                    $sql = "SELECT 
                        etudiant.IDEt,         
                        etudiant.Nom, 
                        etudiant.Prenom, 
                        note.Note, 
                        matiere.Matiere, 
                        matiere.Semestre,
                        note.Note
                    FROM 
                        note
                    INNER JOIN 
                        etudiant 
                    ON 
                        note.IDEt = etudiant.IDEt
                    INNER JOIN
                        matiere
                    ON
                        note.RefMat = matiere.RefMat";

                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                    ?>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-custom-green-50">
                                <th class="px-6 py-4 text-left text-sm font-semibold text-custom-green-900">#</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-custom-green-900">Nom</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-custom-green-900">Prénom</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-custom-green-900">Note</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-custom-green-900">Matière</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-custom-green-900">Semestre</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-custom-green-900">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php while ($row = mysqli_fetch_array($result)) { ?>
                            <tr class="hover:bg-custom-green-50/50 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-700"><?php echo $row['IDEt']; ?></td>
                                <td class="px-6 py-4 text-sm text-gray-700"><?php echo $row['Nom']; ?></td>
                                <td class="px-6 py-4 text-sm text-gray-700"><?php echo $row['Prenom']; ?></td>
                                <td class="px-6 py-4 text-sm text-gray-700"><?php echo $row['Note']; ?></td>
                                <td class="px-6 py-4 text-sm text-gray-700"><?php echo $row['Matiere']; ?></td>
                                <td class="px-6 py-4 text-sm text-gray-700"><?php echo $row['Semestre']; ?></td>
                                <td class="px-6 py-4 text-sm space-x-3">
                                    <a href="./view_note.php?IDEt=<?php echo $row['IDEt']; ?>" class="text-custom-green-600 hover:text-custom-green-800 transition-colors">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="./update_note.php?IDEt=<?php echo $row['IDEt']; ?>" class="text-custom-green-600 hover:text-custom-green-800 transition-colors">
                                        <i class="fas fa-pencil"></i>
                                    </a>
                                    <a href="./delete_note.php?IDEt=<?php echo $row['IDEt']; ?>" class="text-red-600 hover:text-red-800 transition-colors">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php
                        } else {
                            echo '<div class="text-center py-8 text-gray-500">Aucune note trouvée.</div>';
                        }
                        mysqli_free_result($result);
                    } else {
                        echo '<div class="text-center py-8 text-red-500">Erreur SQL : ' . mysqli_error($link) . '</div>';
                    }
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-custom-green-200 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <img src="./public/images/image12.png" alt="IWA Logo" class="h-14 mb-4">
                    <p class="text-black text-lg">Formation supérieure en ingénierie web avancée</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-custom-green-800">Contact</h3>
                    <div class="space-y-2">
                        <a href="mailto:iwa@uae.ac.ma" class="text-black hover:text-white transition-colors flex items-center">
                            <svg class="w-5 h-5 mr-2 text-custom-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            iwa@uae.ac.ma
                        </a>
                        <p class="text-black flex items-center">
                            <svg class="w-5 h-5 mr-2 text-custom-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            06 62 10 21 67
                        </p>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-custom-green-800">Restez connecté</h3>
                    <form class="space-y-4">
                        <div>
                            <input type="email" placeholder="Votre email" class="w-full px-4 py-2 rounded-lg bg-white focus:outline-none focus:border-custom-green-500">
                        </div>
                        <button type="submit" class="bg-custom-green-600 text-white px-6 py-2 rounded-md hover:bg-custom-green-700 transition-colors">
                            S'inscrire
                        </button>
                    </form>
                </div>
            </div>
            <div class="border-t border-white justify-center mt-12 pt-8 items-center">
                <p class="text-black text-center">© 2025 IWA. Tous droits réservés.</p>
            </div>
        </div>
        <a href="#" class="fixed bottom-8 right-8 bg-custom-green-600 p-3 rounded-full shadow-lg hover:bg-custom-green-700 transition-colors">
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

