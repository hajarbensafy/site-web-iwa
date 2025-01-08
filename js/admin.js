// Import de la configuration
import { CONFIG } from './config.js';

// Gestion de l'authentification
class Auth {
    static isAuthenticated() {
        return localStorage.getItem('token') !== null;
    }

    static login(credentials) {
        // Simulation d'une requête API
        return new Promise((resolve) => {
            setTimeout(() => {
                localStorage.setItem('token', 'fake-token');
                resolve({ success: true });
            }, 1000);
        });
    }

    static logout() {
        localStorage.removeItem('token');
        window.location.href = CONFIG.ROUTES.LOGIN;
    }
}

// Gestion des formulaires
document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());

        if (form.classList.contains('login-form')) {
            try {
                await Auth.login(data);
                window.location.href = CONFIG.ROUTES.DASHBOARD;
            } catch (error) {
                console.error('Erreur de connexion:', error);
            }
        }
    });
});

// Vérification de l'authentification sur les pages admin
if (window.location.pathname.startsWith('/admin') && 
    !window.location.pathname.includes('login')) {
    if (!Auth.isAuthenticated()) {
        window.location.href = CONFIG.ROUTES.LOGIN;
    }
}

// Gestion du menu mobile
const menuToggle = document.querySelector('.menu-toggle');
const sidebar = document.querySelector('.sidebar');

if (menuToggle) {
    menuToggle.addEventListener('click', () => {
        sidebar.classList.toggle('active');
    });
}

// Animation des statistiques
function animateValue(element, start, end, duration) {
    let current = start;
    const range = end - start;
    const increment = range / (duration / 16);
    const timer = setInterval(() => {
        current += increment;
        if (current >= end) {
            element.textContent = end;
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current);
        }
    }, 16);
}

// Initialiser les animations au chargement
document.addEventListener('DOMContentLoaded', () => {
    const statNumbers = document.querySelectorAll('.stat-number');
    statNumbers.forEach(stat => {
        const value = parseInt(stat.textContent);
        animateValue(stat, 0, value, 1000);
    });
}); 