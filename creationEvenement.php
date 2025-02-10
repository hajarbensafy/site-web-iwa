<?php
require_once "config.php";

// Vérifier si le dossier uploads/images existe, sinon le créer
$upload_dir = "uploads/images/";
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0775, true);
}

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $description = mysqli_real_escape_string($link, $_POST['description']);
    $date = $_POST['date'];
    $location = mysqli_real_escape_string($link, $_POST['location']);
    $event_type = mysqli_real_escape_string($link, $_POST['event_type']);

    // Gestion de l'upload de l'image
    $file_name = basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $new_file_name = uniqid() . '.' . $imageFileType;
    $target_file = $upload_dir . $new_file_name;

    // Vérifications de l'image
    $uploadOk = 1;
    if (!getimagesize($_FILES["image"]["tmp_name"])) {
        echo "<p class='text-red-500 text-center'>Le fichier n'est pas une image.</p>";
        $uploadOk = 0;
    }
    if ($_FILES["image"]["size"] > 2000000) {
        echo "<p class='text-red-500 text-center'>L'image est trop grande (max 2MB).</p>";
        $uploadOk = 0;
    }
    if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
        echo "<p class='text-red-500 text-center'>Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.</p>";
        $uploadOk = 0;
    }

    // Si l'image est valide, on l'upload
    if ($uploadOk && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Insertion dans la base de données
        $sql = "INSERT INTO events (title, description, date, location, event_type, image_url) 
                VALUES ('$title', '$description', '$date', '$location', '$event_type', '$target_file')";
        if (mysqli_query($link, $sql)) {
            echo "<p class='text-green-500 text-center font-medium bg-green-50 py-3 rounded-lg mb-4'>✨ Événement créé avec succès !</p>";
        } else {
            echo "<p class='text-red-500 text-center bg-red-50 py-3 rounded-lg mb-4'>Erreur : " . mysqli_error($link) . "</p>";
        }
    } else {
        echo "<p class='text-red-500 text-center bg-red-50 py-3 rounded-lg mb-4'>Erreur lors de l'upload de l'image.</p>";
    }
}

// Récupération des événements existants
$result = mysqli_query($link, "SELECT * FROM events ORDER BY date DESC");
?>
<?php
require_once "config.php";

// Keep existing PHP code for file upload and database operations
// ... (previous PHP code remains the same until the HTML)
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Événements</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .gradient-button {
            background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
        }

        .gradient-button:hover {
            background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
        }
    </style>
</head>

