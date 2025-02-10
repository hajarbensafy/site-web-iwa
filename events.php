<?php
require_once "config.php";

// Récupération des événements
$events = [];
$sql = "SELECT * FROM events ORDER BY date ASC LIMIT 10";
if ($result = mysqli_query($link, $sql)) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}
mysqli_close($link);

// Fonction pour formater la date
function formatDate($date) {
    return date('d M Y', strtotime($date));
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Événements IWA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="min-h-screen bg-gradient-to-br from-emerald-50 via-white to-emerald-100">
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
    <!-- Header -->
    <header class="relative py-24 bg-emerald-800">
        <div class="absolute inset-0 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87" 
                 alt="Background" 
                 class="w-full h-full object-cover object-center opacity-10">
            <div class="absolute inset-0 bg-emerald-900/90"></div>
        </div>
        
        <div class="relative container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-flex items-center justify-center px-4 py-1.5 mb-6 rounded-full bg-emerald-700 text-emerald-100 text-sm font-medium">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    Événements IWA 2024
                </div>
                <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">
                    Découvrez Nos Événements
                </h1>
                <p class="text-xl text-emerald-100 mb-10">
                    Participez à nos événements exceptionnels et enrichissez votre expérience académique
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <button class="px-8 py-4 bg-emerald-500 hover:bg-emerald-600 text-white rounded-lg font-semibold transition-all">
                        <i class="fas fa-calendar-plus mr-2"></i>
                        S'inscrire
                    </button>
                    <button class="px-8 py-4 bg-white/10 hover:bg-white/20 text-white rounded-lg font-semibold transition-all">
                        <i class="fas fa-info-circle mr-2"></i>
                        En savoir plus
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-16 -mt-20 relative">
        <?php if (count($events) > 0): ?>
            <div class="swiper-container h-[600px]">
                <div class="swiper-wrapper">
                    <?php foreach ($events as $event): ?>
                        <div class="swiper-slide p-4">
                            <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-xl overflow-hidden h-full group">
                                <div class="relative h-72 overflow-hidden">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                    <img 
                                        src="<?= htmlspecialchars($event['image_url']) ?>" 
                                        alt="<?= htmlspecialchars($event['title']) ?>"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                    >
                                    <div class="absolute top-4 right-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-500 text-white text-sm font-medium">
                                            Nouveau
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="p-6">
                                    <div class="flex items-center gap-4 mb-4 -mt-12">
                                        <div class="bg-white px-4 py-2 rounded-lg shadow-lg">
                                            <div class="text-center">
                                                <span class="block text-sm font-semibold text-emerald-600"><?= date('M', strtotime($event['date'])) ?></span>
                                                <span class="block text-2xl font-bold"><?= date('d', strtotime($event['date'])) ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <h2 class="text-2xl font-bold text-gray-900 mb-4">
                                        <?= htmlspecialchars($event['title']) ?>
                                    </h2>
                                    
                                    <p class="text-gray-600 mb-6 line-clamp-3">
                                        <?= htmlspecialchars($event['description']) ?>
                                    </p>
                                    
                                    <div class="flex items-center gap-6 mb-6 text-sm">
                                        <div class="flex items-center text-gray-600">
                                            <i class="fas fa-map-marker-alt text-emerald-500 mr-2"></i>
                                            <?= htmlspecialchars($event['location']) ?>
                                        </div>
                                        <div class="flex items-center text-gray-600">
                                            <i class="fas fa-clock text-emerald-500 mr-2"></i>
                                            <?= date('H:i', strtotime($event['date'])) ?>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-3">
                                        <button class="flex-1 px-6 py-3 bg-emerald-500 hover:bg-emerald-600 text-white rounded-lg font-medium transition-colors">
                                            Réserver ma place
                                        </button>
                                        <button class="p-3 text-emerald-500 hover:bg-emerald-50 rounded-lg transition-colors">
                                            <i class="fas fa-share-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination !-bottom-10"></div>
                <div class="swiper-button-next !text-emerald-500"></div>
                <div class="swiper-button-prev !text-emerald-500"></div>
            </div>
        <?php else: ?>
            <div class="text-center py-16 bg-white/80 backdrop-blur-md rounded-2xl shadow-xl">
                <div class="w-20 h-20 mx-auto mb-6 bg-emerald-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-calendar-times text-3xl text-emerald-500"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Aucun événement prévu</h3>
                <p class="text-gray-600 mb-6">Nous préparons de nouveaux événements passionnants.</p>
                <button class="px-6 py-3 bg-emerald-500 hover:bg-emerald-600 text-white rounded-lg font-medium transition-colors">
                    M'alerter des nouveaux événements
                </button>
            </div>
        <?php endif; ?>
    </main>

    <script>
        new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });
    </script>
</body>
</html>