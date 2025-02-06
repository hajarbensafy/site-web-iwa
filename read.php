<?php
// Your existing PHP code remains unchanged
// ...

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-green-50">
    <div class="max-w-2xl mx-auto p-6">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <h1 class="text-3xl font-bold text-green-700 mb-6">View Record</h1>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-green-600">Nom</label>
                        <p class="mt-1 text-lg font-semibold text-green-800"><?php echo $row["nom"]; ?></p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-green-600">Prenom</label>
                        <p class="mt-1 text-lg font-semibold text-green-800"><?php echo $row["prenom"]; ?></p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-green-600">Telephone</label>
                        <p class="mt-1 text-lg font-semibold text-green-800"><?php echo $row["telephone"]; ?></p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-green-600">Email</label>
                        <p class="mt-1 text-lg font-semibold text-green-800"><?php echo $row["email"]; ?></p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-green-600">Email Institutionnel</label>
                        <p class="mt-1 text-lg font-semibold text-green-800"><?php echo $row["emailInstitutionnel"]; ?></p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-green-600">ID Filiere</label>
                        <p class="mt-1 text-lg font-semibold text-green-800"><?php echo $row["idFiliere"]; ?></p>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="index.php" class="inline-block px-6 py-2 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 transition-colors">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>