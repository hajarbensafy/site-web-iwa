import Image from "next/image"
import Link from "next/link"

export default function Programme() {
  return (
    <div className="bg-green-50 text-green-900">
      <nav className="bg-white shadow-lg fixed w-full z-50">
        <div className="max-w-7xl mx-auto px-4">
          <div className="flex justify-between items-center h-16">
            <div className="flex-shrink-0">
              <Image src="/images/image12.png" alt="IWA Logo" width={120} height={48} />
            </div>
            <div className="hidden md:flex space-x-8">
              <Link
                href="./index.php"
                className="text-green-700 hover:text-green-600 px-3 py-2 rounded-md font-medium transition-colors"
              >
                Accueil
              </Link>
              <div className="relative group">
                <a href="#" className="block hover:text-green-600 px-3 py-2 rounded-md font-medium transition-colors">
                  Formation IWA
                  <svg className="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </a>
                <div className="absolute hidden group-hover:block w-48 bg-white shadow-lg rounded-md py-2 animate-fade-in">
                  <Link href="./objectifs.php" className="block px-4 py-2 text-green-700 hover:bg-green-50">
                    Objectifs
                  </Link>
                  <Link href="./publicvisé.php" className="block px-4 py-2 text-green-700 hover:bg-green-50">
                    Public visé
                  </Link>
                  <Link href="./debouches.php" className="block px-4 py-2 text-green-700 hover:bg-green-50">
                    Débouchés
                  </Link>
                  <Link href="./programme.php" className="block px-4 py-2 text-green-700 hover:bg-green-50">
                    Programme
                  </Link>
                  <Link href="./preinscription.php" className="block px-4 py-2 text-green-700 hover:bg-green-50">
                    Préinscription
                  </Link>
                </div>
              </div>
              <Link
                href="./events.php"
                className="text-green-700 hover:text-green-600 px-3 py-2 rounded-md font-medium transition-colors"
              >
                Événements
              </Link>
              <Link
                href="./contact.php"
                className="text-green-700 hover:text-green-600 px-3 py-2 rounded-md font-medium transition-colors"
              >
                Contact
              </Link>
            </div>
            <div className="relative group">
              <button className="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition-colors">
                Connecter
                <svg className="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </button>
              <div className="absolute hidden group-hover:block w-48 right-0 bg-white shadow-lg rounded-md py-2 animate-fade-in">
                <Link href="./login.php" className="block px-4 py-2 text-green-700 hover:bg-green-50">
                  Administrateur
                </Link>
                <Link href="./login-etudiant.php" className="block px-4 py-2 text-green-700 hover:bg-green-50">
                  Étudiants
                </Link>
              </div>
            </div>
          </div>
        </div>
      </nav>

      <section className="relative h-[300px]">
        <div className="absolute inset-0">
          <Image
            src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80"
            alt="Background"
            layout="fill"
            objectFit="cover"
            className="mix-blend-overlay"
          />
        </div>
        <div className="relative container mx-auto px-4 h-full flex flex-col justify-center">
          <h2 className="text-3xl font-bold mb-4 text-green-800">Programme de la formation</h2>
          <p className="text-white font-bold mb-8">
            La formation est répartie sur 4 semestres et chaque semestre est constitué de 4 modules :
          </p>
        </div>
      </section>

      <div className="container mx-auto px-4 py-19">
        <div className="bg-white shadow-xl rounded-lg overflow-hidden">
          <div className="p-6">
            <div className="mb-8">
              <div className="grid grid-cols-2 lg:grid-cols-4 gap-4" role="tablist">
                {["Semestre 1", "Semestre 2", "Semestre 3", "Semestre 4"].map((semester, index) => (
                  <button
                    key={index}
                    className="tab-trigger py-3 px-6 bg-green-200 text-green-700 hover:bg-green-400 hover:text-white rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500"
                    role="tab"
                    aria-selected={index === 0 ? "true" : "false"}
                    data-target={`semestre${index + 1}`}
                  >
                    {semester}
                  </button>
                ))}
              </div>
            </div>

            {/* Tab content would go here, similar structure as before but with green color classes */}
          </div>
        </div>
      </div>

      <footer className="bg-green-200 text-green-900">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
          <div className="grid md:grid-cols-3 gap-8">
            <div>
              <Image src="/images/image12.png" alt="IWA Logo" width={140} height={56} className="mb-4" />
              <p className="text-green-800 text-lg">Formation supérieure en ingénierie web avancée</p>
            </div>
            <div>
              <h3 className="text-lg font-semibold mb-4 text-green-800">Contact</h3>
              <div className="space-y-2">
                <a
                  href="mailto:iwa@uae.ac.ma"
                  className="text-green-700 hover:text-green-900 transition-colors flex items-center"
                >
                  <svg className="w-5 h-5 mr-2 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                      strokeLinecap="round"
                      strokeLinejoin="round"
                      strokeWidth="2"
                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                    ></path>
                  </svg>
                  iwa@uae.ac.ma
                </a>
                <p className="text-green-700 flex items-center">
                  <svg className="w-5 h-5 mr-2 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                      strokeLinecap="round"
                      strokeLinejoin="round"
                      strokeWidth="2"
                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                    ></path>
                  </svg>
                  06 62 10 21 67
                </p>
              </div>
            </div>
            <div>
              <h3 className="text-lg font-semibold mb-4 text-green-800">Restez connecté</h3>
              <form className="space-y-4">
                <div>
                  <input
                    type="email"
                    placeholder="Votre email"
                    className="w-full px-4 py-2 rounded-lg bg-white focus:outline-none focus:border-green-500"
                  />
                </div>
                <button
                  type="submit"
                  className="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition-colors"
                >
                  S'inscrire
                </button>
              </form>
            </div>
          </div>
          <div className="border-t border-green-300 mt-12 pt-8 items-center">
            <p className="text-green-700 text-center">© 2025 IWA. Tous droits réservés.</p>
          </div>
        </div>
        <a
          href="#"
          className="fixed bottom-8 right-8 bg-green-600 p-3 rounded-full shadow-lg hover:bg-green-700 transition-colors"
        >
          <svg className="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
          </svg>
        </a>
      </footer>
    </div>
  )
}

