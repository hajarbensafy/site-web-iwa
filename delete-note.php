<?php
require_once "config.php";

// Get the note ID from the URL
$note_id = isset($_GET['IDE']) ? intval($_GET['IDE']) : 0;

$error_message = '';
$success_message = '';

// Handle form submission for deletion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm_delete'])) {
    // Delete the note from the database
    $delete_sql = "DELETE FROM note WHERE idEtud = ?";
    $stmt = mysqli_prepare($link, $delete_sql);
    mysqli_stmt_bind_param($stmt, "i", $note_id);

    if (mysqli_stmt_execute($stmt)) {
        $success_message = "La note a été supprimée avec succès.";
    } else {
        $error_message = "Erreur lors de la suppression de la note : " . mysqli_error($link);
    }

    mysqli_stmt_close($stmt);
}

// Fetch the note details
$fetch_sql = "SELECT n.*, e.nom, e.prenom FROM note n JOIN etudiant e ON n.idEtud = e.IDE WHERE n.idEtud = ?";
$stmt = mysqli_prepare($link, $fetch_sql);
mysqli_stmt_bind_param($stmt, "i", $note_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result && mysqli_num_rows($result) > 0) {
    $note = mysqli_fetch_assoc($result);
} else {
    $error_message = "Note non trouvée.";
}

mysqli_stmt_close($stmt);
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer la Note</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-green-50 to-green-100 min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl p-8 max-w-md w-full">
        <h1 class="text-2xl font-bold text-green-700 mb-6">Supprimer la Note</h1>

        <?php if ($error_message): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                <p><?php echo htmlspecialchars($error_message); ?></p>
            </div>
        <?php elseif ($success_message): ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p><?php echo htmlspecialchars($success_message); ?></p>
            </div>
        <?php else: ?>
            <div class="bg-green-50 rounded-lg p-6 mb-6">
                <p class="text-lg text-green-800 mb-4">Êtes-vous sûr de vouloir supprimer cette note ?</p>
                <div class="space-y-2">
                    <p><strong>Étudiant :</strong> <?php echo htmlspecialchars($note['nom'] . ' ' . $note['prenom']); ?></p>
                    <p><strong>Matière :</strong> <?php echo htmlspecialchars($note['matiere']); ?></p>
                    <p><strong>Note :</strong> <?php echo htmlspecialchars($note['note']); ?></p>
                </div>
            </div>

            <form method="POST" action="" class="space-y-4">
                <button type="submit" name="confirm_delete" class="w-full bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-700 transition-colors">
                    <i class="fas fa-trash mr-2"></i>Confirmer la suppression
                </button>
                <a href="notes.php" class="block w-full bg-green-600 text-white text-center px-6 py-2 rounded-md hover:bg-green-700 transition-colors">
                    <i class="fas fa-times mr-2"></i>Annuler
                </a>
            </form>
        <?php endif; ?>

        <?php if ($success_message || $error_message): ?>
            <a href="notes.php" class="block w-full bg-green-600 text-white text-center px-6 py-2 rounded-md hover:bg-green-700 transition-colors mt-6">
                <i class="fas fa-arrow-left mr-2"></i>Retour à la liste des notes
            </a>
        <?php endif; ?>
    </div>

    <script>
        <?php if ($success_message): ?>
        // Redirect to notes.php after 3 seconds if deletion was successful
        setTimeout(function() {
            window.location.href = 'notes.php';
        }, 3000);
        <?php endif; ?>
    </script>
</body>
</html>