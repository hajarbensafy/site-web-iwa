export default function AdminDashboard() {
  return (
    <div className="bg-gradient-to-br from-green-50 via-green-100 to-green-200 min-h-screen">
      {/* Navbar */}
      <nav className="bg-white shadow-lg fixed w-full z-50">
        <div className="max-w-7xl mx-auto px-4">
          <div className="flex justify-between items-center h-20">
            <div className="flex-shrink-0">
              <img src="./public/images/image12.png" alt="IWA Logo" className="h-[12vh]" />
            </div>
            <div className="hidden md:flex space-x-8">
              <a href="./dashboard.php" className="flex items-center px-4 py-2 text-green-600 bg-green-50 rounded-lg">
                <i className="fas fa-home mr-2"></i>
                Tableau de bord
              </a>
              {/* Other nav items... */}
              <button
                onClick={() => logout()}
                className="flex items-center px-4 py-2 text-gray-700 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all duration-300"
              >
                <i className="fas fa-sign-out-alt mr-2"></i>
                Déconnexion
              </button>
            </div>
          </div>
        </div>
      </nav>

      {/* Main Content */}
      <div className="max-w-7xl mx-auto px-4 pt-28 pb-12">
        <div className="bg-white rounded-2xl shadow-xl p-8">
          {/* Header */}
          <div className="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
            <div className="flex items-center space-x-4">
              <div className="bg-green-100 p-3 rounded-lg">
                <i className="fas fa-home text-green-600 text-2xl"></i>
              </div>
              <h1 className="text-2xl font-bold text-gray-800">Tableau de bord</h1>
            </div>
          </div>

          {/* Stats Grid */}
          <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            {/* Total Students Card */}
            <div className="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
              <div className="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                <h2 className="text-white font-semibold text-lg">Total Étudiants</h2>
              </div>
              <div className="p-6">
                <p className="text-3xl font-bold text-green-600">{/* PHP echo total_students */}</p>
              </div>
            </div>

            {/* Pending Attestations Card */}
            <div className="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
              <div className="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                <h2 className="text-white font-semibold text-lg">Demandes d'Attestation</h2>
              </div>
              <div className="p-6">
                <p className="text-3xl font-bold text-green-600">{/* PHP echo total_attestations */}</p>
              </div>
            </div>

            {/* Success Rate Card */}
            <div className="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
              <div className="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                <h2 className="text-white font-semibold text-lg">Taux de Réussite</h2>
              </div>
              <div className="p-6">
                <p className="text-3xl font-bold text-green-600">85%</p>
              </div>
            </div>
          </div>

          {/* Recent Activities */}
          <div className="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <div className="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
              <h2 className="text-white font-semibold text-lg">Activités Récentes</h2>
            </div>
            <div className="p-6">
              <div className="space-y-4">{/* Activity items... */}</div>
            </div>
          </div>
        </div>
      </div>

      {/* Footer */}
      <footer className="bg-green-200 text-white">{/* Footer content... */}</footer>
    </div>
  )
}

function logout() {
  sessionStorage.clear()
  window.location.href = "./index.php"
}

