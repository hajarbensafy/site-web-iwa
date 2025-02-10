<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Administration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gradient-to-br from-emerald-50 via-emerald-100 to-emerald-200 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
            <div class="flex-shrink-0">
                    <img src="./public/images/Ingénierie_du_Web_Avancé__3_-removebg-preview (1).png" alt="IWA Logo" class="h-[18vh]">
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="./dashboard.php" class="flex items-center px-4 py-2 text-emerald-600 bg-emerald-50 rounded-lg">
                        <i class="fas fa-home mr-2"></i>
                        Tableau de bord
                    </a>
                    <a href="./cours-admin.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-laptop-code mr-2"></i>
                        Cours
                    </a>
                    <a href="./etudiants.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-user-graduate mr-2"></i>
                        Étudiants
                    </a>
                    <a href="./notes.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-star mr-2"></i>
                        Notes
                    </a>
                    <a href="./attestations.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-file-alt mr-2"></i>
                        Attestations
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
                        <i class="fas fa-home text-emerald-600 text-2xl"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">Tableau de bord</h1>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <?php
                require_once "config.php";

                // Count total students
                $sql_students = "SELECT COUNT(*) as total_students FROM etudiant";
                $result_students = mysqli_query($link, $sql_students);
                $total_students = mysqli_fetch_assoc($result_students)['total_students'];

                // Count pending attestation requests
                $sql_attestations = "SELECT COUNT(*) as total_attestations FROM attestation";
                $result_attestations = mysqli_query($link, $sql_attestations);
                $total_attestations = mysqli_fetch_assoc($result_attestations)['total_attestations'];

                $sql_cours = "SELECT COUNT(*) as total_cours FROM cours";
                $result_cours = mysqli_query($link, $sql_cours);
                $total_cours = mysqli_fetch_assoc($result_cours)['total_cours'];

                mysqli_close($link);
                ?>

                <!-- Stats Cards -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-emerald-100">
                    <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 px-6 py-4">
                        <h2 class="text-white font-semibold text-lg">Total Étudiants</h2>
                    </div>
                    <div class="p-6">
                        <p class="text-3xl font-bold text-emerald-600"><?php echo $total_students; ?></p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-emerald-100">
                    <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 px-6 py-4">
                        <h2 class="text-white font-semibold text-lg">Demandes d'Attestation</h2>
                    </div>
                    <div class="p-6">
                        <p class="text-3xl font-bold text-emerald-600"><?php echo $total_attestations; ?></p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-emerald-100">
                    <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 px-6 py-4">
                        <h2 class="text-white font-semibold text-lg">Total Cours</h2>
                    </div>
                    <div class="p-6">
                        <p class="text-3xl font-bold text-emerald-600"><?php echo $total_cours; ?></p>
                    </div>
                </div>
            </div>

            <!-- Chart Section -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-emerald-100">
                <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 px-6 py-4">
                    <h2 class="text-white font-semibold text-lg">Statistiques</h2>
                </div>
                <div class="p-6">
                    <canvas id="statsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-emerald-200 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <img src="./public/images/image12.png" alt="IWA Logo" class="h-14 mb-4">
                    <p class="text-gray-800 text-lg">Formation supérieure en ingénierie web avancée</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-emerald-800">Contact</h3>
                    <div class="space-y-2">
                        <a href="mailto:iwa@uae.ac.ma" class="text-gray-800 hover:text-emerald-700 transition-colors flex items-center">
                            <i class="fas fa-envelope text-emerald-600 mr-2"></i>
                            iwa@uae.ac.ma
                        </a>
                        <p class="text-gray-800 flex items-center">
                            <i class="fas fa-phone text-emerald-600 mr-2"></i>
                            06 62 10 21 67
                        </p>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-emerald-800">Restez connecté</h3>
                    <form class="space-y-4">
                        <input type="email" placeholder="Votre email" class="w-full px-4 py-2 rounded-lg focus:ring-2 focus:ring-emerald-500 border-emerald-200">
                        <button type="submit" class="bg-emerald-600 text-white px-6 py-2 rounded-lg hover:bg-emerald-700 transition-colors">
                            S'inscrire
                        </button>
                    </form>
                </div>
            </div>
            <div class="border-t border-emerald-300 mt-12 pt-8">
                <p class="text-gray-800 text-center">© 2025 IWA. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        function logout() {
            sessionStorage.clear();
            window.location.href = './index.php';
        }

        // Chart configuration
        const ctx = document.getElementById('statsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Étudiants', 'Attestations', 'Cours'],
                datasets: [{
                    label: 'Totaux',
                    data: [<?php echo $total_students; ?>, <?php echo $total_attestations; ?>, <?php echo $total_cours; ?>],
                    backgroundColor: [
                        'rgba(16, 185, 129, 0.2)',
                        'rgba(16, 185, 129, 0.4)',
                        'rgba(16, 185, 129, 0.6)'
                    ],
                    borderColor: [
                        'rgb(16, 185, 129)',
                        'rgb(16, 185, 129)',
                        'rgb(16, 185, 129)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
</body>
</html>