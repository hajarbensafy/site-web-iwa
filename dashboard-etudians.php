<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Emplois du Temps et Enseignants - Administration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-emerald-50 via-emerald-100 to-emerald-200 min-h-screen">
    <nav class="bg-white/90 backdrop-blur-md shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0">
                    <img src="./public/images/image12.png" alt="Logo" class="h-[12vh]">
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="./dashboard_etudiant.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg font-medium transition-all duration-300">
                        <i class="fas fa-home mr-2"></i>
                        Tableau de bord
                    </a>
                    <a href="./liste-cours.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg font-medium transition-all duration-300">
                        <i class="fas fa-book-open mr-2"></i>
                        Cours
                    </a>
                    <a href="./create_attestation.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all duration-300">
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

    <div class="max-w-7xl mx-auto px-4 pt-28 pb-12">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 rounded-t-2xl pb-32 pt-12 relative overflow-hidden">
            <div class="absolute inset-0 bg-grid-white/[0.05] bg-[size:20px_20px]"></div>
            <div class="container mx-auto px-4 relative">
                <h1 class="text-4xl font-bold text-white text-center mb-2 drop-shadow-lg">Emplois du Temps et Enseignants</h1>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto px-4 -mt-24 pb-12 space-y-8">
            <!-- Schedule Section -->
            <div class="bg-white/90 backdrop-blur-xl rounded-2xl shadow-xl border border-emerald-100 overflow-hidden">
                <div class="border-b border-emerald-100">
                    <h2 class="text-2xl font-bold text-emerald-600 p-6 bg-gradient-to-r from-emerald-50/50 to-transparent">
                        Emplois du Temps
                    </h2>
                </div>

                <!-- Search and Filter Section -->
                <div class="p-6 border-b border-emerald-100 bg-white/80">
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="relative flex-1 max-w-xs">
                            <input type="text" id="schedule-search" placeholder="Rechercher une matière..."
                                class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-emerald-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all">
                            <i class="fas fa-search text-emerald-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                        </div>
                        <select id="schedule-day-filter"
                            class="rounded-xl border border-emerald-200 py-2.5 pl-4 pr-10 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all">
                            <option value="">Tous les jours</option>
                            <option value="Lundi">Lundi</option>
                            <option value="Mardi">Mardi</option>
                            <option value="Mercredi">Mercredi</option>
                            <option value="Jeudi">Jeudi</option>
                            <option value="Vendredi">Vendredi</option>
                            <option value="Samedi">Samedi</option>
                        </select>
                    </div>
                </div>

                <!-- Schedule Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-emerald-200">
                        <thead>
                            <tr class="bg-gradient-to-r from-emerald-50 to-emerald-100">
                                <th class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">Jour</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">Matière</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">Début</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">Fin</th>
                            </tr>
                        </thead>
                        <tbody id="schedule-table-body" class="bg-white divide-y divide-emerald-100">
                            <!-- Schedule data will be loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Teachers Section -->
            <div class="bg-white/90 backdrop-blur-xl rounded-2xl shadow-xl border border-emerald-100 overflow-hidden">
                <div class="border-b border-emerald-100">
                    <h2 class="text-2xl font-bold text-emerald-600 p-6 bg-gradient-to-r from-emerald-50/50 to-transparent">
                        Liste des Enseignants
                    </h2>
                </div>

                <!-- Teachers Search Section -->
                <div class="p-6 border-b border-emerald-100 bg-white/80">
                    <div class="relative max-w-xs">
                        <input type="text" id="teachers-search" placeholder="Rechercher un enseignant..."
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-emerald-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all">
                        <i class="fas fa-search text-emerald-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                    </div>
                </div>

                <!-- Teachers Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-emerald-200">
                        <thead>
                            <tr class="bg-gradient-to-r from-emerald-50 to-emerald-100">
                                <th class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">Nom</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">Prénom</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">Téléphone</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">Email</th>
                            </tr>
                        </thead>
                        <tbody id="teachers-table-body" class="bg-white divide-y divide-emerald-100">
                            <!-- Teachers data will be loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Floating Action Button -->
        <button class="fixed bottom-8 right-8 bg-gradient-to-r from-emerald-600 to-emerald-700 p-4 rounded-full shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 group focus:outline-none focus:ring-4 focus:ring-emerald-300">
            <i class="fas fa-plus text-white text-lg transform group-hover:rotate-90 transition-transform duration-300"></i>
        </button>
    </div>

    <script>
        // Your existing JavaScript code remains the same
        $(document).ready(function() {
            function loadTableData(tableId, url, params = {}) {
                $(`#${tableId}`).html('<tr><td colspan="5" class="px-6 py-4 text-center"><div class="inline-flex items-center"><svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-emerald-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Chargement...</div></td></tr>');

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: params,
                    success: function(response) {
                        $(`#${tableId}`).html(response);
                    },
                    error: function() {
                        $(`#${tableId}`).html('<tr><td colspan="5" class="px-6 py-4 text-sm text-red-500 text-center">Une erreur s\'est produite lors de la récupération des données.</td></tr>');
                    }
                });
            }

            // Initial load
            loadTableData('schedule-table-body', 'fetch_schedule.php');
            loadTableData('teachers-table-body', 'fetch_teachers.php');

            // Schedule filters
            let scheduleSearchTimeout;
            $('#schedule-search, #schedule-day-filter').on('input change', function() {
                clearTimeout(scheduleSearchTimeout);
                scheduleSearchTimeout = setTimeout(() => {
                    loadTableData('schedule-table-body', 'fetch_schedule.php', {
                        search: $('#schedule-search').val(),
                        jour: $('#schedule-day-filter').val()
                    });
                }, 300);
            });

            // Teachers search
            let teachersSearchTimeout;
            $('#teachers-search').on('input', function() {
                clearTimeout(teachersSearchTimeout);
                teachersSearchTimeout = setTimeout(() => {
                    loadTableData('teachers-table-body', 'fetch_teachers.php', {
                        search: $(this).val()
                    });
                }, 300);
            });
        });

        function logout() {
            sessionStorage.clear();
            window.location.href = './index.php';
        }
    </script>
</body>
</html>