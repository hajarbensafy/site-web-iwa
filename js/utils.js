export const formatDate = (date) => {
    return new Date(date).toLocaleDateString('fr-FR');
};

export const formatNumber = (number) => {
    return new Intl.NumberFormat('fr-FR').format(number);
};

export const validateForm = (formData) => {
    const errors = {};
    // Ajoutez vos règles de validation ici
    return errors;
}; 