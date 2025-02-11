<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Personnalisation des couleurs des onglets */
        .nav-pills .nav-link {
            /* background-color: #28a745; Vert */
            color: #28a745;
        }

        .nav-pills .nav-link.active {
            background-color: #218838;
            /* Vert foncé pour l'onglet actif */
            color: white;
        }

        .nav-pills .nav-link:hover {
            background-color: #34ce57;
            /* Vert clair au survol */
            color: white;
        }
    </style>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-material-ui/material-ui.css">
       <script src="https://cdn.tailwindcss.com"></script>
       <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
       <script>
           tailwind.config = {
               theme: {
                   extend: {
                       animation: {
                           'gradient-x': 'gradient-x 15s ease infinite',
                           'pulse': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                       },
                       keyframes: {
                           'gradient-x': {
                               '0%, 100%': {
                                   'background-size': '200% 200%',
                                   'background-position': 'left center'
                               },
                               '50%': {
                                   'background-size': '200% 200%',
                                   'background-position': 'right center'
                               }
                           },
                           'pulse': {
                               '0%, 100%': { opacity: 1 },
                               '50%': { opacity: .5 }
                           }
                       }
                   }
               }
           }
       </script>

</head>

<body>
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
      <main class="flex-grow pt-20">
        <!-- Hero Section -->
        <section class="relative h-[300px] overflow-hidden">
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4" 
                     alt="Background" 
                     class="w-full h-full object-cover filter brightness-50">
            </div>
            <div class="relative container mx-auto px-4 h-full flex flex-col justify-center text-center">
                <h1 class="text-5xl font-bold mb-4 text-white">Programme de la Formation</h1>
                <p class="text-xl text-gray-200">La formation est répartie sur 4 semestres et chaque semestre est constitué de 4 modules</p>
            </div>
        </section>

        <!-- Semester Tabs -->
        <section class="py-12">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap justify-center gap-4 mb-12">
                    <button class="semester-tab active bg-emerald-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-emerald-700 transition-colors" onclick="showSemester(1)">
                        Semestre 1
                    </button>
                    <button class="semester-tab bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-emerald-600 hover:text-white transition-colors" onclick="showSemester(2)">
                        Semestre 2
                    </button>
                    <button class="semester-tab bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-emerald-600 hover:text-white transition-colors" onclick="showSemester(3)">
                        Semestre 3
                    </button>
                    <button class="semester-tab bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-emerald-600 hover:text-white transition-colors" onclick="showSemester(4)">
                        Semestre 4
                    </button>
                </div>

                <!-- Semester Content -->
                <div class="max-w-4xl mx-auto">
                    <!-- Semester 1 -->
                    <div id="semester1" class="semester-content block">
                        <div class="space-y-8">
                            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-1 transition-all duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 mb-4">
                                    <i class="fas fa-code mr-2"></i>
                                    M1 : Initiation web: HTML – CSS – PHP
                                </h3>
                                <p class="text-gray-600">
                                    Ce module concerne l'exploration des différentes fonctionnalités du HTML et du CSS pour le développement des pages web statiques ainsi que l'initiation au PHP pour le développement des pages web dynamiques.
                                </p>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-1 transition-all duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 mb-4">
                                    <i class="fab fa-java mr-2"></i>
                                    M2 : Développement Orienté Objet & Java-JEE
                                </h3>
                                <p class="text-gray-600">
                                    Programmation orientée Objet en Java, bases du langage Java, principes de la programmation objet et UML, Spring framework – Spring Web – Spring Data – Spring Security – Microservices et Spring Cloud.
                                </p>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-1 transition-all duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 mb-4">
                                    <i class="fab fa-python mr-2"></i>
                                    M3 : Programmation Python pour le développement web
                                </h3>
                                <p class="text-gray-600">
                                    Initiation aux concepts de Python et apprentissage de la conception, création et maintenance d'un site web dynamique avec le Framework Django.
                                </p>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-1 transition-all duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 mb-4">
                                    <i class="fab fa-js mr-2"></i>
                                    M4 : Javascript avancé et Angular
                                </h3>
                                <p class="text-gray-600">
                                    Développement de composants réutilisables, communication avec l'application BackEnd, et réutilisation des éléments Angular.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Semester 2 -->
                    <div id="semester2" class="semester-content hidden">
                        <div class="space-y-8">
                            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-1 transition-all duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 mb-4">
                                    <i class="fas fa-database mr-2"></i>
                                    M5 : Bases de données avancées
                                </h3>
                                <p class="text-gray-600">
                                    Conception et optimisation des bases de données, SQL avancé, NoSQL, et gestion des données massives.
                                </p>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-1 transition-all duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 mb-4">
                                    <i class="fas fa-shield-alt mr-2"></i>
                                    M6 : Sécurité des applications web
                                </h3>
                                <p class="text-gray-600">
                                    Principes de sécurité web, cryptographie, authentification, autorisation, et protection contre les attaques courantes.
                                </p>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-1 transition-all duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 mb-4">
                                    <i class="fas fa-mobile-alt mr-2"></i>
                                    M7 : Développement mobile
                                </h3>
                                <p class="text-gray-600">
                                    Création d'applications mobiles natives et hybrides avec React Native et Flutter.
                                </p>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-1 transition-all duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 mb-4">
                                    <i class="fas fa-cloud mr-2"></i>
                                    M8 : Cloud Computing
                                </h3>
                                <p class="text-gray-600">
                                    Introduction aux services cloud, déploiement d'applications, et gestion des infrastructures cloud.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Semester 3 -->
                    <div id="semester3" class="semester-content hidden">
                        <div class="space-y-8">
                            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-1 transition-all duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 mb-4">
                                    <i class="fas fa-project-diagram mr-2"></i>
                                    M9 : Architecture des applications
                                </h3>
                                <p class="text-gray-600">
                                    Patterns de conception, architecture microservices, et bonnes pratiques de développement.
                                </p>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-1 transition-all duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 mb-4">
                                    <i class="fas fa-code-branch mr-2"></i>
                                    M10 : DevOps et CI/CD
                                </h3>
                                <p class="text-gray-600">
                                    Intégration continue, déploiement continu, et gestion des environnements de développement.
                                </p>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-1 transition-all duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 mb-4">
                                    <i class="fas fa-robot mr-2"></i>
                                    M11 : Intelligence Artificielle pour le Web
                                </h3>
                                <p class="text-gray-600">
                                    Applications de l'IA dans le développement web, machine learning, et traitement du langage naturel.
                                </p>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-1 transition-all duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 mb-4">
                                    <i class="fas fa-chart-line mr-2"></i>
                                    M12 : Analyse de données web
                                </h3>
                                <p class="text-gray-600">
                                    Collecte et analyse des données web, analytics, et visualisation des données.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Semester 4 -->
                    <div id="semester4" class="semester-content hidden">
                        <div class="space-y-8">
                            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-1 transition-all duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 mb-4">
                                    <i class="fas fa-tasks mr-2"></i>
                                    M13 : Gestion de projet web
                                </h3>
                                <p class="text-gray-600">
                                    Méthodologies agiles, gestion d'équipe, et planification de projets web.
                                </p>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-1 transition-all duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 mb-4">
                                    <i class="fas fa-users mr-2"></i>
                                    M14 : UX/UI Design avancé
                                </h3>
                                <p class="text-gray-600">
                                    Conception d'interfaces utilisateur, expérience utilisateur, et design thinking.
                                </p>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-1 transition-all duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 mb-4">
                                    <i class="fas fa-graduation-cap mr-2"></i>
                                    M15 : Projet de fin d'études
                                </h3>
                                <p class="text-gray-600">
                                    Réalisation d'un projet web complet en utilisant les technologies et méthodologies apprises.
                                </p>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:-translate-y-1 transition-all duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 mb-4">
                                    <i class="fas fa-briefcase mr-2"></i>
                                    M16 : Stage professionnel
                                </h3>
                                <p class="text-gray-600">
                                    Stage en entreprise pour mettre en pratique les compétences acquises dans un environnement professionnel.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        function showSemester(semesterNum) {
            // Hide all semester contents
            document.querySelectorAll('.semester-content').forEach(content => {
                content.classList.add('hidden');
                content.classList.remove('block');
            });
            
            // Show selected semester content
            const selectedSemester = document.getElementById(`semester${semesterNum}`);
            selectedSemester.classList.remove('hidden');
            selectedSemester.classList.add('block');
            
            // Update tab styles
            document.querySelectorAll('.semester-tab').forEach(tab => {
                tab.classList.remove('bg-emerald-600', 'text-white');
                tab.classList.add('bg-gray-200', 'text-gray-700');
            });
            
            // Style active tab
            event.target.classList.remove('bg-gray-200', 'text-gray-700');
            event.target.classList.add('bg-emerald-600', 'text-white');
        }
    </script>
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