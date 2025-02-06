<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ref_mat = $_POST['ref_mat'];
    $titre = $_POST['titre'];
    
    // Vérifier si un fichier a été uploadé
    if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === 0) {
        $upload_dir = 'uploads/cours/';
        
        // Créer le répertoire s'il n'existe pas
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        // Générer un nom de fichier unique
        $file_extension = pathinfo($_FILES['pdf_file']['name'], PATHINFO_EXTENSION);
        $file_name = uniqid() . '.' . $file_extension;
        $file_path = $upload_dir . $file_name;
        
        // Déplacer le fichier
        if (move_uploaded_file($_FILES['pdf_file']['tmp_name'], $file_path)) {
            // Insérer dans la base de données
            $stmt = $pdo->prepare("INSERT INTO cours (ref_mat, titre, pdf_path, date_upload) VALUES (?, ?, ?, NOW())");
            $stmt->execute([$ref_mat, $titre, $file_path]);
            
            header('Location: liste-cours.php?success=1');
            exit;
        }
    }
    
    header('Location: liste-cours.php?error=1');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Télécharger un Cours</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold text-green-700 mb-6">Télécharger un Cours</h1>
        
        <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
            <div>
                <label for="ref_mat" class="block text-sm font-medium text-green-600">Référence de la Matière</label>
                <input type="text" id="ref_mat" name="ref_mat" required 
                       class="mt-1 block w-full rounded-md border-green-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
            </div>
            
            <div>
                <label for="titre" class="block text-sm font-medium text-green-600">Titre du Cours</label>
                <input type="text" id="titre" name="titre" required 
                       class="mt-1 block w-full rounded-md border-green-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
            </div>
            
            <div>
                <label for="pdf_file" class="block text-sm font-medium text-green-600">Fichier PDF</label>
                <input type="file" id="pdf_file" name="pdf_file" accept=".pdf" required 
                       class="mt-1 block w-full text-sm text-green-500
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-full file:border-0
                              file:text-sm file:font-semibold
                              file:bg-green-50 file:text-green-700
                              hover:file:bg-green-100">
            </div>
            
            <button type="submit" 
                    class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Télécharger le Cours
            </button>
        </form>
    </div>
</body>
</html>

