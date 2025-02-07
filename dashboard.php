<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Administration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
<body class="bg-gradient-to-br from-primary-50 via-primary-100 to-primary-200 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0">
                    <img src="./public/images/image12.png" alt="IWA Logo" class="h-[12vh]">
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="./dashboard.php" class="flex items-center px-4 py-2 text-primary-600 bg-primary-50 rounded-lg">
                        <i class="fas fa-home mr-2"></i>
                        Tableau de bord
                    </a>
                    <a href="./cours-admin.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition-all duration-300">
                    <i class="fas fa-laptop-code mr-2"></i>
                        cours
                    </a>
                    <a href="etudiants.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-user-graduate mr-2"></i>
                        Étudiants
                    </a>
                    <a href="./notes.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-star mr-2"></i>
                        Notes
                    </a>
                    <a href="./attestations.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition-all duration-300">
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
                    <div class="bg-primary-100 p-3 rounded-lg">
                        <i class="fas fa-home text-primary-600 text-2xl"></i>
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

                // Close connection
                mysqli_close($link);
                ?>

                <!-- Total Students Card -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                    <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-6 py-4">
                        <h2 class="text-white font-semibold text-lg">Total Étudiants</h2>
                    </div>
                    <div class="p-6">
                        <p class="text-3xl font-bold text-primary-600"><?php echo $total_students; ?></p>
                    </div>
                </div>

                <!-- Pending Attestations Card -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                    <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-6 py-4">
                        <h2 class="text-white font-semibold text-lg">Demandes d'Attestation</h2>
                    </div>
                    <div class="p-6">
                        <p class="text-3xl font-bold text-primary-600"><?php echo $total_attestations; ?></p>
                    </div>
                </div>

                <!-- Total Cours Card -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                    <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-6 py-4">
                        <h2 class="text-white font-semibold text-lg">Total Cours</h2>
                    </div>
                    <div class="p-6">
                        <p class="text-3xl font-bold text-primary-600"><?php echo $total_cours; ?></p>
                    </div>
                </div>
            </div>

            <!-- Graphique -->
            <div class="bg-white w-50 rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-6 py-4">
                    <h2 class="text-white font-semibold text-lg">Statistiques</h2>
                </div>
                <div class="p-6">
                    <canvas id="statsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-primary-200 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <img src="./public/images/image12.png" alt="IWA Logo" class="h-14 mb-4">
                    <p class="text-black text-lg">Formation supérieure en ingénierie web avancée</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-primary-800">Contact</h3>
                    <div class="space-y-2">
                        <a href="mailto:iwa@uae.ac.ma" class="text-black hover:text-white transition-colors flex items-center">
                            <svg class="w-5 h-5 mr-2 text-primary-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            iwa@uae.ac.ma
                        </a>
                        <p class="text-black flex items-center">
                            <svg class="w-5 h-5 mr-2 text-primary-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            06 62 10 21 67
                        </p>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-primary-800">Restez connecté</h3>
                    <form class="space-y-4">
                        <div>
                            <input type="email" placeholder="Votre email" class="w-full px-4 py-2 rounded-lg bg-white focus:outline-none focus:border-primary-500">
                        </div>
                        <button type="submit" class="bg-primary-600 text-white px-6 py-2 rounded-md hover:bg-primary-700 transition-colors">
                            S'inscrire
                        </button>
                    </form>
                </div>
            </div>
            <div class="border-t border-white justify-center mt-12 pt-8 items-center">
                <p class="text-black text-center">© 2025 IWA. Tous droits réservés.</p>
            </div>
        </div>
        <a href="#" class="fixed bottom-8 right-8 bg-primary-600 p-3 rounded-full shadow-lg hover:bg-primary-700 transition-colors">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
            </svg>
        </a>
    </footer>

    <script>
        function logout() {
            sessionStorage.clear();
            window.location.href = './index.php';
        }

        // Récupérer les données PHP et les passer à JavaScript
        const totalStudents = <?php echo $total_students; ?>;
        const totalAttestations = <?php echo $total_attestations; ?>;
        const totalCours = <?php echo $total_cours; ?>;

        // Configuration du graphique
        const ctx = document.getElementById('statsChart').getContext('2d');
        const statsChart = new Chart(ctx, {
            type: 'bar', // Type de graphique (bar, line, pie, etc.)
            data: {
                labels: ['Étudiants', 'Attestations', 'Cours'], // Étiquettes des axes
                datasets: [{
                    label: 'Totaux',
                    data: [totalStudents, totalAttestations, totalCours], // Données
                    backgroundColor: [
                        'rgba(34, 197, 94, 0.2)', // Couleur pour les étudiants (vert)
                        'rgba(34, 197, 94, 0.4)', // Couleur pour les attestations (vert plus foncé)
                        'rgba(34, 197, 94, 0.6)'  // Couleur pour les cours (vert encore plus foncé)
                    ],
                    borderColor: [
                        'rgba(34, 197, 94, 1)', // Bordure pour les étudiants (vert)
                        'rgba(34, 197, 94, 1)', // Bordure pour les attestations (vert)
                        'rgba(34, 197, 94, 1)'  // Bordure pour les cours (vert)
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true // Commencer l'axe Y à 0
                    }
                },
                plugins: {
                    legend: {
                        display: false // Masquer la légende
                    }
                }
            }
        });
    </script>
</body>
</html>

