<?php
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Étudiants - Administration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-green-50 via-green-100 to-green-200 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0">
                    <img src="./public/images/Ingénierie_du_Web_Avancé__3_-removebg-preview (1).png" alt="IWA Logo"
                        class="h-[18vh]">
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
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Liste des Étudiants</h1>

            <a href="create.php" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">Ajouter un
                Nouvel Étudiant</a>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 mt-6">
                <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                    <h2 class="text-white font-semibold text-lg">Liste des étudiants</h2>
                </div>
                <div class="p-6 overflow-x-auto">
                    <?php
                    // Récupérer les étudiants avec leur filière
                    $sql = "SELECT e.IDEt, e.Nom, e.Prenom, e.Tel, e.Email, f.Filiere
                            FROM etudiant e
                            JOIN filiere f ON e.RefFil = f.RefFil";

                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            ?>
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr class="bg-green-50">
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-green-900">IDE</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-green-900">Nom</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-green-900">Prénom</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-green-900">Téléphone</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-green-900">Email</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-green-900">Filière</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-green-900">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                                        <tr class="hover:bg-green-50/50 transition-colors">
                                            <td class="px-6 py-4 text-sm text-gray-700"><?php echo $row['IDEt']; ?></td>
                                            <td class="px-6 py-4 text-sm text-gray-700"><?php echo $row['Nom']; ?></td>
                                            <td class="px-6 py-4 text-sm text-gray-700"><?php echo $row['Prenom']; ?></td>
                                            <td class="px-6 py-4 text-sm text-gray-700"><?php echo $row['Tel']; ?></td>
                                            <td class="px-6 py-4 text-sm text-gray-700"><?php echo $row['Email']; ?></td>
                                            <td class="px-6 py-4 text-sm text-gray-700"><?php echo $row['Filiere']; ?></td>
                                            <td class="px-6 py-4 text-sm space-x-4">
                                                <a href="./view.php?IDEt=<?php echo $row['IDEt']; ?>"
                                                    class="text-green-600 hover:text-green-800 transition-colors">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="./update.php?IDEt=<?php echo $row['IDEt']; ?>"
                                                    class="text-blue-600 hover:text-blue-800 transition-colors">
                                                    <i class="fas fa-pencil"></i>
                                                </a>
                                                <a href="./delete.php?IDEt=<?php echo $row['IDEt']; ?>"
                                                    class="text-red-600 hover:text-red-800 transition-colors">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php
                        } else {
                            echo '<div class="text-center py-8 text-gray-500">Aucun étudiant trouvé.</div>';
                        }
                        mysqli_free_result($result);
                    } else {
                        echo '<div class="text-center py-8 text-red-500">Une erreur s\'est produite. Veuillez réessayer plus tard.</div>';
                    }
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-green-200 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <i class="fas fa-graduation-cap text-green-800 text-4xl mb-4"></i>
                    <p class="text-black text-lg">Formation supérieure en ingénierie web avancée</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-green-800">Contact</h3>
                    <div class="space-y-2">
                        <a href="mailto:iwa@uae.ac.ma"
                            class="text-black hover:text-white transition-colors flex items-center">
                            <i class="fas fa-envelope text-green-800 mr-2"></i>
                            iwa@uae.ac.ma
                        </a>
                        <p class="text-black flex items-center">
                            <i class="fas fa-phone text-green-800 mr-2"></i>
                            06 62 10 21 67
                        </p>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-green-800">Restez connecté</h3>
                    <form class="space-y-4">
                        <input type="email" placeholder="Votre email"
                            class="w-full px-4 py-2 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-green-500" />
                        <button type="submit"
                            class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition-colors">
                            S'inscrire
                        </button>
                    </form>
                </div>
            </div>
            <div class="border-t border-white justify-center mt-12 pt-8 items-center">
                <p class="text-black text-center">© 2025 IWA. Tous droits réservés.</p>
            </div>
        </div>
        <a href="#"
            class="fixed bottom-8 right-8 bg-green-600 p-3 rounded-full shadow-lg hover:bg-green-700 transition-colors">
            <i class="fas fa-arrow-up text-white"></i>
        </a>
    </footer>

    <script>
        function logout() {
            sessionStorage.clear();
            window.location.href = './index.php';
        }
    </script>
</body>

</html>