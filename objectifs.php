<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IWA Formation - Objectifs</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
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
                    },
                    animation: {
                        'fade-in': 'fadeIn 1s ease-in',
                        'slide-up': 'slideUp 0.5s ease-out',
                        'slide-in': 'slideIn 0.5s ease-out',
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s infinite',
                        'scale': 'scale 0.3s ease-in-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        slideIn: {
                            '0%': { transform: 'translateX(-20px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' },
                        },
                        scale: {
                            '0%': { transform: 'scale(0.95)' },
                            '100%': { transform: 'scale(1)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-custom-green-50">
    <!-- Navigation -->
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

    <main class="flex-grow pt-16">
        <!-- Hero Section with Parallax Effect -->
        <section class="relative h-[300px] overflow-hidden">
            <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c" 
                     alt="Background" 
                     class="w-full h-full object-cover filter brightness-50">
            </div>
            <div class="relative container mx-auto px-4 h-full flex flex-col justify-center text-white">
                <h1 class="text-5xl font-bold mb-4 animate-fade-in">Objectifs de la Formation</h1>
               
            </div>
        </section>

        <!-- Mission Section -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <div class="text-center mb-12">
                        <h1 class="text-custom-green-800 text-3xl font-bold  tracking-wider uppercase ">Notre Mission</h1><br>
                        <p class="text-xl text-gray-600">Former des développeurs d'applications web et mobiles (Bac +5) maîtrisant les
                            technologies les plus demandées dans le marché d'emploi au niveau national et international.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Competences Grid -->
        <section class="py-16 bg-custom-green-50">
            <div class="container mx-auto px-4">
                <h3 class="text-3xl font-bold text-center mb-12 text-custom-green-800">Compétences Visées</h3>
                <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-2 transition-all duration-300">
                        <div class="w-14 h-14 bg-custom-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-laptop-code text-2xl text-custom-green-600"></i>
                        </div>
                        <h4 class="text-xl font-semibold mb-2 text-gray-800">Développement Full-Stack</h4>
                        <p class="text-gray-600">Maîtrise des technologies frontend et backend modernes</p>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-2 transition-all duration-300">
                        <div class="w-14 h-14 bg-custom-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-mobile-alt text-2xl text-custom-green-600"></i>
                        </div>
                        <h4 class="text-xl font-semibold mb-2 text-gray-800">Applications Mobiles</h4>
                        <p class="text-gray-600">Développement d'applications mobiles natives et cross-platform</p>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-2 transition-all duration-300">
                        <div class="w-14 h-14 bg-custom-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-cloud text-2xl text-custom-green-600"></i>
                        </div>
                        <h4 class="text-xl font-semibold mb-2 text-gray-800">Cloud Computing</h4>
                        <p class="text-gray-600">Déploiement et gestion d'applications dans le cloud</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Success Stories Section -->
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-custom-green-800 mb-16">Nos Réussites</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="group relative overflow-hidden rounded-xl shadow-lg animate-fade-in">
                        <img src="./public/images/Prize_1-Master-DCESS.jpg" alt="Success Story 1" class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-custom-green-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-4 left-4 right-4 text-white">
                                <h3 class="font-bold text-lg">Prix d'Excellence</h3>
                                <p class="text-sm">Master DCESS - 2023</p>
                            </div>
                        </div>
                    </div>

                    <div class="group relative overflow-hidden rounded-xl shadow-lg animate-fade-in delay-100">
                        <img src="./public/images/Prize2-Licence.jpg" alt="Success Story 2" class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-custom-green-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-4 left-4 right-4 text-white">
                                <h3 class="font-bold text-lg">Innovation Award</h3>
                                <p class="text-sm">Licence - 2023</p>
                            </div>
                        </div>
                    </div>

                    <div class="group relative overflow-hidden rounded-xl shadow-lg animate-fade-in delay-200">
                        <img src="./public/images/Prize3-licence.jpg" alt="Success Story 3" class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-custom-green-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-4 left-4 right-4 text-white">
                                <h3 class="font-bold text-lg">Best Project</h3>
                                <p class="text-sm">Licence - 2023</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Objectifs List -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <h3 class="text-3xl font-bold text-center mb-12 text-custom-green-800">Objectifs Spécifiques</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-8 h-8 bg-custom-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-custom-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2 text-gray-800">Développement Web</h4>
                                <p class="text-gray-600">Maîtrise des frameworks et technologies modernes</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-8 h-8 bg-custom-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-custom-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2 text-gray-800">Base de Données</h4>
                                <p class="text-gray-600">Conception et gestion de bases de données complexes</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-8 h-8 bg-custom-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-custom-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2 text-gray-800">DevOps</h4>
                                <p class="text-gray-600">Intégration et déploiement continus</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-8 h-8 bg-custom-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-custom-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2 text-gray-800">Soft Skills</h4>
                                <p class="text-gray-600">Communication et gestion de projet efficaces</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

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
                        <a href="/cdn-cgi/l/email-protection#eb829c8aab9e8a8ec58a88c5868a" class="text-black hover:text-white transition-colors flex items-center">
                            <svg class="w-5 h-5 mr-2 text-custom-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="__cf_email__" data-cfemail="5f36283e1f2a3e3a713e3c71323e">[email&#160;protected]</span>
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
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>
</html>

