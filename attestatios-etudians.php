export default function GreenAttestations() {
  return (
    <div className="bg-gradient-to-br from-green-50 via-green-100 to-green-200 min-h-screen">
      {/* Navbar */}
      <nav className="bg-white shadow-lg fixed w-full z-50">
        {/* ... (navbar content remains the same, just update hover colors to green) ... */}
      </nav>

      {/* Main Content */}
      <div className="max-w-7xl mx-auto px-4 pt-28 pb-12">
        <div className="bg-white rounded-2xl shadow-xl p-8">
          {/* Header */}
          <div className="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
            <div className="flex items-center space-x-4">
              <div className="bg-green-100 p-3 rounded-lg">
                <i className="fas fa-file-alt text-green-600 text-2xl"></i>
              </div>
              <h1 className="text-2xl font-bold text-gray-800">Gestion des Attestations</h1>
            </div>
            <a
              href="create_attestation.php"
              className="bg-gradient-to-r from-green-600 to-green-700 text-white px-6 py-3 rounded-lg hover:from-green-700 hover:to-green-800 transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center space-x-2"
            >
              <i className="fas fa-plus"></i>
              <span>Nouvelle Attestation</span>
            </a>
          </div>

          {/* Table Card */}
          <div className="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <div className="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
              <h2 className="text-white font-semibold text-lg">Liste des attestations</h2>
            </div>
            <div className="p-6 overflow-x-auto">
              {/* ... (table content remains the same, just update hover colors to green) ... */}
            </div>
          </div>
        </div>
      </div>

      {/* Footer */}
      <footer className="bg-green-200 text-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
          <div className="grid md:grid-cols-3 gap-8">
            {/* ... (footer content remains the same, just update text colors to green) ... */}
          </div>
          <div className="border-t border-white justify-center mt-12 pt-8 items-center">
            <p className="text-black text-center">© 2025 IWA. Tous droits réservés.</p>
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

