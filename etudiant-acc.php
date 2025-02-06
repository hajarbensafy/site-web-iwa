<?php
session_start();

// Vérifier si l'étudiant est connecté
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header("Location: login.php");
    exit;
}

require_once "config.php";

// Récupérer l'ID de l'étudiant connecté
$etudiant_id = $_SESSION['IDE'];

// Récupérer les notes de l'étudiant
$query = "SELECT * FROM notes WHERE etudiant_id = :etudiant_id";
$stmt = $pdo->prepare($query);
$stmt->execute(['etudiant_id' => $etudiant_id]);

$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes de l'Étudiant</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 flex justify-center items-center min-h-screen">
    <nav class="bg-green-600 text-white w-full fixed top-0 left-0 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Portail Étudiant</h1>
            <a href="logout.php" class="text-white hover:text-green-200 transition duration-300">Déconnexion</a>
        </div>
    </nav>
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl mt-16">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-green-800">Notes de l'Étudiant</h1>
            <p class="text-sm text-green-600">Voici vos notes</p>
        </div>

        <!-- Tableau des notes -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-green-300">
                <thead>
                    <tr class="bg-green-100">
                        <th class="p-3 border border-green-300 text-green-700">Matière</th>
                        <th class="p-3 border border-green-300 text-green-700">Note</th>
                        <th class="p-3 border border-green-300 text-green-700">Commentaire</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($notes) > 0): ?>
                        <?php foreach ($notes as $note): ?>
                            <tr class="hover:bg-green-50 transition duration-300">
                                <td class="p-3 border border-green-300"><?php echo htmlspecialchars($note['matiere']); ?></td>
                                <td class="p-3 border border-green-300"><?php echo htmlspecialchars($note['note']); ?></td>
                                <td class="p-3 border border-green-300"><?php echo htmlspecialchars($note['commentaire']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="p-3 border border-green-300 text-center text-green-600">Aucune note disponible</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Bouton de retour -->
        <div class="mt-6 text-center">
            <a href="dashboard.php" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition duration-300">Retour au tableau de bord</a>
        </div>
    </div>
</body>
</html>