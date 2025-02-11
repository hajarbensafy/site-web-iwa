<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IWA - Formation Supérieure</title>

  <!-- <link rel="stylesheet" href="./public/css/app.css"> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-material-ui/material-ui.css"> -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://lottie.host/35ce8c91-25ea-4cb7-ab8d-861d78161106/ytKhyPaZqF.lottie">
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
  <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
  <!-- Rest of the head content remains the same -->
  <style>
    .title-font {
      font-family: 'Poppins', sans-serif;
      letter-spacing: -1px;
      line-height: 1.2;
      background: linear-gradient(to right, #059669, #065f46);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
  </style>
 
</head>

<body>
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
  <main class="pt-11  ">
    <div class="container mx-auto px-4 py-8">
      <div class="flex flex-col md:flex-row items-center justify-center  gap-8">
        <div class="md:w-1/2">
          <h1 class="text-4xl font-bold mb-5 title-font">Ingénierie du Web Avancé</h1> 
          <p class="text-lg text-black text-justify">La formation Ingénierie du Web Avancé (IWA) forme des développeurs web et mobiles (Bac +5) maîtrisant les technologies demandées sur le marché. Elle couvre le développement frontend, backend, bases de données, cloud, IoT, applications mobiles, et inclut la gestion de projets, les soft skills et les outils de qualité.</p>
          <div class="pt-5 gap-9 flex text-center text-lg font-semibold justify-center">
            <button class="px-4 py-2 rounded-xl bg-[#065f46] text-white">Se connecter</button>
            <button class="py-2 rounded-xl bg-[#065f46] px-6 text-white">S'inscrire</button>
          </div>
        </div>
        <div>
          <img src="./public/images/imageacceuil.jpg" alt="">
          </div>
      </div>
    </div>
    <div class="bg-emerald-50 py-16">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12 title-font">Pourquoi choisir IWA ?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <div class="text-emerald-600 text-4xl mb-4">
              <i class="fas fa-laptop-code"></i>
            </div>
            <h3 class="text-xl font-semibold mb-2">Formation Pratique</h3>
            <p class="text-gray-600">Apprentissage basé sur des projets réels et des cas pratiques du monde professionnel.</p>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <div class="text-emerald-600 text-4xl mb-4">
              <i class="fas fa-users"></i>
            </div>
            <h3 class="text-xl font-semibold mb-2">Experts du Domaine</h3>
            <p class="text-gray-600">Enseignements dispensés par des professionnels actifs dans l'industrie.</p>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <div class="text-emerald-600 text-4xl mb-4">
              <i class="fas fa-certificate"></i>
            </div>
            <h3 class="text-xl font-semibold mb-2">Diplôme Reconnu</h3>
            <p class="text-gray-600">Formation certifiante de niveau Bac+5 reconnue par l'État.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Technologies Section -->
    <div class="py-16">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12 title-font">Technologies Enseignées</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
          <div class="text-center">
            <div class="bg-gray-100 rounded-full p-6 inline-block mb-4">
              <i class="fas fa-database text-4xl text-gray-600"></i>
            </div>
            <h3 class="font-semibold">SQL</h3>
          </div>
          <div class="text-center">
            <div class="bg-gray-100 rounded-full p-6 inline-block mb-4">
              <i class="fab fa-js text-4xl text-yellow-400"></i>
            </div>
            <h3 class="font-semibold">JavaScript</h3>
          </div>
          <div class="text-center">
            <div class="bg-gray-100 rounded-full p-6 inline-block mb-4">
              <i class="fab fa-angular text-4xl text-red-600"></i>
            </div>
            <h3 class="font-semibold">Angular</h3>
          </div>
          <div class="text-center">
            <div class="bg-gray-100 rounded-full p-6 inline-block mb-4">
              <i class="fab fa-python text-4xl text-blue-500"></i>
            </div>
            <h3 class="font-semibold">Django</h3>
          </div>
          <div class="text-center">
            <div class="bg-gray-100 rounded-full p-6 inline-block mb-4">
              <i class="fab fa-react text-4xl text-blue-400"></i>
            </div>
            <h3 class="font-semibold">React Native</h3>
          </div>
          <div class="text-center">
            <div class="bg-gray-100 rounded-full p-6 inline-block mb-4">
              <i class="fab fa-linux text-4xl text-gray-800"></i>
            </div>
            <h3 class="font-semibold">Linux</h3>
          </div>
          <div class="text-center">
            <div class="bg-gray-100 rounded-full p-6 inline-block mb-4">
              <i class="fab fa-google text-4xl text-blue-500"></i>
            </div>
            <h3 class="font-semibold">Google Cloud</h3>
          </div>
          <div class="text-center">
            <div class="bg-gray-100 rounded-full p-6 inline-block mb-4">
              <i class="fab fa-aws text-4xl text-orange-500"></i>
            </div>
            <h3 class="font-semibold">Amazon S3</h3>
          </div>
          <div class="text-center">
            <div class="bg-gray-100 rounded-full p-6 inline-block mb-4">
              <i class="fab fa-java text-4xl text-red-500"></i>
            </div>
            <h3 class="font-semibold">Java</h3>
          </div>
          <div class="text-center">
            <div class="bg-gray-100 rounded-full p-6 inline-block mb-4">
              <i class="fab fa-php text-4xl text-purple-500"></i>
            </div>
            <h3 class="font-semibold">PHP</h3>
          </div>
          <div class="text-center">
            <div class="bg-gray-100 rounded-full p-6 inline-block mb-4">
              <i class="fas fa-chart-line text-4xl text-blue-600"></i>
            </div>
            <h3 class="font-semibold">Grafana</h3>
          </div>
          <div class="text-center">
            <div class="bg-gray-100 rounded-full p-6 inline-block mb-4">
              <i class="fas fa-project-diagram text-4xl text-red-400"></i>
            </div>
            <h3 class="font-semibold">Node-RED</h3>
          </div>
          <div class="text-center">
            <div class="bg-gray-100 rounded-full p-6 inline-block mb-4">
              <i class="fab fa-wordpress text-4xl text-blue-700"></i>
            </div>
            <h3 class="font-semibold">WordPress</h3>
          </div>
          <div class="text-center">
            <div class="bg-gray-100 rounded-full p-6 inline-block mb-4">
              <i class="fab fa-html5 text-4xl text-orange-600"></i>
            </div>
            <h3 class="font-semibold">HTML</h3>
          </div>
          <div class="text-center">
            <div class="bg-gray-100 rounded-full p-6 inline-block mb-4">
              <i class="fab fa-css3-alt text-4xl text-blue-600"></i>
            </div>
            <h3 class="font-semibold">CSS</h3>
          </div>
          <div class="text-center">
            <div class="bg-gray-100 rounded-full p-6 inline-block mb-4">
              <i class="fab fa-python text-4xl text-yellow-600"></i>
            </div>
            <h3 class="font-semibold">Python</h3>
          </div>
          <div class="text-center">
            <div class="bg-gray-100 rounded-full p-6 inline-block mb-4">
              <i class="fas fa-database text-4xl text-green-600"></i>
            </div>
            <h3 class="font-semibold">InfluxDB</h3>
          </div>
          <div class="text-center">
            <div class="bg-gray-100 rounded-full p-6 inline-block mb-4">
              <i class="fas fa-leaf text-4xl text-green-500"></i>
            </div>
            <h3 class="font-semibold">Spring</h3>
          </div>
        </div>
      </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-gradient-to-r from-emerald-600 to-green-500 py-16">
      <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-8">Prêt à commencer l'aventure ?</h2>
        <p class="text-white text-lg mb-8">Rejoignez notre programme et devenez un expert du développement web</p>
        <a href="./public/preinscription.html" class="inline-block bg-white text-emerald-600 font-bold py-3 px-8 rounded-full hover:bg-emerald-50 transition-colors">
          Je m'inscris maintenant
          <i class="fas fa-arrow-right ml-2"></i>
        </a>
      </div>
    </div>
 
<!-- Services Section -->
<div class="bg-white py-16">
  <div class="container mx-auto px-4">
    <div class="flex flex-col md:flex-row gap-8 max-w-7xl mx-auto">
      <!-- Côté gauche - Carrousel -->
      <div class="md:w-1/2 relative">
        <div class="relative h-[400px] rounded-lg overflow-hidden">
          <!-- Éléments du carrousel -->
          <div class="carousel-container relative h-full">
            <div class="carousel-item absolute w-full h-full transition-opacity duration-500 opacity-100">
              <div class="bg-gradient-to-r from-blue-400 to-blue-600">
                <img src="https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3" alt="Consulting 1" class="w-full h-[500px] object-cover mix-blend-overlay">
              </div>
            </div>
            <div class="carousel-item absolute w-full h-full transition-opacity duration-500 opacity-0">
              <div class="bg-gradient-to-r from-blue-400 to-blue-600">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978" alt="Consulting 2" class="w-full h-[500px] object-cover mix-blend-overlay">
              </div>
            </div>
            <div class="carousel-item absolute w-full h-full transition-opacity duration-500 opacity-0">
              <div class="bg-gradient-to-r from-blue-400 to-blue-600">
                <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0" alt="Consulting 3" class="w-full h-[500px] object-cover mix-blend-overlay">
              </div>
            </div>
          </div>

          <!-- Navigation du carrousel -->
          <button class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/30 hover:bg-white/50 rounded-full p-2" onclick="moveCarousel(-1)">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>
          <button class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/30 hover:bg-white/50 rounded-full p-2" onclick="moveCarousel(1)">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>
        <!-- Points du carrousel -->
        <div class="flex justify-center mt-4 gap-2">
          <button class="carousel-dot w-2 h-2 rounded-full bg-blue-600" onclick="goToSlide(0)"></button>
          <button class="carousel-dot w-2 h-2 rounded-full bg-gray-300" onclick="goToSlide(1)"></button>
          <button class="carousel-dot w-2 h-2 rounded-full bg-gray-300" onclick="goToSlide(2)"></button>
        </div>
      </div>

      <!-- Côté droit - Boutons interactifs -->
      <div class="md:w-1/2">
        <h2 class="text-3xl font-bold text-center mb-12 title-font">Services de Conseil</h2>
        <p class="text-gray-600 mb-8">Nous proposons une variété de services de conseil pour aider les entreprises à croître et à améliorer leurs performances.</p>

        <!-- Boutons interactifs -->
        <div class="space-y-4">
          <div class="border border-gray-200 rounded-lg">
            <button class="service-btn w-full px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors flex justify-between items-center" onclick="toggleService('tech')">
              <span class="font-semibold text-gray-800">Conseil en Technologie</span>
              <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div id="tech-content" class="hidden px-4 py-3 bg-white">
              <p class="text-gray-600">Des conseils experts sur la stratégie technologique, la transformation numérique et le développement de feuilles de route innovantes. Nous aidons les entreprises à exploiter les technologies de pointe de manière efficace.</p>
            </div>
          </div>

          <div class="border border-gray-200 rounded-lg">
            <button class="service-btn w-full px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors flex justify-between items-center" onclick="toggleService('software')">
              <span class="font-semibold text-gray-800">Développement de Logiciels sur Mesure</span>
              <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div id="software-content" class="hidden px-4 py-3 bg-white">
              <p class="text-gray-600">Des services de développement logiciel sur mesure pour répondre aux besoins spécifiques de votre entreprise. De la planification au déploiement, nous garantissons des solutions de qualité et évolutives.</p>
            </div>
          </div>

          <div class="border border-gray-200 rounded-lg">
            <button class="service-btn w-full px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors flex justify-between items-center" onclick="toggleService('project')">
              <span class="font-semibold text-gray-800">Gestion de Projets</span>
              <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div id="project-content" class="hidden px-4 py-3 bg-white">
              <p class="text-gray-600">Des services professionnels de gestion de projets pour assurer la réussite de vos initiatives. Nous nous concentrons sur les délais, la qualité et une utilisation efficace des ressources.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
let currentSlide = 0;
const slides = document.querySelectorAll('.carousel-item');
const dots = document.querySelectorAll('.carousel-dot');

function showSlide(n) {
  slides.forEach(slide => slide.style.opacity = '0');
  dots.forEach(dot => dot.classList.replace('bg-blue-600', 'bg-gray-300'));
  
  slides[n].style.opacity = '1';
  dots[n].classList.replace('bg-gray-300', 'bg-blue-600');
}

function moveCarousel(direction) {
  currentSlide = (currentSlide + direction + slides.length) % slides.length;
  showSlide(currentSlide);
}

function goToSlide(n) {
  currentSlide = n;
  showSlide(currentSlide);
}

function toggleService(id) {
  const content = document.getElementById(`${id}-content`);
  const button = content.previousElementSibling;
  const arrow = button.querySelector('svg');
  
  // Hide all other contents
  document.querySelectorAll('[id$="-content"]').forEach(el => {
    if (el !== content) {
      el.classList.add('hidden');
      el.previousElementSibling.querySelector('svg').classList.remove('rotate-180');
    }
  });
  
  // Toggle current content
  content.classList.toggle('hidden');
  arrow.classList.toggle('rotate-180');
}

// Auto-advance carousel
setInterval(() => moveCarousel(1), 5000);

// Initialize first slide
showSlide(0);
</script>

<!-- Partners Section -->
<div class="bg-gray-50 py-16">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-12 title-font">Nos Partenaires</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
      <!-- DXC Technologies -->
      <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
        <div class="h-20 flex items-center justify-center mb-4">
          <img
            src="./public/images/logo-dxc.jpg"
            class="img-fluid rounded-lg"
            alt=""
          />
          
        </div>
        <h3 class="text-xl font-semibold text-center mb-2">DXC Technologies</h3>
        <p class="text-gray-600 text-center">Leader mondial des services IT</p>
      </div>

      <!-- Power Empire -->
      <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
        <div class="h-20 flex items-center justify-center mb-4">
        <img
            src="./public/images/powertech-empire (1).png"
            class="img-fluid rounded-lg"
            alt=""
          />
        </div>
        <h3 class="text-xl font-semibold text-center mb-2">Power Empire</h3>
        <p class="text-gray-600 text-center">Solutions énergétiques innovantes</p>
      </div>

      <!-- ServiceNow -->
      <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
        <div class="h-20 flex items-center justify-center mb-4">
          <i class="fas fa-cloud text-5xl text-green-500"></i>
        </div>
        <h3 class="text-xl font-semibold text-center mb-2">ServiceNow</h3>
        <p class="text-gray-600 text-center">Plateforme de workflow digitale</p>
      </div>
    </div>
  </div>
</div>

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