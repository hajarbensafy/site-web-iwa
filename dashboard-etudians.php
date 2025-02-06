import { useState, useEffect } from "react"

export default function ScheduleTeachers() {
  const [scheduleData, setScheduleData] = useState([])
  const [teachersData, setTeachersData] = useState([])
  const [scheduleSearch, setScheduleSearch] = useState("")
  const [scheduleDay, setScheduleDay] = useState("")
  const [teachersSearch, setTeachersSearch] = useState("")

  useEffect(() => {
    // Fetch initial data
    fetchScheduleData()
    fetchTeachersData()
  }, [])

  const fetchScheduleData = () => {
    // Simulated API call
    setScheduleData([
      { jour: "Lundi", matiere: "Mathématiques", debut: "08:00", fin: "10:00" },
      { jour: "Mardi", matiere: "Physique", debut: "10:00", fin: "12:00" },
      // Add more schedule data as needed
    ])
  }

  const fetchTeachersData = () => {
    // Simulated API call
    setTeachersData([
      { id: 1, nom: "Dupont", prenom: "Jean", telephone: "0123456789", email: "jean.dupont@example.com" },
      { id: 2, nom: "Martin", prenom: "Marie", telephone: "0987654321", email: "marie.martin@example.com" },
      // Add more teachers data as needed
    ])
  }

  return (
    <div className="bg-gradient-to-br from-green-50 to-emerald-50 min-h-screen">
      <nav className="bg-white/90 backdrop-blur-md shadow-lg fixed w-full z-50">{/* Navigation content */}</nav>
      <div className="max-w-7xl mx-auto px-4 pt-28 pb-12">
        {/* Header Section */}
        <div className="bg-gradient-to-r from-green-600 to-emerald-600 pb-32 pt-12 relative overflow-hidden">
          <div className="absolute inset-0 bg-grid-white/[0.05] bg-[size:20px_20px]"></div>
          <div className="container mx-auto px-4 relative">
            <h1 className="text-4xl font-bold text-white text-center mb-2 drop-shadow-lg">
              Emplois du Temps et Enseignants
            </h1>
          </div>
        </div>

        {/* Main Content */}
        <div className="container mx-auto px-4 -mt-24 pb-12 space-y-8">
          {/* Schedule Section */}
          <div className="bg-white/90 backdrop-blur-xl rounded-2xl shadow-xl border border-white/20 overflow-hidden animate-slide-up">
            <div className="border-b border-gray-100">
              <h2 className="text-2xl font-bold text-green-600 p-6 bg-gradient-to-r from-green-50/50 to-transparent">
                Emplois du Temps
              </h2>
            </div>

            {/* Search and Filter Section */}
            <div className="p-6 border-b border-gray-100 bg-white/80">
              <div className="flex flex-wrap items-center gap-4">
                <div className="relative flex-1 max-w-xs">
                  <input
                    type="text"
                    placeholder="Rechercher une matière..."
                    className="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all"
                    value={scheduleSearch}
                    onChange={(e) => setScheduleSearch(e.target.value)}
                  />
                  <i className="fas fa-search text-gray-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                </div>
                <select
                  className="rounded-xl border border-gray-200 py-2.5 pl-4 pr-10 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all"
                  value={scheduleDay}
                  onChange={(e) => setScheduleDay(e.target.value)}
                >
                  <option value="">Tous les jours</option>
                  <option value="Lundi">Lundi</option>
                  <option value="Mardi">Mardi</option>
                  <option value="Mercredi">Mercredi</option>
                  <option value="Jeudi">Jeudi</option>
                  <option value="Vendredi">Vendredi</option>
                  <option value="Samedi">Samedi</option>
                </select>
              </div>
            </div>

            {/* Schedule Table */}
            <div className="overflow-x-auto">
              <table className="min-w-full divide-y divide-gray-200">
                <thead>
                  <tr className="bg-gradient-to-r from-green-50 to-emerald-50">
                    <th className="px-6 py-4 text-left text-xs font-semibold text-green-600 uppercase tracking-wider">
                      Jour
                    </th>
                    <th className="px-6 py-4 text-left text-xs font-semibold text-green-600 uppercase tracking-wider">
                      Matière
                    </th>
                    <th className="px-6 py-4 text-left text-xs font-semibold text-green-600 uppercase tracking-wider">
                      Début
                    </th>
                    <th className="px-6 py-4 text-left text-xs font-semibold text-green-600 uppercase tracking-wider">
                      Fin
                    </th>
                  </tr>
                </thead>
                <tbody className="bg-white divide-y divide-gray-100">
                  {scheduleData.map((item, index) => (
                    <tr key={index}>
                      <td className="px-6 py-4 whitespace-nowrap">{item.jour}</td>
                      <td className="px-6 py-4 whitespace-nowrap">{item.matiere}</td>
                      <td className="px-6 py-4 whitespace-nowrap">{item.debut}</td>
                      <td className="px-6 py-4 whitespace-nowrap">{item.fin}</td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          </div>

          {/* Teachers Section */}
          <div className="bg-white/90 backdrop-blur-xl rounded-2xl shadow-xl border border-white/20 overflow-hidden animate-slide-up">
            <div className="border-b border-gray-100">
              <h2 className="text-2xl font-bold text-green-600 p-6 bg-gradient-to-r from-green-50/50 to-transparent">
                Liste des Enseignants
              </h2>
            </div>

            {/* Teachers Search Section */}
            <div className="p-6 border-b border-gray-100 bg-white/80">
              <div className="relative max-w-xs">
                <input
                  type="text"
                  placeholder="Rechercher un enseignant..."
                  className="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all"
                  value={teachersSearch}
                  onChange={(e) => setTeachersSearch(e.target.value)}
                />
                <i className="fas fa-search text-gray-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
              </div>
            </div>

            {/* Teachers Table */}
            <div className="overflow-x-auto">
              <table className="min-w-full divide-y divide-gray-200">
                <thead>
                  <tr className="bg-gradient-to-r from-green-50 to-emerald-50">
                    <th className="px-6 py-4 text-left text-xs font-semibold text-green-600 uppercase tracking-wider">
                      ID
                    </th>
                    <th className="px-6 py-4 text-left text-xs font-semibold text-green-600 uppercase tracking-wider">
                      Nom
                    </th>
                    <th className="px-6 py-4 text-left text-xs font-semibold text-green-600 uppercase tracking-wider">
                      Prénom
                    </th>
                    <th className="px-6 py-4 text-left text-xs font-semibold text-green-600 uppercase tracking-wider">
                      Téléphone
                    </th>
                    <th className="px-6 py-4 text-left text-xs font-semibold text-green-600 uppercase tracking-wider">
                      Email
                    </th>
                  </tr>
                </thead>
                <tbody className="bg-white divide-y divide-gray-100">
                  {teachersData.map((teacher) => (
                    <tr key={teacher.id}>
                      <td className="px-6 py-4 whitespace-nowrap">{teacher.id}</td>
                      <td className="px-6 py-4 whitespace-nowrap">{teacher.nom}</td>
                      <td className="px-6 py-4 whitespace-nowrap">{teacher.prenom}</td>
                      <td className="px-6 py-4 whitespace-nowrap">{teacher.telephone}</td>
                      <td className="px-6 py-4 whitespace-nowrap">{teacher.email}</td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          </div>
        </div>

        {/* Floating Action Button */}
        <button className="fixed bottom-8 right-8 bg-gradient-to-r from-green-600 to-emerald-600 p-4 rounded-full shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 group focus:outline-none focus:ring-4 focus:ring-green-300">
          <i className="fas fa-plus text-white text-lg transform group-hover:rotate-90 transition-transform duration-300"></i>
        </button>
      </div>
    </div>
  )
}

