<?php
require_once 'config.php';

$error_message = '';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT titre, pdf_path FROM cours WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $cours = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($cours && file_exists($cours['pdf_path'])) {
        // Forcer le téléchargement
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . basename($cours['titre']) . '.pdf"');
        header('Content-Length: ' . filesize($cours['pdf_path']));
        readfile($cours['pdf_path']);
        exit;
    } else {
        $error_message = "Le fichier demandé n'existe pas.";
    }
} else {
    $error_message = "Aucun cours spécifié.";
}

// Si on arrive ici, c'est qu'il y a eu une erreur
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur de téléchargement</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-50 to-green-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md max-w-md w-full">
        <h1 class="text-2xl font-bold text-green-700 mb-4">Erreur de téléchargement</h1>
        <p class="text-gray-600 mb-6"><?php echo htmlspecialchars($error_message); ?></p>
        <a href="liste-cours.php" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition duration-300 inline-block">
            Retour à la liste des cours
        </a>
    </div>
</body>
</html>