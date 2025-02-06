export default function GreenEventForm() {
  return (
    <div className="min-h-screen bg-green-50 flex items-center justify-center p-6">
      <div className="max-w-lg w-full bg-white p-8 rounded-lg shadow-md">
        <h1 className="text-3xl font-bold text-center text-green-800 mb-6">Ajouter un Nouvel Événement</h1>

        {/* Success and error messages would be dynamically rendered here */}

        <form className="space-y-6">
          <div>
            <label htmlFor="title" className="block text-sm font-medium text-green-700">
              Titre
            </label>
            <input
              type="text"
              id="title"
              name="title"
              required
              className="mt-1 block w-full px-4 py-2 border border-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
            />
          </div>

          <div>
            <label htmlFor="description" className="block text-sm font-medium text-green-700">
              Description
            </label>
            <textarea
              id="description"
              name="description"
              required
              rows={4}
              className="mt-1 block w-full px-4 py-2 border border-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
            ></textarea>
          </div>

          <div>
            <label htmlFor="date" className="block text-sm font-medium text-green-700">
              Date
            </label>
            <input
              type="datetime-local"
              id="date"
              name="date"
              required
              className="mt-1 block w-full px-4 py-2 border border-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
            />
          </div>

          <div>
            <label htmlFor="location" className="block text-sm font-medium text-green-700">
              Lieu
            </label>
            <input
              type="text"
              id="location"
              name="location"
              required
              className="mt-1 block w-full px-4 py-2 border border-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
            />
          </div>

          <div>
            <label htmlFor="event_type" className="block text-sm font-medium text-green-700">
              Type d'Événement
            </label>
            <select
              id="event_type"
              name="event_type"
              required
              className="mt-1 block w-full px-4 py-2 border border-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
            >
              <option value="Conférence">Conférence</option>
              <option value="Séminaire">Séminaire</option>
              <option value="Atelier">Atelier</option>
              <option value="Autre">Autre</option>
            </select>
          </div>

          <div className="flex justify-between">
            <button
              type="submit"
              className="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
            >
              Soumettre
            </button>
            <a
              href="./events.php"
              className="px-4 py-2 bg-gray-200 text-green-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
            >
              Annuler
            </a>
          </div>
        </form>
      </div>
    </div>
  )
}

