<!DOCTYPE html>
<html lang="fr" class="bg-green-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IWA Formation - Objectifs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen">
<nav class="bg-white shadow-lg fixed w-full z-50 ">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
      <div class="flex-shrink-0">
                    <img src="./public/images/Ingénierie_du_Web_Avancé__3_-removebg-preview (1).png" alt="IWA Logo" class="h-[18vh]">
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
    <main class="flex-grow pt-16">
      <!-- Hero Section with Parallax Effect -->
      <section class="relative h-[400px] overflow-hidden">
          <div class="absolute inset-0">
              <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c" 
                   alt="Background" 
                   class="w-full h-full object-cover filter brightness-50">
          </div>
          <div class="relative container mx-auto px-4 h-full flex flex-col justify-center text-white">
              <h1 class="text-5xl font-bold mb-4 animate-fade-in">Objectifs de la Formation</h1>
              <nav class="text-sm">
                  <a href="../index.html" class="hover:text-green-300 transition-colors">Accueil</a> / 
                  <span class="mx-2">Formation IWA</span> /
                  <span class="mx-2">Objectifs</span>
              </nav>
          </div>
      </section>
      <!-- Mission Section -->
      <section class="py-16 bg-white">
          <div class="container mx-auto px-4">
              <div class="max-w-4xl mx-auto">
                  <div class="text-center mb-16">
                      <span class="text-green-600 text-sm font-semibold tracking-wider uppercase">Notre Mission</span>
                      <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Former l'Elite du Développement Web</h2>
                      <p class="text-xl text-gray-600">Former des développeurs d'applications web et mobiles (Bac +5) maîtrisant les
                          technologies les plus demandées dans le marché d'emploi au niveau national et international.</p>
                  </div>
              </div>
          </div>
      </section>

      <!-- Competences Grid -->
      <section class="py-16 bg-green-50">
          <div class="container mx-auto px-4">
              <h3 class="text-3xl font-bold text-center mb-12 text-gray-800">Compétences Visées</h3>
              <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                  <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-2 transition-all duration-300">
                      <div class="w-14 h-14 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                          <i class="fas fa-laptop-code text-2xl text-green-600"></i>
                      </div>
                      <h4 class="text-xl font-semibold mb-2 text-gray-800">Développement Full-Stack</h4>
                      <p class="text-gray-600">Maîtrise des technologies frontend et backend modernes</p>
                  </div>

                  <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-2 transition-all duration-300">
                      <div class="w-14 h-14 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                          <i class="fas fa-mobile-alt text-2xl text-green-600"></i>
                      </div>
                      <h4 class="text-xl font-semibold mb-2 text-gray-800">Applications Mobiles</h4>
                      <p class="text-gray-600">Développement d'applications mobiles natives et cross-platform</p>
                  </div>

                  <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-2 transition-all duration-300">
                      <div class="w-14 h-14 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                          <i class="fas fa-cloud text-2xl text-green-600"></i>
                      </div>
                      <h4 class="text-xl font-semibold mb-2 text-gray-800">Cloud Computing</h4>
                      <p class="text-gray-600">Déploiement et gestion d'applications dans le cloud</p>
                  </div>
              </div>
          </div>
      </section>

      <!-- Objectifs List -->
      <section class="py-16 bg-white">
          <div class="container mx-auto px-4">
              <div class="max-w-4xl mx-auto">
                  <h3 class="text-3xl font-bold text-center mb-12 text-gray-800">Objectifs Spécifiques</h3>
                  <div class="grid md:grid-cols-2 gap-6">
                      <div class="flex items-start space-x-4">
                          <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                              <i class="fas fa-check text-green-600"></i>
                          </div>
                          <div>
                              <h4 class="font-semibold mb-2 text-gray-800">Développement Web</h4>
                              <p class="text-gray-600">Maîtrise des frameworks et technologies modernes</p>
                          </div>
                      </div>

                      <div class="flex items-start space-x-4">
                          <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                              <i class="fas fa-check text-green-600"></i>
                          </div>
                          <div>
                              <h4 class="font-semibold mb-2 text-gray-800">Base de Données</h4>
                              <p class="text-gray-600">Conception et gestion de bases de données complexes</p>
                          </div>
                      </div>

                      <div class="flex items-start space-x-4">
                          <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                              <i class="fas fa-check text-green-600"></i>
                          </div>
                          <div>
                              <h4 class="font-semibold mb-2 text-gray-800">DevOps</h4>
                              <p class="text-gray-600">Intégration et déploiement continus</p>
                          </div>
                      </div>

                      <div class="flex items-start space-x-4">
                          <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                              <i class="fas fa-check text-green-600"></i>
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


    <footer class="bg-emerald-600 text-white py-12">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
          <div>
            <h3 class="text-xl font-semibold mb-4">IWA Formation</h3>
            <p class="text-sm">Formation supérieure en Ingénierie du Web Avancé</p>
          </div>
          <div>
            <h4 class="text-lg font-semibold mb-4">Liens Rapides</h4>
            <ul class="space-y-2">
              <li><a href="/objectifs" class="hover:text-emerald-200 transition-colors">Objectifs</a></li>
              <li><a href="/programme" class="hover:text-emerald-200 transition-colors">Programme</a></li>
              <li><a href="/preinscription" class="hover:text-emerald-200 transition-colors">Préinscription</a></li>
              <li><a href="/contact" class="hover:text-emerald-200 transition-colors">Contact</a></li>
            </ul>
          </div>
          <div>
            <h4 class="text-lg font-semibold mb-4">Nous Contacter</h4>
            <p class="text-sm mb-2">Faculté des Sciences de Tétouan</p>
            <p class="text-sm mb-2">M'hannech II, B.P. 2121</p>
            <p class="text-sm mb-2">Tél:  06 62 10 21 67</p>
            <p class="text-sm">Email: iwa@uae.ac.ma</p>
          </div>
          <div>
            <h4 class="text-lg font-semibold mb-4">Suivez-nous</h4>
            <div class="flex space-x-4">
              <a href="#" class="text-white hover:text-emerald-200 transition-colors">
                <i class="fab fa-facebook-f text-2xl"></i>
              </a>
              <a href="#" class="text-white hover:text-emerald-200 transition-colors">
                <i class="fab fa-twitter text-2xl"></i>
              </a>
              <a href="#" class="text-white hover:text-emerald-200 transition-colors">
                <i class="fab fa-linkedin-in text-2xl"></i>
              </a>
              <a href="#" class="text-white hover:text-emerald-200 transition-colors">
                <i class="fab fa-instagram text-2xl"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="mt-8 pt-8 border-t border-emerald-500 text-center">
          <p class="text-sm">&copy; 2023 IWA Formation. Tous droits réservés.</p>
        </div>
      </div>
    </footer>
</body>
</html>