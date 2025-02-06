<?php
require_once "config.php";

// Vérification et sécurisation de l'ID
if(!isset($_GET['IDEt']) || !is_numeric($_GET['IDEt'])) {
    die("ID étudiant invalide");
}
$note_id = (int)$_GET['IDEt'];

// Requête SELECT avec gestion d'erreur détaillée
$sql = "SELECT 
            etudiant.IDEt,         
            etudiant.Nom, 
            etudiant.Prenom, 
            note.Note, 
            matiere.Matiere, 
            matiere.Semestre, 
            note.RefMat
        FROM note
        INNER JOIN etudiant ON note.IDEt = etudiant.IDEt
        INNER JOIN matiere ON note.RefMat = matiere.RefMat
        WHERE note.IDEt = ?";

$stmt = mysqli_prepare($link, $sql);

// Vérification de la préparation de la requête
if (!$stmt) {
    die("Erreur de préparation SQL: " . mysqli_error($link));
}

mysqli_stmt_bind_param($stmt, "i", $note_id);

if (!mysqli_stmt_execute($stmt)) {
    die("Erreur d'exécution SQL: " . mysqli_stmt_error($stmt));
}

$result = mysqli_stmt_get_result($stmt);

if (!$result || mysqli_num_rows($result) === 0) {
    die("Note non trouvée pour l'ID $note_id");
}

$row = mysqli_fetch_assoc($result);

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $note = filter_input(INPUT_POST, 'Note', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    // Requête UPDATE sécurisée
    $update_sql = "UPDATE note 
                  SET Note = ?
                  WHERE IDEt = ?
                  AND RefMat = ?";
    
    $stmt = mysqli_prepare($link, $update_sql);
    
    if (!$stmt) {
        die("Erreur de préparation UPDATE: " . mysqli_error($link));
    }

    mysqli_stmt_bind_param(
        $stmt, 
        "dii",
        $note,
        $note_id,
        $row['RefMat']
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: notes.php");
        exit();
    } else {
        echo "Erreur de mise à jour : " . mysqli_stmt_error($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Note</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-green-50 via-green-100 to-green-200 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 pt-28 pb-12">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
                <div class="flex items-center space-x-4">
                    <div class="bg-green-100 p-3 rounded-lg">
                        <i class="fas fa-edit text-green-600 text-2xl"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">Modifier la Note</h1>
                </div>
            </div>
            
            <form method="POST" action="">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 p-6">
                    <div class="space-y-4">
                        <p class="text-green-700"><strong>Étudiant:</strong> <?php echo htmlspecialchars($row['Nom'] . " " . $row['Prenom']); ?></p>
                        <p class="text-green-700"><strong>Matière:</strong> <?php echo htmlspecialchars($row['Matiere']); ?></p>
                        <p class="text-green-700"><strong>Semestre:</strong> <?php echo htmlspecialchars($row['Semestre']); ?></p>
                        <div>
                            <label for="note" class="block text-sm font-medium text-gray-700">Note:</label>
                            <input type="number" step="0.01" id="note" name="Note" 
                                   value="<?= htmlspecialchars($row['Note']) ?>" 
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                                   min="0" max="20">
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition-colors">
                        Enregistrer
                    </button>
                    <a href="notes.php" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600 transition-colors ml-2">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

