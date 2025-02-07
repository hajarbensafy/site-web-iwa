<?php
// Include config file for database connection
require_once "config.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize the form inputs
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $event_type = mysqli_real_escape_string($conn, $_POST['event_type']);

    // SQL query to insert the event into the database
    $sql = "INSERT INTO events (title, description, date, location, event_type) VALUES ('$title', '$description', '$date', '$location', '$event_type')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        $success_message = "L'événement a été ajouté avec succès!";
    } else {
        $error_message = "Erreur: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Événement</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-emerald-50 via-emerald-100 to-emerald-200 min-h-screen font-[Poppins]">
    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="max-w-lg w-full bg-white rounded-xl shadow-lg p-8">
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-8 flex items-center justify-center">
                <i class="fas fa-calendar-plus text-emerald-600 mr-3"></i>
                Ajouter un Nouvel Événement
            </h1>

            <!-- Display success or error message -->
            <?php if (isset($success_message)): ?>
                <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-lg mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-check-circle text-emerald-500"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-emerald-700"><?= $success_message ?></p>
                        </div>
                    </div>
                </div>
            <?php elseif (isset($error_message)): ?>
                <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-lg mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-red-700"><?= $error_message ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Event Form -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="space-y-6">
                <div class="space-y-2">
                    <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                    <input type="text" id="title" name="title" required 
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 transition-colors duration-200">
                </div>

                <div class="space-y-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" required rows="4" 
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 transition-colors duration-200"></textarea>
                </div>

                <div class="space-y-2">
                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                    <input type="datetime-local" id="date" name="date" required 
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 transition-colors duration-200">
                </div>

                <div class="space-y-2">
                    <label for="location" class="block text-sm font-medium text-gray-700">Lieu</label>
                    <input type="text" id="location" name="location" required 
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 transition-colors duration-200">
                </div>

                <div class="space-y-2">
                    <label for="event_type" class="block text-sm font-medium text-gray-700">Type d'Événement</label>
                    <select id="event_type" name="event_type" required 
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 transition-colors duration-200">
                        <option value="Conférence">Conférence</option>
                        <option value="Séminaire">Séminaire</option>
                        <option value="Atelier">Atelier</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>

                <div class="flex justify-end space-x-4 pt-4">
                    <a href="./events.php" 
                        class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all duration-200">
                        <i class="fas fa-times mr-2"></i>
                        Annuler
                    </a>
                    <button type="submit" 
                        class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all duration-200">
                        <i class="fas fa-save mr-2"></i>
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>