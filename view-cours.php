<?php
require_once 'config.php';

// Fetch all courses with matière information
$stmt = $pdo->query("
    SELECT c.*, m.Matiere, m.Semestre 
    FROM cours c 
    JOIN matiere m ON c.ref_mat = m.RefMat 
    ORDER BY m.Semestre, m.Matiere
");
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Group courses by semester
$coursesBySemester = [];
foreach ($courses as $course) {
    $coursesBySemester[$course['Semestre']][] = $course;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Cours</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50">
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-green-900 mb-4">Liste des Cours</h1>
                <a href="upload-cours.php" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                    Ajouter un nouveau cours
                </a>
            </div>

            <?php foreach ($coursesBySemester as $semester => $semesterCourses): ?>
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-green-800 mb-6">Semestre <?php echo $semester; ?></h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach ($semesterCourses as $course): ?>
                            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-green-200">
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-green-900 mb-2">
                                        <?php echo htmlspecialchars($course['Matiere']); ?>
                                    </h3>
                                    <p class="text-green-600 mb-4">
                                        <?php echo htmlspecialchars($course['titre']); ?>
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <a href="<?php echo htmlspecialchars($course['pdf_path']); ?>" 
                                           target="_blank"
                                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                                            Voir le PDF
                                        </a>
                                        <span class="text-sm text-green-500">
                                            <?php echo date('d/m/Y', strtotime($course['date_upload'])); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>