<body class="bg-emerald-50 min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0">
                    <img src="./public/images/Ingénierie_du_Web_Avancé__3_-removebg-preview (1).png" alt="IWA Logo" class="h-[18vh]">
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="./dashboard.php"
                        class="flex items-center px-4 py-2 text-emerald-600 bg-emerald-50 rounded-lg">
                        <i class="fas fa-home mr-2"></i>
                        Tableau de bord
                    </a>
                    <a href="./cours-admin.php"
                        class="flex items-center px-4 py-2 text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-laptop-code mr-2"></i>
                        Cours
                    </a>
                    <a href="etudiants.php"
                        class="flex items-center px-4 py-2 text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-user-graduate mr-2"></i>
                        Étudiants
                    </a>
                    <a href="./notes.php"
                        class="flex items-center px-4 py-2 text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-star mr-2"></i>
                        Notes
                    </a>
                    <a href="./attestations.php"
                        class="flex items-center px-4 py-2 text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-file-alt mr-2"></i>
                        Attestations
                    </a>
                    <button onclick="logout()"
                        class="flex items-center px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-all duration-300">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Déconnexion
                    </button>
                </div>
            </div>
        </div>
    </nav>


      <!-- Main Content -->
    <main class="max-w-7xl  px-4 pt-28 pb-12">
        <!-- Header -->
        <div class="mb-8">
            <div class="glass-effect rounded-2xl p-8 shadow-lg">
                <h1 class="text-3xl font-bold bg-gradient-to-r from-green-600 to-green-800 text-transparent bg-clip-text">
                    Gestion des Événements
                </h1>
                <p class="mt-2 text-gray-600">
                    Créez et gérez les événements de votre établissement
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
            <!-- Event Creation Form -->
            <div class="glass-effect rounded-2xl p-8 shadow-lg">
                <h2 class="text-2xl font-semibold text-green-800 mb-6 flex items-center">
                    <i class="fas fa-plus-circle mr-3 text-green-600"></i>
                    Nouvel événement
                </h2>

                <form action="creationEvenement.php" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Titre de l'événement</label>
                            <input type="text" name="title" required
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea name="description" rows="4" required
                                      class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all"></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                                <input type="date" name="date" required
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Lieu</label>
                                <input type="text" name="location" required
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Type d'événement</label>
                            <input type="text" name="event_type" required
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                            <input type="file" name="image" required accept="image/*"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all">
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-green-600 text-white py-4 rounded-xl hover:shadow-lg transition-all duration-300 flex items-center justify-center">
                        <i class="fas fa-plus-circle mr-2"></i>
                        Créer l'événement
                    </button>
                </form>
            </div>

            <!-- Events List -->
            <div class="space-y-6">
                <h2 class="text-2xl font-semibold text-green-800 mb-6 flex items-center">
                    <i class="fas fa-calendar-alt mr-3 text-green-600"></i>
                    Événements à venir
                </h2>

                <div class="space-y-4">
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <div class="glass-effect rounded-2xl p-6 card-hover">
                            <div class="flex items-start space-x-4">
                                <img src="<?= htmlspecialchars($row['image_url']) ?>" 
                                     alt="<?= htmlspecialchars($row['title']) ?>" 
                                     class="w-32 h-32 rounded-xl object-cover shadow-lg">
                                
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">
                                        <?= htmlspecialchars($row['title']) ?>
                                    </h3>
                                    
                                    <p class="text-gray-600 mb-4">
                                        <?= htmlspecialchars($row['description']) ?>
                                    </p>
                                    
                                    <div class="flex flex-wrap gap-4 text-sm text-gray-500">
                                        <span class="flex items-center">
                                            <i class="far fa-calendar mr-2 text-green-500"></i>
                                            <?= htmlspecialchars($row['date']) ?>
                                        </span>
                                        <span class="flex items-center">
                                            <i class="fas fa-map-marker-alt mr-2 text-green-500"></i>
                                            <?= htmlspecialchars($row['location']) ?>
                                        </span>
                                        <span class="flex items-center">
                                            <i class="fas fa-tag mr-2 text-green-500"></i>
                                            <?= htmlspecialchars($row['event_type']) ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-4 flex justify-end space-x-3">
                                <button onclick="openEditModal(<?= $row['id'] ?>)" 
                                        class="px-4 py-2 text-green-600 hover:bg-green-50 rounded-lg transition-all duration-300">
                                    <i class="fas fa-edit mr-1"></i>
                                    Modifier
                                </button>
                                <button onclick="openDeleteModal(<?= $row['id'] ?>)" 
                                        class="px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-all duration-300">
                                    <i class="fas fa-trash-alt mr-1"></i>
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </main>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 transform transition-all">
            <div class="text-center">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-exclamation-triangle text-2xl text-red-600"></i>
                </div>
                
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Confirmer la suppression</h2>
                <p class="text-gray-600 mb-6">
                    Êtes-vous sûr de vouloir supprimer cet événement ? Cette action est irréversible.
                </p>
                
                <div class="flex justify-end space-x-4">
                    <button onclick="closeDeleteModal()" 
                            class="px-6 py-3 text-gray-700 hover:bg-gray-100 rounded-xl transition-all duration-300">
                        Annuler
                    </button>
                    <button onclick="confirmDelete()" 
                            class="px-6 py-3 bg-red-600 text-white rounded-xl hover:bg-red-700 transition-all duration-300">
                        Supprimer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl p-8 transform transition-all">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Modifier l'événement</h2>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-6">
                <input type="hidden" name="id" id="editId">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
                        <input type="text" name="title" id="editTitle" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                        <input type="date" name="date" id="editDate" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" id="editDescription" rows="4" required
                              class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-green-500"></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Lieu</label>
                        <input type="text" name="location" id="editLocation" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Type d'événement</label>
                        <input type="text" name="event_type" id="editEventType" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nouvelle image (optionnel)</label>
                    <input type="file" name="image" id="editImage" accept="image/*"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>

                <div class="flex justify-end space-x-4 pt-4">
                    <button type="button" onclick="closeEditModal()" 
                            class="px-6 py-3 text-gray-700 hover:bg-gray-100 rounded-xl transition-all duration-300">
                        Annuler
                    </button>
                    <button type="submit" 
                            class="px-6 py-3 gradient-button text-white rounded-xl hover:shadow-lg transition-all duration-300">
                        Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let currentEventId = null;

        function openDeleteModal(id) {
            currentEventId = id;
            const modal = document.getElementById('deleteModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        async function confirmDelete() {
            if (!currentEventId) return;

            try {
                const response = await fetch(`delete_event.php?id=${currentEventId}`, {
                    method: 'DELETE',
                });

                if (response.ok) {
                    location.reload();
                } else {
                    throw new Error('Erreur lors de la suppression');
                }
            } catch (error) {
                console.error('Erreur:', error);
                alert('Une erreur est survenue lors de la suppression');
            }
        }

        function openEditModal(id) {
            currentEventId = id;
            fetch(`get_event.php?id=${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('editId').value = data.id;
                    document.getElementById('editTitle').value = data.title;
                    document.getElementById('editDescription').value = data.description;
                    document.getElementById('editDate').value = data.date;
                    document.getElementById('editLocation').value = data.location;
                    document.getElementById('editEventType').value = data.event_type;

                    const modal = document.getElementById('editModal');
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    alert('Une erreur est survenue lors du chargement des données');
                });
        }

        function closeEditModal() {
            const modal = document.getElementById('editModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        document.getElementById('editForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            try {
                const response = await fetch('update_event.php', {
                    method: 'POST',
                    body: formData,
                });

                if (response.ok) {
                    location.reload();
                } else {
                    throw new Error('Erreur lors de la mise à jour');
                }
            } catch (error) {
                console.error('Erreur:', error);
                alert('Une erreur est survenue lors de la mise à jour');
            }
        });

        function logout() {
            // Implement your logout logic here
            window.location.href = 'logout.php';
        }
    </script>
</body>
</html>

<?php mysqli_close($link); ?>