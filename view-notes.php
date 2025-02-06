<?php
require_once "config.php";

// Vérifier si l'ID de l'étudiant est bien transmis
$note = isset($_GET['IDEt']) ? intval($_GET['IDEt']) : 0;

if ($note > 0) {
    // Requête SQL corrigée avec un filtre WHERE
    $sql = "SELECT 
                etudiant.IDEt,         
                etudiant.Nom, 
                etudiant.Prenom, 
                note.Note, 
                matiere.Matiere, 
                matiere.Semestre
            FROM note
            INNER JOIN etudiant ON note.IDEt = etudiant.IDEt
            INNER JOIN matiere ON note.RefMat = matiere.RefMat
            WHERE note.IDEt = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $note);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            } else {
                $errorMessage = "Aucune note trouvée pour cet étudiant.";
            }
        } else {
            $errorMessage = "Erreur lors de l'exécution de la requête.";
        }
        mysqli_stmt_close($stmt);
    } else {
        $errorMessage = "Erreur de préparation de la requête.";
    }
} else {
    $errorMessage = "ID de l'étudiant invalide.";
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Note - Administration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-emerald-50 via-emerald-100 to-emerald-200 min-h-screen">
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <img src="./public/images/image12.png" alt="IWA Logo" class="h-[12vh]">
                <div class="hidden md:flex space-x-8">
                    <a href="./dashboard.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-emerald-600 transition-colors">
                        <span class="mr-2">🏠</span> Tableau de bord
                    </a>
                    <a href="etudiants.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-emerald-600 transition-colors">
                        <span class="mr-2">🎓</span> Étudiants
                    </a>
                    <a href="./notes.php" class="flex items-center px-4 py-2 text-emerald-600 bg-emerald-50 rounded-lg">
                        <span class="mr-2">⭐</span> Notes
                    </a>
                    <a href="./attestations.php" class="flex items-center px-4 py-2 text-gray-700 hover:text-emerald-600 transition-colors">
                        <span class="mr-2">📜</span> Attestations
                    </a>
                    <button onclick="logout()" class="flex items-center px-4 py-2 text-red-600 hover:text-red-700 transition-colors">
                        <span class="mr-2">🚪</span> Déconnexion
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 pt-28 pb-12">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                    <span class="text-emerald-600 mr-3">📄</span> Détails de la Note
                </h1>
                <a href="./notes.php" class="bg-emerald-600 text-white px-6 py-3 rounded-lg hover:bg-emerald-700 transition-colors flex items-center">
                    <span class="mr-2">⬅</span> Retour
                </a>
            </div>

            <div class="bg-emerald-50 rounded-xl shadow-lg p-8 border border-emerald-100">
                <?php if (isset($row)): ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-emerald-500">
                            <p class="text-lg mb-2">
                                <span class="text-emerald-600 font-semibold">👨‍🎓 Étudiant:</span>
                                <span class="ml-2"><?= htmlspecialchars($row['Nom'] . " " . $row['Prenom']) ?></span>
                            </p>
                            <p class="text-lg">
                                <span class="text-emerald-600 font-semibold">📌 Note:</span>
                                <span class="ml-2 text-2xl font-bold"><?= htmlspecialchars($row['Note']) ?></span>
                            </p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-emerald-500">
                            <p class="text-lg mb-2">
                                <span class="text-emerald-600 font-semibold">📚 Matière:</span>
                                <span class="ml-2"><?= htmlspecialchars($row['Matiere']) ?></span>
                            </p>
                            <p class="text-lg">
                                <span class="text-emerald-600 font-semibold">📆 Semestre:</span>
                                <span class="ml-2"><?= htmlspecialchars($row['Semestre']) ?></span>
                            </p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="bg-red-50 text-red-600 p-4 rounded-lg">
                        <p class="flex items-center">
                            <span class="mr-2">⚠️</span>
                            <?= $errorMessage ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        function logout() {
            sessionStorage.clear();
            window.location.href = './index.php';
        }
    </script>
</body>
</html>