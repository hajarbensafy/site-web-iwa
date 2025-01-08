// Menu mobile
const menuToggle = document.getElementById('menuToggle');
const navMenu = document.querySelector('.nav-menu');

menuToggle.addEventListener('click', () => {
    navMenu.classList.toggle('active');
});

// Animation des stats
const stats = document.querySelectorAll('.stat-number');
const observerOptions = {
    threshold: 0.5
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            animateValue(entry.target);
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

stats.forEach(stat => observer.observe(stat));

function animateValue(element) {
    const value = parseInt(element.textContent);
    let current = 0;
    const increment = value / 50;
    const duration = 1500;
    const interval = duration / 50;

    const timer = setInterval(() => {
        current += increment;
        if (current >= value) {
            element.textContent = value + '+';
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current) + '+';
        }
    }, interval);
}

// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
}); 