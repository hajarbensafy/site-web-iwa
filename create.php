<?php
require_once "config.php"; // Inclure la connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = mysqli_real_escape_string($link, $_POST['nom']);
    $prenom = mysqli_real_escape_string($link, $_POST['prenom']);
    $tel = mysqli_real_escape_string($link, $_POST['tel']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    
    // Associer la filière automatiquement (par exemple, filière avec RefFil = 1)
    $refFil = 1; // ID de la filière que tu veux automatiquement attribuer

    // Insérer l'étudiant dans la base de données
    $sql = "INSERT INTO etudiant (Nom, Prenom, Tel, Email, RefFil) VALUES ('$nom', '$prenom', '$tel', '$email', '$refFil')";
    if (mysqli_query($link, $sql)) {
        echo '<div class="text-center py-8 text-green-500">Étudiant ajouté avec succès !</div>';
        header("Location: etudiants.php"); // Rediriger vers la page des étudiants après l'ajout
        exit();
    } else {
        echo '<div class="text-center py-8 text-red-500">Erreur lors de l\'ajout de l\'étudiant. Veuillez réessayer.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Étudiant</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-50 via-green-100 to-green-200 min-h-screen">

    <div class="max-w-7xl mx-auto px-4 pt-12 pb-12">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Ajouter un Nouvel Étudiant</h1>
            <form action="create.php" method="POST">
                <div class="mb-4">
                    <label for="nom" class="block text-sm font-semibold text-gray-700">Nom</label>
                    <input type="text" name="nom" id="nom" class="w-full p-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="prenom" class="block text-sm font-semibold text-gray-700">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="w-full p-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="tel" class="block text-sm font-semibold text-gray-700">Téléphone</label>
                    <input type="text" name="tel" id="tel" class="w-full p-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="w-full p-2 border rounded-lg" required>
                </div>
                <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">Ajouter l'étudiant</button>
            </form>
        </div>
    </div>

</body>
</html>
