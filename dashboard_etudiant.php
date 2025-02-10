<?php
require_once "config.php";

// Function to fetch and display schedule
function displaySchedule($link, $search = '', $jour = '')
{
    $where_conditions = [];
    $params = [];
    $param_types = "";

    if (!empty($jour)) {
        $where_conditions[] = "e.jour = ?";
        $params[] = $jour;
        $param_types .= "s";
    }

    if (!empty($search)) {
        $where_conditions[] = "(e.nomMat LIKE ? OR ens.Nom LIKE ? OR ens.Prenom LIKE ?)";
        $params[] = "%$search%";
        $params[] = "%$search%";
        $params[] = "%$search%";
        $param_types .= "sss";
    }

    $sql = "SELECT e.jour, e.heure_debut, e.heure_fin, e.nomMat, 
                   CONCAT(ens.Nom, ' ', ens.Prenom) as enseignant
            FROM emplois_du_temps e
            LEFT JOIN enseignant ens ON e.RefEn = ens.RefEn";

    if (!empty($where_conditions)) {
        $sql .= " WHERE " . implode(" AND ", $where_conditions);
    }

    $sql .= " ORDER BY FIELD(jour, 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'), heure_debut";

    if ($stmt = mysqli_prepare($link, $sql)) {
        if (!empty($params)) {
            mysqli_stmt_bind_param($stmt, $param_types, ...$params);
        }

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                $currentDay = '';
                while ($row = mysqli_fetch_array($result)) {
                    $dayClass = $currentDay !== $row['jour'] ? 'border-t border-emerald-100' : '';
                    $currentDay = $row['jour'];

                    echo '<tr class="hover:bg-emerald-50/50 transition-colors ' . $dayClass . '">';
                    echo '<td class="px-6 py-4 whitespace-nowrap">';
                    echo '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-gradient-to-r from-emerald-100 to-emerald-200 text-emerald-800">' .
                        htmlspecialchars($row['jour']) . '</span>';
                    echo '</td>';
                    echo '<td class="px-6 py-4 text-sm font-medium text-gray-900">' .
                        htmlspecialchars($row['nomMat']) .
                        '<div class="text-xs text-emerald-600 mt-1">' .
                        htmlspecialchars($row['enseignant']) . '</div></td>';
                    echo '<td class="px-6 py-4 text-sm text-emerald-700">' . htmlspecialchars($row['heure_debut']) . '</td>';
                    echo '<td class="px-6 py-4 text-sm text-emerald-700">' . htmlspecialchars($row['heure_fin']) . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="4" class="px-6 py-4 text-sm text-emerald-600 text-center bg-emerald-50">Aucun emploi du temps trouvé.</td></tr>';
            }
        }
        mysqli_stmt_close($stmt);
    }
}

// Function to fetch and display teachers
function displayTeachers($link, $search = '')
{
    $sql = "SELECT RefEn, Nom, Prenom, Tel, Email FROM enseignant";
    $params = [];
    $param_types = "";

    if (!empty($search)) {
        $sql .= " WHERE Nom LIKE ? OR Prenom LIKE ? OR Email LIKE ?";
        $params = ["%$search%", "%$search%", "%$search%"];
        $param_types = "sss";
    }

    if ($stmt = mysqli_prepare($link, $sql)) {
        if (!empty($params)) {
            mysqli_stmt_bind_param($stmt, $param_types, ...$params);
        }

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr class="hover:bg-emerald-50/50 transition-colors">';
                    echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-emerald-700">' . htmlspecialchars($row['RefEn']) . '</td>';
                    echo '<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">' . htmlspecialchars($row['Nom']) . '</td>';
                    echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">' . htmlspecialchars($row['Prenom']) . '</td>';
                    echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-emerald-600">' . htmlspecialchars($row['Tel']) . '</td>';
                    echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-emerald-600">' . htmlspecialchars($row['Email']) . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="5" class="px-6 py-4 text-sm text-emerald-600 text-center bg-emerald-50">Aucun enseignant trouvé.</td></tr>';
            }
        }
        mysqli_stmt_close($stmt);
    }
}

