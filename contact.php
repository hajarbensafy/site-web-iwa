<!DOCTYPE html>
<html lang="fr" class="bg-green-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IWA Formation - Contact</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="min-h-screen">
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
    <main class="pt-16">
        <section class="relative h-[300px] overflow-hidden">
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644" 
                     alt="Contact Background" 
                     class="w-full h-full object-cover filter brightness-50">
            </div>
            <div class="relative container mx-auto px-4 h-full flex flex-col justify-center">
                <h1 class="text-5xl font-bold mb-4 text-white">Contactez-nous</h1>
            </div>
        </section>

        <section class="py-16">
            <div class="container mx-auto px-4">
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-white p-8 rounded-lg shadow-md">
                        <h2 class="text-2xl font-bold mb-6 text-green-700"><i class="fas fa-paper-plane mr-2"></i> Envoyez-nous un message</h2>
                        <form class="space-y-4">
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                                    <input type="text" id="nom" name="nom" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <input type="email" id="email" name="email" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                                </div>
                            </div>
                            <div>
                                <label for="telephone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                                <input type="tel" id="telephone" name="telephone" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                            </div>
                            <div>
                                <label for="sujet" class="block text-sm font-medium text-gray-700 mb-1">Sujet</label>
                                <select id="sujet" name="sujet" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                                    <option value="">Sélectionnez un sujet</option>
                                    <option value="inscription">Inscription</option>
                                    <option value="information">Demande d'information</option>
                                    <option value="partenariat">Partenariat</option>
                                    <option value="autre">Autre</option>
                                </select>
                            </div>
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                                <textarea id="message" name="message" rows="5" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
                            </div>
                            <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 transition-colors">
                                <i class="fas fa-paper-plane mr-2"></i> Envoyer le message
                            </button>
                        </form>
                    </div>

                    <div class="space-y-8">
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h2 class="text-xl font-bold mb-4 text-green-700"><i class="fas fa-map-marker-alt mr-2"></i> Adresse</h2>
                            <p class="text-gray-600">
                                Faculté des Sciences de Tétouan<br>
                                M'hannech II, B.P. 2121<br>
                                93030 Tétouan, Maroc
                            </p>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h2 class="text-xl font-bold mb-4 text-green-700"><i class="fas fa-users mr-2"></i> Responsables</h2>
                            <div class="space-y-4">
                                <div>
                                    <h3 class="font-semibold">Prof. Youssef Zaz</h3>
                                    <p class="text-sm text-gray-600">Responsable d'IWA</p>
                                    <a href="tel:+212662102167" class="text-green-600 hover:underline"><i class="fas fa-phone mr-2"></i> 06 62 10 21 67</a>
                                </div>
                                <div>
                                    <h3 class="font-semibold">Prof. Adil Enaanai</h3>
                                    <p class="text-sm text-gray-600">Co-responsable</p>
                                    <a href="tel:+212677205790" class="text-green-600 hover:underline"><i class="fas fa-phone mr-2"></i> 06 77 20 57 90</a>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h2 class="text-xl font-bold mb-4 text-green-700"><i class="fas fa-envelope mr-2"></i> Email</h2>
                            <a href="mailto:iwa@uae.ac.ma" class="text-green-600 hover:underline">iwa@uae.ac.ma</a>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h2 class="text-xl font-bold mb-4 text-green-700"><i class="fas fa-clock mr-2"></i> Horaires</h2>
                            <p class="text-gray-600">Lundi - Vendredi : 9h00 - 17h00</p>
                        </div>
                    </div>
                </div>

                <div class="mt-16">
                    <h2 class="text-2xl font-bold mb-6 text-green-700"><i class="fas fa-map mr-2"></i> Notre Localisation</h2>
                    <div class="aspect-w-16 aspect-h-9">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3238.840977712742!2d-5.363187684747632!3d35.562825880220924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0b42dd8f34e6e3%3A0x2c118f6ebb79e220!2sFaculty%20of%20Sciences%20Tetouan!5e0!3m2!1sen!2sma!4v1647081148702!5m2!1sen!2sma"
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
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