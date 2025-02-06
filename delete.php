<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emplois du Temps et Enseignants</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-green-50 to-emerald-50 min-h-screen">
    <nav class="bg-white/90 backdrop-blur-md shadow-lg fixed w-full z-50">
        <!-- Contenu de la navigation -->
    </nav>
    <div class="max-w-7xl mx-auto px-4 pt-28 pb-12">
        <!-- Section d'en-tête -->
        <div class="bg-gradient-to-r from-green-600 to-emerald-600 pb-32 pt-12 relative overflow-hidden">
            <div class="absolute inset-0 bg-grid-white/[0.05] bg-[size:20px_20px]"></div>
            <div class="container mx-auto px-4 relative">
                <h1 class="text-4xl font-bold text-white text-center mb-2 drop-shadow-lg">
                    Emplois du Temps et Enseignants
                </h1>
            </div>
        </div>

        <!-- Contenu principal -->
        <div class="container mx-auto px-4 -mt-24 pb-12 space-y-8">
            <!-- Section Emplois du Temps -->
            <div class="bg-white/90 backdrop-blur-xl rounded-2xl shadow-xl border border-white/20 overflow-hidden animate-slide-up">
                <div class="border-b border-gray-100">
                    <h2 class="text-2xl font-bold text-green-600 p-6 bg-gradient-to-r from-green-50/50 to-transparent">
                        Emplois du Temps
                    </h2>
                </div>

                <!-- Section de recherche et de filtrage -->
                <div class="p-6 border-b border-gray-100 bg-white/80">
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="relative flex-1 max-w-xs">
                            <input
                                type="text"
                                placeholder="Rechercher une matière..."
                                class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all"
                            >
                            <i class="fas fa-search text-gray-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                        </div>
                        <select
                            class="rounded-xl border border-gray-200 py-2.5 pl-4 pr-10 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all"
                        >
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

                <!-- Tableau des emplois du temps -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gradient-to-r from-green-50 to-emerald-50">
                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-600 uppercase tracking-wider">
                                    Jour
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-600 uppercase tracking-wider">
                                    Matière
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-600 uppercase tracking-wider">
                                    Début
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-600 uppercase tracking-wider">
                                    Fin
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            <?php
                            $scheduleData = [
                                ['jour' => 'Lundi', 'matiere' => 'Mathématiques', 'debut' => '08:00', 'fin' => '10:00'],
                                ['jour' => 'Mardi', 'matiere' => 'Physique', 'debut' => '10:00', 'fin' => '12:00'],
                                // Ajoutez plus de données d'emploi du temps si nécessaire
                            ];

                            foreach ($scheduleData as $item) {
                                echo "<tr>";
                                echo "<td class='px-6 py-4 whitespace-nowrap'>{$item['jour']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap'>{$item['matiere']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap'>{$item['debut']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap'>{$item['fin']}</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Section des enseignants -->
            <div class="bg-white/90 backdrop-blur-xl rounded-2xl shadow-xl border border-white/20 overflow-hidden animate-slide-up">
                <div class="border-b border-gray-100">
                    <h2 class="text-2xl font-bold text-green-600 p-6 bg-gradient-to-r from-green-50/50 to-transparent">
                        Liste des Enseignants
                    </h2>
                </div>

                <!-- Section de recherche des enseignants -->
                <div class="p-6 border-b border-gray-100 bg-white/80">
                    <div class="relative max-w-xs">
                        <input
                            type="text"
                            placeholder="Rechercher un enseignant..."
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all"
                        >
                        <i class="fas fa-search text-gray-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                    </div>
                </div>

                <!-- Tableau des enseignants -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gradient-to-r from-green-50 to-emerald-50">
                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-600 uppercase tracking-wider">
                                    ID
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-600 uppercase tracking-wider">
                                    Nom
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-600 uppercase tracking-wider">
                                    Prénom
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-600 uppercase tracking-wider">
                                    Téléphone
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-600 uppercase tracking-wider">
                                    Email
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            <?php
                            $teachersData = [
                                ['id' => 1, 'nom' => 'Dupont', 'prenom' => 'Jean', 'telephone' => '0123456789', 'email' => 'jean.dupont@example.com'],
                                ['id' => 2, 'nom' => 'Martin', 'prenom' => 'Marie', 'telephone' => '0987654321', 'email' => 'marie.martin@example.com'],
                                // Ajoutez plus de données d'enseignants si nécessaire
                            ];

                            foreach ($teachersData as $teacher) {
                                echo "<tr>";
                                echo "<td class='px-6 py-4 whitespace-nowrap'>{$teacher['id']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap'>{$teacher['nom']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap'>{$teacher['prenom']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap'>{$teacher['telephone']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap'>{$teacher['email']}</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Bouton d'action flottant -->
        <button class="fixed bottom-8 right-8 bg-gradient-to-r from-green-600 to-emerald-600 p-4 rounded-full shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 group focus:outline-none focus:ring-4 focus:ring-green-300">
            <i class="fas fa-plus text-white text-lg transform group-hover:rotate-90 transition-transform duration-300"></i>
        </button>
    </div>
</body>
</html>