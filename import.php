<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import d'étudiants</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-emerald-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-3xl font-bold text-emerald-800 mb-8">Import des étudiants</h1>
            
            <!-- Message de statut -->
            <?php if (isset($_GET['import'])): ?>
                <?php if ($_GET['import'] === 'success'): ?>
                    <div class="bg-emerald-100 border-l-4 border-emerald-500 text-emerald-700 p-4 mb-6" role="alert">
                        <p>Import réussi avec succès!</p>
                    </div>
                <?php elseif ($_GET['import'] === 'warning'): ?>
                    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-6" role="alert">
                        <p><?php echo htmlspecialchars($_GET['message'] ?? 'Attention: Certaines données n\'ont pas pu être importées.'); ?></p>
                    </div>
                <?php elseif ($_GET['import'] === 'error'): ?>
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                        <p><?php echo htmlspecialchars($_GET['message'] ?? 'Une erreur est survenue.'); ?></p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <!-- Formulaire d'import -->
            <form action="import_csv.php" method="post" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
                <div class="mb-6">
                    <label for="csv_file" class="block text-emerald-700 text-sm font-bold mb-2">
                        Sélectionner un fichier CSV
                    </label>
                    <input 
                        type="file" 
                        name="csv_file" 
                        id="csv_file" 
                        accept=".csv"
                        required
                        class="block w-full text-sm text-emerald-700
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-md file:border-0
                        file:text-sm file:font-semibold
                        file:bg-emerald-50 file:text-emerald-700
                        hover:file:bg-emerald-100
                        cursor-pointer border rounded-md"
                    >
                </div>
                <div class="flex items-center justify-end">
                    <button 
                        type="submit" 
                        class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2 px-4 rounded-md transition duration-200 ease-in-out"
                    >
                        Importer
                    </button>
                </div>
            </form>

            <!-- Instructions -->
            <div class="mt-8 bg-emerald-50 rounded-lg p-6 border border-emerald-200">
                <h2 class="text-xl font-semibold text-emerald-800 mb-4">Instructions</h2>
                <ul class="list-disc list-inside text-emerald-700 space-y-2">
                    <li>Le fichier doit être au format CSV avec séparateur point-virgule (;)</li>
                    <li>Les colonnes attendues sont : IDEt, Nom, Prenom, Tel, Email, RefFil</li>
                    <li>La première ligne (en-têtes) sera ignorée</li>
                    <li>Le numéro de téléphone doit être au format : 06 33 50 27 26 ou 0633502726</li>
                    <li>L'email doit être valide</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>