$schedule_search = isset($_GET['schedule_search']) ? $_GET['schedule_search'] : '';
$schedule_day = isset($_GET['schedule_day']) ? $_GET['schedule_day'] : '';
$teachers_search = isset($_GET['teachers_search']) ? $_GET['teachers_search'] : '';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Emplois du Temps et Enseignants - Administration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-primary-50 to-white min-h-screen font-[Poppins]">
    <nav class="bg-white/90 backdrop-blur-md shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
            <div class="flex-shrink-0">
                    <img src="./public/images/Ingénierie_du_Web_Avancé__3_-removebg-preview (1).png" alt="IWA Logo" class="h-[18vh]">
                </div>
                
                <div class="hidden md:flex space-x-6">
                    <a href="./dashboard_etudiant.php"
                        class="flex items-center px-4 py-2 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg font-medium transition-all duration-300">
                        <i class="fas fa-home mr-2"></i>
                        Tableau de bord
                    </a>
                    <a href="./liste-cours.php"
                        class="flex items-center px-4 py-2 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg font-medium transition-all duration-300">
                        <i class="fas fa-book-open mr-2"></i>
                        Cours
                    </a>
                    <a href="./create_attestation.php"
                        class="flex items-center px-4 py-2 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-file-alt mr-2"></i>
                        Attestations
                    </a>
                    <button onclick="logout()"
                        class="flex items-center px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg font-medium transition-all duration-300">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Déconnexion
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <div class="min-h-screen pt-28 py-12 px-4 sm:px-6 lg:px-8">
    <!-- Header Section (Keep your existing header code here) -->

        <!-- Main Content -->
        <div class="container mx-auto px-4 mt-24 pb-12 space-y-8">
            <!-- Schedule Section -->
            <div class="bg-white/90 backdrop-blur-xl rounded-2xl shadow-xl border border-emerald-100 overflow-hidden">
                <div class="border-b border-emerald-100">
                    <h2
                        class="text-2xl font-bold text-emerald-600 p-6 bg-gradient-to-r from-emerald-50/50 to-transparent">
                        Emplois du Temps
                    </h2>
                </div>

                <!-- Search and Filter Section -->
                <div class="p-6 border-b border-emerald-100 bg-white/80">
                    <form action="" method="GET" class="flex flex-wrap items-center gap-4">
                        <div class="relative flex-1 max-w-xs">
                            <input type="text" name="schedule_search" placeholder="Rechercher une matière..."
                                value="<?php echo htmlspecialchars($schedule_search); ?>"
                                class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-emerald-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all">
                            <i class="fas fa-search text-emerald-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                        </div>
                        <select name="schedule_day"
                            class="rounded-xl border border-emerald-200 py-2.5 pl-4 pr-10 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all">
                            <option value="">Tous les jours</option>
                            <option value="Lundi" <?php echo $schedule_day === 'Lundi' ? 'selected' : ''; ?>>Lundi
                            </option>
                            <option value="Mardi" <?php echo $schedule_day === 'Mardi' ? 'selected' : ''; ?>>Mardi
                            </option>
                            <option value="Mercredi" <?php echo $schedule_day === 'Mercredi' ? 'selected' : ''; ?>>
                                Mercredi</option>
                            <option value="Jeudi" <?php echo $schedule_day === 'Jeudi' ? 'selected' : ''; ?>>Jeudi
                            </option>
                            <option value="Vendredi" <?php echo $schedule_day === 'Vendredi' ? 'selected' : ''; ?>>
                                Vendredi</option>
                            <option value="Samedi" <?php echo $schedule_day === 'Samedi' ? 'selected' : ''; ?>>Samedi
                            </option>
                        </select>
                        <button type="submit"
                            class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-2.5 px-4 rounded-xl transition duration-300">
                            Filtrer
                        </button>
                    </form>
                </div>

                <!-- Schedule Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-emerald-200">
                        <thead>
                            <tr class="bg-gradient-to-r from-emerald-50 to-emerald-100">
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">
                                    Jour</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">
                                    Matière</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">
                                    Début</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">
                                    Fin</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-emerald-100">
                            <?php displaySchedule($link, $schedule_search, $schedule_day); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Teachers Section -->
            <div class="bg-white/90 backdrop-blur-xl rounded-2xl shadow-xl border border-emerald-100 overflow-hidden">
                <div class="border-b border-emerald-100">
                    <h2
                        class="text-2xl font-bold text-emerald-600 p-6 bg-gradient-to-r from-emerald-50/50 to-transparent">
                        Liste des Enseignants
                    </h2>
                </div>

                <!-- Teachers Search Section -->
                <div class="p-6 border-b border-emerald-100 bg-white/80">
                    <form action="" method="GET" class="relative max-w-xs">
                        <input type="text" name="teachers_search" placeholder="Rechercher un enseignant..."
                            value="<?php echo htmlspecialchars($teachers_search); ?>"
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-emerald-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all">
                        <i class="fas fa-search text-emerald-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                        <button type="submit"
                            class="absolute right-2 top-1/2 -translate-y-1/2 bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-1 px-3 rounded-lg transition duration-300">
                            Rechercher
                        </button>
                    </form>
                </div>

                <!-- Teachers Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-emerald-200">
                        <thead>
                            <tr class="bg-gradient-to-r from-emerald-50 to-emerald-100">
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">
                                    ID</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">
                                    Nom</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">
                                    Prénom</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">
                                    Téléphone</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">
                                    Email</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-emerald-100">
                            <?php displayTeachers($link, $teachers_search); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Floating Action Button -->
        <button
            class="fixed bottom-8 right-8 bg-gradient-to-r from-emerald-600 to-emerald-700 p-4 rounded-full shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 group focus:outline-none focus:ring-4 focus:ring-emerald-300">
            <i
                class="fas fa-plus text-white text-lg transform group-hover:rotate-90 transition-transform duration-300"></i>
        </button>
    </div>

    <script>
        // Your existing JavaScript code remains the same
        $(document).ready(function () {
            function loadTableData(tableId, url, params = {}) {
                $(`#${tableId}`).html('<tr><td colspan="5" class="px-6 py-4 text-center"><div class="inline-flex items-center"><svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-emerald-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Chargement...</div></td></tr>');

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: params,
                    success: function (response) {
                        $(`#${tableId}`).html(response);
                    },
                    error: function () {
                        $(`#${tableId}`).html('<tr><td colspan="5" class="px-6 py-4 text-sm text-red-500 text-center">Une erreur s\'est produite lors de la récupération des données.</td></tr>');
                    }
                });
            }

            // Initial load
            loadTableData('schedule-table-body', 'fetch_schedule.php');
            loadTableData('teachers-table-body', 'fetch_teachers.php');

            // Schedule filters
            let scheduleSearchTimeout;
            $('#schedule-search, #schedule-day-filter').on('input change', function () {
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
            $('#teachers-search').on('input', function () {
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

<?php
mysqli_close($link);
?>