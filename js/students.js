class StudentManager {
    static async getAll() {
        try {
            const response = await fetch(`${CONFIG.API_URL}/students`);
            return await response.json();
        } catch (error) {
            console.error('Erreur lors de la récupération des étudiants:', error);
            return [];
        }
    }

    static async add(studentData) {
        try {
            const response = await fetch(`${CONFIG.API_URL}/students`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${localStorage.getItem('token')}`
                },
                body: JSON.stringify(studentData)
            });
            return await response.json();
        } catch (error) {
            console.error('Erreur lors de l\'ajout de l\'étudiant:', error);
            throw error;
        }
    }

    static async update(id, studentData) {
        try {
            const response = await fetch(`${CONFIG.API_URL}/students/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${localStorage.getItem('token')}`
                },
                body: JSON.stringify(studentData)
            });
            return await response.json();
        } catch (error) {
            console.error('Erreur lors de la mise à jour de l\'étudiant:', error);
            throw error;
        }
    }

    static async delete(id) {
        try {
            await fetch(`${CONFIG.API_URL}/students/${id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${localStorage.getItem('token')}`
                }
            });
            return true;
        } catch (error) {
            console.error('Erreur lors de la suppression de l\'étudiant:', error);
            throw error;
        }
    }
}

export default StudentManager; 