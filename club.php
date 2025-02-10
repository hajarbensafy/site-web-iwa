<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club AI-IoT - FST Tétouan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#10B981',
                        'primary-dark': '#059669',
                        'secondary': '#34D399',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
<nav class="bg-white shadow-lg fixed w-full z-50 ">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex-shrink-0 flex items-center">
          <img src="./public/images/Ingénierie du Web Avancé (3).png" alt="IWA Logo" class="h-16 w-30" />
        </div>

        <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-8">
          <a href="index.php
          "
            class="text-gray-700 hover:text-emerald-600 px-3 py-2 text-md font-medium transition-colors">
            Accueil
          </a>

          <div class="relative group">
            <button
              class="text-gray-700 group-hover:text-emerald-600 px-3 py-2 text-md font-medium inline-flex items-center transition-colors">
              Formation IWA
              <svg class="ml-2 h-4 w-4 transition-transform group-hover:rotate-180 " fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <div
              class="absolute left-0  w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden group-hover:block transition-all duration-200">
              <div class="py-1">
                <a href="./objectifs.php
                "
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-600">
                  Objectifs
                </a>
                <a href="./programme.php
                "
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-600">
                  Programme
                </a>
                <a href="./preinscription.php
                "
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-600">
                  Préinscription
                </a>
              </div>
            </div>
          </div>

          <a href="./events.php"
            class="text-gray-700 hover:text-emerald-600 px-3 py-2 text-md font-medium transition-colors">
            Événements
          </a>

         

          <a href="./club.php"
            class="text-gray-700 hover:text-emerald-600 px-3 py-2 text-md font-medium transition-colors">
            AI-IoT Club
          </a>

          <a href="./contact.php"
            class="text-gray-700 hover:text-emerald-600 px-3 py-2 text-md font-medium transition-colors">
            Contact
          </a>

       
              <a href="./login.php" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Connecter</a>
      </div>

        <div class="flex items-center sm:hidden">
          <button type="button"
            class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-emerald-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-emerald-500">
            <span class="sr-only">Open main menu</span>
            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </nav>

    <!-- Hero Section -->
    <section id="accueil" class="relative h-screen pt-16">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1518432031352-d6fc5c10da5a" 
                 alt="AI-IoT Background" 
                 class="w-full h-full object-cover filter brightness-50">
        </div>
        <div class="relative h-full flex items-center">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">Club AI-IoT</h1>
                <p class="text-xl text-gray-200 mb-8 max-w-3xl mx-auto">
                    Explorez l'avenir de la technologie avec notre communauté passionnée par l'Intelligence Artificielle et l'Internet des Objets
                </p>
                <a href="#actualites" class="bg-white text-primary px-8 py-3 rounded-full hover:bg-gray-100 transition-colors inline-flex items-center">
                    <span>Découvrir nos activités</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Actualités Section -->
    <section id="actualites" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-primary">Actualités Récentes</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Actualité 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform">
                    <img src="https://images.unsplash.com/photo-1485827404703-89b55fcc595e" 
                         alt="AI Project" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-primary mb-2">14 décembre 2024</div>
                        <h3 class="text-xl font-semibold mb-2">Appel à candidatures</h3>
                        <p class="text-gray-600">Rejoignez-nous pour développer des projets innovants en IA et IoT</p>
                        <a href="#" class="mt-4 inline-flex items-center text-primary hover:text-primary-dark">
                            En savoir plus
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Actualité 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform">
                    <img src="https://images.unsplash.com/photo-1553406830-ef2513450d76" 
                         alt="Arduino Workshop" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-primary mb-2">21 décembre 2024</div>
                        <h3 class="text-xl font-semibold mb-2">Formation Arduino</h3>
                        <p class="text-gray-600">Formation pratique sur l'utilisation de la carte Arduino</p>
                        <a href="#" class="mt-4 inline-flex items-center text-primary hover:text-primary-dark">
                            En savoir plus
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Actualité 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform">
                    <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995" 
                         alt="AI Course" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-primary mb-2">7 décembre 2024</div>
                        <h3 class="text-xl font-semibold mb-2">Formation en IA</h3>
                        <p class="text-gray-600">Focus sur les modèles de langage (LLMs)</p>
                        <a href="#" class="mt-4 inline-flex items-center text-primary hover:text-primary-dark">
                            En savoir plus
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-6 text-primary">À propos du Club AI-IoT</h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Le Club AI-IoT, basé à la Faculté des Sciences de Tétouan, est une communauté dynamique où passionnés, étudiants et professionnels se réunissent pour explorer les frontières de l'Intelligence Artificielle et de l'Internet des Objets.
                    </p>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <i class="fas fa-brain text-3xl text-primary mb-3"></i>
                            <h3 class="font-semibold mb-2">Apprentissage</h3>
                            <p class="text-sm text-gray-600">Workshops, séminaires et formations pratiques</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <i class="fas fa-project-diagram text-3xl text-primary mb-3"></i>
                            <h3 class="font-semibold mb-2">Projets</h3>
                            <p class="text-sm text-gray-600">Développement de solutions innovantes</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1531297484001-80022131f5a1" 
                         alt="Tech Background" 
                         class="rounded-xl shadow-lg">
                    <div class="absolute -bottom-6 -right-6 bg-primary text-white p-6 rounded-xl">
                        <div class="text-4xl font-bold mb-2">100+</div>
                        <div class="text-sm">Membres actifs</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Activities Section -->
    <section id="activites" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-primary">Nos Activités</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-6 bg-gray-50 rounded-xl">
                    <i class="fas fa-laptop-code text-4xl text-primary mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Ateliers Pratiques</h3>
                    <p class="text-gray-600">Séances hands-on sur les technologies IA et IoT</p>
                </div>
                <div class="p-6 bg-gray-50 rounded-xl">
                    <i class="fas fa-users text-4xl text-primary mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Meetups</h3>
                    <p class="text-gray-600">Rencontres et échanges entre passionnés</p>
                </div>
                <div class="p-6 bg-gray-50 rounded-xl">
                    <i class="fas fa-trophy text-4xl text-primary mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Hackathons</h3>
                    <p class="text-gray-600">Compétitions et défis technologiques</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-primary">Rejoignez-nous</h2>
            <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg p-8">
                <form class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                            <input type="text" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                        <textarea rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-primary text-white py-3 rounded-lg hover:bg-primary-dark transition-colors">
                        Envoyer
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-primary text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-semibold mb-4">IWA Formation</h3>
                    <p class="text-sm">Formation supérieure en Ingénierie du Web Avancé</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Liens Rapides</h4>
                    <ul class="space-y-2">
                        <li><a href="/objectifs" class="hover:text-secondary transition-colors">Objectifs</a></li>
                        <li><a href="/programme" class="hover:text-secondary transition-colors">Programme</a></li>
                        <li><a href="/preinscription" class="hover:text-secondary transition-colors">Préinscription</a></li>
                        <li><a href="/contact" class="hover:text-secondary transition-colors">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Nous Contacter</h4>
                    <p class="text-sm mb-2">Faculté des Sciences de Tétouan</p>
                    <p class="text-sm mb-2">M'hannech II, B.P. 2121</p>
                    <p class="text-sm mb-2">Tél: 06 62 10 21 67</p>
                    <p class="text-sm">Email: iwa@uae.ac.ma</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Suivez-nous</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-white hover:text-secondary transition-colors">
                            <i class="fab fa-facebook-f text-2xl"></i>
                        </a>
                        <a href="#" class="text-white hover:text-secondary transition-colors">
                            <i class="fab fa-twitter text-2xl"></i>
                        </a>
                        <a href="#" class="text-white hover:text-secondary transition-colors">
                            <i class="fab fa-linkedin-in text-2xl"></i>
                        </a>
                        <a href="#" class="text-white hover:text-secondary transition-colors">
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-secondary text-center">
                <p class="text-sm">&copy; 2023 IWA Formation. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>