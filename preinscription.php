<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IWA Formation - Préinscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'custom-green': {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        },
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-custom-green-50 via-custom-green-100 to-custom-green-200 min-h-screen">
    <!-- Header avec Navigation -->
    <nav class="bg-white shadow-lg fixed w-full z-50 ">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0">
                    <img src="./public/images/image12.png" alt="IWA Logo" class="h-[12vh]">
                </div>
                <div class="hidden md:flex space-x-8">
                    <div class="relative group">
                        <a href="./index.php" class="text-gray-700 hover:text-custom-green-600 px-3 py-2 block rounded-md font-medium transition-colors">Accueil</a>
                    </div>
                    <div class="relative group">
                        <a href="#" class=" block hover:text-custom-green-600 px-3 py-2 rounded-md font-medium transition-colors">
                            Formation IWA
                            <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                        <div class="absolute hidden group-hover:block w-48 bg-white shadow-lg rounded-md py-2 animate-fade-in">
                            <a href="./objectifs.php" class="block px-4 py-2 text-gray-700 hover:bg-custom-green-50">Objectifs</a>
                            <a href="./publicvisé.php" class="block px-4 py-2 text-gray-700 hover:bg-custom-green-50">Public visé</a>
                            <a href="./debouches.php" class="block px-4 py-2 text-gray-700 hover:bg-custom-green-50">Débouchés</a>
                            <a href="./programme.php" class="block px-4 py-2 text-gray-700 hover:bg-custom-green-50">Programme</a>
                            <a href="./preinscription.php" class="block px-4 py-2 text-gray-700 hover:bg-custom-green-50">Préinscription</a>
                        </div>
                    </div>
                    <a href="./events.php" class="text-gray-700 hover:text-custom-green-600 px-3 py-2 rounded-md font-medium transition-colors">Événements</a>
                   
                    <a href="./contact.php" class="text-gray-700 hover:text-custom-green-600 px-3 py-2 rounded-md font-medium transition-colors">Contact</a>
                </div>
                <div class="relative group">
                    <button class="bg-custom-green-600 text-white px-6 py-2 rounded-md hover:bg-custom-green-700 transition-colors">
                        Connecter
                        <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="absolute hidden group-hover:block w-48 right-0 bg-white shadow-lg rounded-md py-2 animate-fade-in">
                        <a href="./login.php" class="block px-4 py-2 text-gray-700 hover:bg-custom-green-50">Administrateur</a>
                        <a href="./login-etudiant.php" class="block px-4 py-2 text-gray-700 hover:bg-custom-green-50">Étudiants</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container mx-auto px-6 py-24 ">
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-custom-green-900 mb-4">Préinscription</h1>
            <p class="text-custom-green-700">Commencez votre parcours vers l'excellence numérique</p>
        </div>

        <!-- Formulaire -->
        <div class="max-w-4xl mx-auto">
            <form class="bg-white shadow-2xl rounded-2xl p-8 space-y-6 backdrop-blur-sm bg-white/90">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nom -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-custom-green-900">Nom complet *</label>
                        <input type="text" required
                            class="w-full px-4 py-2 border border-custom-green-200 rounded-lg focus:ring-2 focus:ring-custom-green-500 focus:border-custom-green-500 transition">
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-custom-green-900">Email *</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-custom-green-500">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" required
                                class="w-full pl-10 pr-4 py-2 border border-custom-green-200 rounded-lg focus:ring-2 focus:ring-custom-green-500 focus:border-custom-green-500 transition">
                        </div>
                    </div>

                    <!-- Téléphone -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-custom-green-900">Téléphone *</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-custom-green-500">
                                <i class="fas fa-phone"></i>
                            </span>
                            <input type="tel" required
                                class="w-full pl-10 pr-4 py-2 border border-custom-green-200 rounded-lg focus:ring-2 focus:ring-custom-green-500 focus:border-custom-green-500 transition">
                        </div>
                    </div>

                    <!-- Niveau d'études -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-custom-green-900">Niveau d'études *</label>
                        <select required
                            class="w-full px-4 py-2 border border-custom-green-200 rounded-lg focus:ring-2 focus:ring-custom-green-500 focus:border-custom-green-500 transition">
                            <option value="">Sélectionnez votre niveau</option>
                            <option value="bac">Baccalauréat</option>
                            <option value="bac+2">Bac+2</option>
                            <option value="bac+3">Bac+3</option>
                            <option value="bac+5">Bac+5 ou plus</option>
                        </select>
                    </div>
                </div>

                <!-- Formation -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-custom-green-900">Formation souhaitée *</label>
                    <select required
                        class="w-full px-4 py-2 border border-custom-green-200 rounded-lg focus:ring-2 focus:ring-custom-green-500 focus:border-custom-green-500 transition">
                        <option value="">Sélectionnez une formation</option>
                        <option value="dev_web">Développement Web</option>
                        <option value="data_science">Data Science</option>
                        <option value="cyber_security">Cybersécurité</option>
                    </select>
                </div>

                <!-- Motivation -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-custom-green-900">Lettre de motivation *</label>
                    <textarea required rows="5"
                        class="w-full px-4 py-2 border border-custom-green-200 rounded-lg focus:ring-2 focus:ring-custom-green-500 focus:border-custom-green-500 transition"></textarea>
                </div>

                <!-- Bouton Submit -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-custom-green-600 to-custom-green-800 text-white py-3 px-6 rounded-lg hover:from-custom-green-700 hover:to-custom-green-900 transition duration-300 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-custom-green-500 focus:ring-offset-2 shadow-lg">
                    <i class="fas fa-paper-plane mr-2"></i>
                    Envoyer ma candidature
                </button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-custom-green-200 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <img src="./public/images/image12.png" alt="IWA Logo" class="h-14 mb-4">
                    <p class="text-black text-lg">Formation supérieure en ingénierie web avancée</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-custom-green-800">Contact</h3>
                    <div class="space-y-2 ">
                        <a href="mailto:iwa@uae.ac.ma" class="text-black hover:text-white transition-colors flex items-center">
                            <svg class="w-5 h-5 mr-2 text-custom-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            iwa@uae.ac.ma
                        </a>
                        <p class="text-black flex items-center">
                            <svg class="w-5 h-5 mr-2 text-custom-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            06 62 10 21 67
                        </p>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-custom-green-800">Restez connecté</h3>
                    <form class="space-y-4">
                        <div>
                            <input type="email" placeholder="Votre email" class="w-full px-4 py-2 rounded-lg bg-white focus:outline-none focus:border-custom-green-500">
                        </div>
                        <button type="submit" class="bg-custom-green-600 text-white px-6 py-2 rounded-md hover:bg-custom-green-700 transition-colors">
                            S'inscrire
                        </button>
                    </form>
                </div>
            </div>
            <div class="border-t border-white justify-center mt-12 pt-8 items-center">
                <p class="text-black text-center">© 2025 IWA. Tous droits réservés.</p>
            </div>
        </div>
        <a href="#" class="fixed bottom-8 right-8 bg-custom-green-600 p-3 rounded-full shadow-lg hover:bg-custom-green-700 transition-colors">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
            </svg>
        </a>
    </footer>
</body>
</html>

