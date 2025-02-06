<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IWA - Formation Supérieure</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            light: '#4ade80',
                            DEFAULT: '#22c55e',
                            dark: '#16a34a',
                        },
                    },
                    animation: {
                        'fade-in': 'fadeIn 1s ease-in',
                        'slide-up': 'slideUp 0.5s ease-out',
                        'bounce-slow': 'bounce 3s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-green-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0">
                    <img src="./public/images/image12.png" alt="IWA Logo" class="h-[12vh]">
                </div>
                <div class="hidden md:flex space-x-8">
                    <!-- Navigation items -->
                    <?php
                    $navItems = [
                        'Accueil' => './index.php',
                        'Formation IWA' => '#',
                        'Événements' => './events.php',
                        'Contact' => './contact.php'
                    ];
                    foreach ($navItems as $name => $url) {
                        echo "<a href=\"$url\" class=\"text-gray-700 hover:text-green-600 px-3 py-2 rounded-md font-medium transition-colors\">$name</a>";
                    }
                    ?>
                </div>
                <div class="relative group">
                    <button class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition-colors">
                        Connecter
                        <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="absolute hidden group-hover:block w-48 right-0 bg-white shadow-lg rounded-md py-2 animate-fade-in">
                        <a href="./login.php" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Administrateur</a>
                        <a href="./login-etudiant.php" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Étudiants</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main>
        <section class="relative bg-green-200 text-white py-20 overflow-hidden">
            <!-- Hero content -->
            <div class="text-center py-10">
                <h1 class="text-4xl text-center inline-block md:text-5xl text-green-600 font-bold">
                    Formation Ingénierie Web Avancé
                </h1>
            </div>
            <!-- Rest of the hero section content -->
        </section>

        <!-- Features Section -->
        <section class="py-24 bg-gradient-to-b from-white to-green-50">
            <!-- Features content -->
        </section>

        <!-- Partners Section -->
        <section class="py-2 bg-green-50">
            <!-- Partners content -->
        </section>

        <!-- Gallery Section -->
        <section class="py-24">
            <!-- Gallery content -->
        </section>

        <!-- Call to Action Section -->
        <section class="py-24 bg-gradient-to-r from-green-200 to-green-500 text-white">
            <!-- CTA content -->
        </section>

        <!-- Technologies Section -->
        <section class="py-24 bg-white">
            <!-- Technologies content -->
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-green-200 text-white">
        <!-- Footer content -->
    </footer>

    <?php
    // PHP code for the image slider
    $slides = [
        './public/images/IWA-Event-FLE-021.jpg',
        './public/images/IWA-Event-FLE-008_(1).jpg',
        './public/images/Nouhaila-El-Aissaoui-IWA-2021-2023_(1).jpg',
        './public/images/IWA-Soutenances-Promo-2022-2024.jpg'
    ];
    ?>

    <script>
        let currentSlide = 0;
        const totalSlides = <?php echo count($slides); ?>;
        const container = document.getElementById('gallery-container');

        function updateSlide() {
            container.style.transform = `translateX(-${currentSlide * 100}%)`;
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateSlide();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateSlide();
        }

        // Auto-advance slides
        setInterval(nextSlide, 5000);

        // Smooth scroll to top
        document.querySelector('a[href="#"]').addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>


