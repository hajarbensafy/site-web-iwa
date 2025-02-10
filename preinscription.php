<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préinscription - IWA Formation</title>
    <link rel="stylesheet" href="../css/style.css">
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
    <main>
       

        <div class="min-h-screen bg-gradient-to-br from-green-100 via-emerald-200 to-teal-300 py-12 px-4 sm:px-6 lg:px-8 animate-gradient-x pt-24">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mt-8">
                   
                </div>
                <div class="overflow-hidden shadow-2xl transform hover:scale-[1.02] transition-all duration-300 bg-white bg-opacity-80 backdrop-filter backdrop-blur-lg rounded-lg">
                    <div class="text-center bg-gradient-to-r from-green-500 to-emerald-600 text-white p-8 relative overflow-hidden">
                        <div class="absolute inset-0 opacity-20">
                            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTYwIiBoZWlnaHQ9IjU2MCIgdmlld0JveD0iMCAwIDU2MCA1NjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiAgPGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMjgwIDI4MCkiIHN0cm9rZS13aWR0aD0iLjUiIHN0cm9rZT0iI0ZGRiI+CiAgICA8Y2lyY2xlIHN0cm9rZS1vcGFjaXR5PSIuMSIgY3g9IjAiIGN5PSIwIiByPSIxMCIvPgogICAgPGNpcmNsZSBzdHJva2Utb3BhY2l0eT0iLjIiIGN4PSIwIiBjeT0iMCIgcj0iMjAiLz4KICAgIDxjaXJjbGUgc3Ryb2tlLW9wYWNpdHk9Ii4zIiBjeD0iMCIgY3k9IjAiIHI9IjQwIi8+CiAgICA8Y2lyY2xlIHN0cm9rZS1vcGFjaXR5PSIuNCIgY3g9IjAiIGN5PSIwIiByPSI4MCIvPgogICAgPGNpcmNsZSBzdHJva2Utb3BhY2l0eT0iLjUiIGN4PSIwIiBjeT0iMCIgcj0iMTYwIi8+CiAgICA8Y2lyY2xlIHN0cm9rZS1vcGFjaXR5PSIuNiIgY3g9IjAiIGN5PSIwIiByPSIzMjAiLz4KICA8L2c+Cjwvc3ZnPg==')]"></div>
                        </div>
                        <h2 class="text-4xl font-extrabold mb-2 relative z-10">
                            Formulaire de Préinscription
                        </h2>
                        <p class="text-xl text-green-100 relative z-10">
                            Votre parcours vers l'excellence commence ici
                        </p>
                    </div>
                    <div class="p-8">
                        <form id="preinscriptionForm" class="space-y-8">
                            <div class="space-y-6">
                                <div class="relative">
                                    <label for="nom" class="text-lg font-semibold text-green-800 block mb-2">Nom complet</label>
                                    <div class="relative">
                                        <input
                                            id="nom"
                                            name="nom"
                                            type="text"
                                            required
                                            class="w-full mt-1 pl-10 py-2 bg-white bg-opacity-70 backdrop-blur-sm border-green-300 focus:border-green-500 focus:ring-green-500 rounded-md"
                                            placeholder="Entrez votre nom complet"
                                        >
                                        <i class="fas fa-leaf absolute left-3 top-1/2 transform -translate-y-1/2 text-green-500"></i>
                                    </div>
                                </div>
        
                                <div class="relative">
                                    <label for="email" class="text-lg font-semibold text-green-800 block mb-2">Adresse email</label>
                                    <div class="relative">
                                        <input
                                            id="email"
                                            name="email"
                                            type="email"
                                            required
                                            class="w-full mt-1 pl-10 py-2 bg-white bg-opacity-70 backdrop-blur-sm border-green-300 focus:border-green-500 focus:ring-green-500 rounded-md"
                                            placeholder="vous@exemple.com"
                                        >
                                        <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-green-500"></i>
                                    </div>
                                </div>
        
                                <div class="relative">
                                    <label for="telephone" class="text-lg font-semibold text-green-800 block mb-2">Numéro de téléphone</label>
                                    <div class="relative">
                                        <input
                                            id="telephone"
                                            name="telephone"
                                            type="tel"
                                            required
                                            class="w-full mt-1 pl-10 py-2 bg-white bg-opacity-70 backdrop-blur-sm border-green-300 focus:border-green-500 focus:ring-green-500 rounded-md"
                                            placeholder="06 XX XX XX XX"
                                        >
                                        <i class="fas fa-phone absolute left-3 top-1/2 transform -translate-y-1/2 text-green-500"></i>
                                    </div>
                                </div>
        
                                <div>
                                    <label for="niveau" class="text-lg font-semibold text-green-800 block mb-2">Niveau d'études actuel</label>
                                    <select
                                        id="niveau"
                                        name="niveau"
                                        required
                                        class="w-full mt-1 py-2 bg-white bg-opacity-70 backdrop-blur-sm border-green-300 focus:border-green-500 focus:ring-green-500 rounded-md"
                                    >
                                        <option value="">Sélectionnez votre niveau</option>
                                        <option value="bac">Baccalauréat</option>
                                        <option value="bac+2">Bac+2</option>
                                        <option value="bac+3">Bac+3</option>
                                        <option value="bac+5">Bac+5 ou plus</option>
                                    </select>
                                </div>
        
                                <div>
                                    <label for="formation" class="text-lg font-semibold text-green-800 block mb-2">Formation souhaitée</label>
                                    <select
                                        id="formation"
                                        name="formation"
                                        required
                                        class="w-full mt-1 py-2 bg-white bg-opacity-70 backdrop-blur-sm border-green-300 focus:border-green-500 focus:ring-green-500 rounded-md"
                                    >
                                        <option value="">Sélectionnez une formation</option>
                                        <option value="dev_web">
                                            <i class="fas fa-rocket mr-2 text-green-600"></i>
                                            Développement Web
                                        </option>
                                        <option value="data_science">
                                            <i class="fas fa-book-open mr-2 text-green-600"></i>
                                            Data Science
                                        </option>
                                        <option value="cyber_security">
                                            <i class="fas fa-shield-alt mr-2 text-green-600"></i>
                                            Cybersécurité
                                        </option>
                                        <option value="ia">
                                            <i class="fas fa-brain mr-2 text-green-600"></i>
                                            Intelligence Artificielle
                                        </option>
                                    </select>
                                </div>
        
                                <div>
                                    <label for="motivation" class="text-lg font-semibold text-green-800 block mb-2">Lettre de motivation</label>
                                    <textarea
                                        id="motivation"
                                        name="motivation"
                                        required
                                        class="w-full mt-1 py-2 bg-white bg-opacity-70 backdrop-blur-sm border-green-300 focus:border-green-500 focus:ring-green-500 rounded-md"
                                        placeholder="Décrivez votre motivation pour rejoindre cette formation..."
                                        rows="5"
                                    ></textarea>
                                </div>
                            </div>
        
                            <div class="flex justify-end">
                                <button type="submit" class="w-full sm:w-auto bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-bold py-3 px-6 rounded-full shadow-lg transform transition-all duration-500 ease-in-out hover:scale-105 hover:brightness-110 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                                    <i class="fas fa-paper-plane mr-2"></i>
                                    Envoyer ma candidature
                                    <i class="fas fa-chevron-right ml-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
            <script>
                document.getElementById('preinscriptionForm').addEventListener('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData(this);
                    const formObject = Object.fromEntries(formData.entries());
                    console.log(formObject);
                    // Here you would typically send the data to your server
                    alert('Formulaire soumis avec succès!');
                });
            </script>
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