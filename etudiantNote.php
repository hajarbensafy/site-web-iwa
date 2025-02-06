<?php
session_start();
require_once "config.php";

$notes = []; // Initialize $notes as an empty array
$error = ""; // Initialize $error to prevent undefined variable warnings

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['IDE'])) {
    header("Location: login-etudiant.php"); // Rediriger vers la page de connexion
    exit;
}

$loggedInIDE = $_SESSION['IDE']; // IDE de l'utilisateur connecté

if (isset($_GET['IDE'])) {
    $IDE = $_GET['IDE'];

    // Vérifier si l'utilisateur a accès à cet IDE
    if ($loggedInIDE !== $IDE) {
        $error = "Vous n'avez pas accès aux informations de cet étudiant.";
    } else {
        try {
            // Récupérer les informations de l'étudiant
            $sql_etudiant = "SELECT * FROM etudiant WHERE IDE = ?";
            $stmt = $pdo->prepare($sql_etudiant);
            $stmt->execute([$IDE]);
            $etudiant = $stmt->fetch();
            
            if ($etudiant) {
                // Récupérer les notes de l'étudiant
                $sql_notes = "SELECT n.*, m.nom as nom_matiere
                              FROM note n 
                              JOIN matiere m ON n.idMat = m.idMat 
                              WHERE n.idEtud = ? AND n.annee = YEAR(CURRENT_DATE)
                              ORDER BY m.nom";
                $stmt = $pdo->prepare($sql_notes);
                $stmt->execute([$IDE]);
                $notes = $stmt->fetchAll();
            } else {
                $error = "Aucun étudiant trouvé avec cet identifiant.";
            }
        } catch (PDOException $e) {
            $error = "Erreur lors de la récupération des données : " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes de l'étudiant</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50">
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <?php if (isset($etudiant) && empty($error)): ?>
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6 bg-green-600">
                        <h3 class="text-lg leading-6 font-medium text-white">
                            Relevé de notes
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-green-100">
                            <?php echo htmlspecialchars($etudiant['prenom'] . ' ' . $etudiant['nom']); ?>
                        </p>
                        <p class="text-sm text-green-100">
                            Email: <?php echo htmlspecialchars($etudiant['emailInstitutionnel']); ?>
                        </p>
                    </div>

                    <div class="border-t border-green-200">
                        <table class="min-w-full divide-y divide-green-200">
                            <thead class="bg-green-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase tracking-wider">
                                        Matière
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase tracking-wider">
                                        Note
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-green-200">
                                <?php 
                                $total_notes = 0;
                                $count_notes = 0;
                                foreach ($notes as $note): 
                                    $total_notes += $note['note'];
                                    $count_notes++;
                                ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-900">
                                            <?php echo htmlspecialchars($note['nom_matiere']); ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-green-500">
                                            <?php echo number_format($note['note'], 2); ?>/20
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot class="bg-green-50">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-900">
                                        Moyenne générale
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-900">
                                        <?php 
                                        if ($count_notes > 0) {
                                            echo number_format($total_notes / $count_notes, 2) . '/20';
                                        } else {
                                            echo "N/A";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            <?php elseif (!empty($error)): ?>
                <div class="bg-red-50 border-l-4 border-red-400 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700">
                                <?php echo htmlspecialchars($error); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET" class="mb-8">
                    <div class="flex items-center">
                        <input type="text" name="IDE" placeholder="Entrez l'IDE de l'étudiant" required
                               class="flex-grow px-4 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-green-500">
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-r-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                            Rechercher
                        </button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>