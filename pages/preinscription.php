<?php
require_once '../config/config.php';
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validation des données
    $nom = sanitize($_POST['nom']);
    $email = sanitize($_POST['email']);
    $telephone = sanitize($_POST['telephone']);
    $niveau = sanitize($_POST['niveau']);
    $formation = sanitize($_POST['formation']);
    $message = sanitize($_POST['message']);

    if (!validateEmail($email)) {
        $error = "Email invalide";
    } else {
        // Envoyer l'email
        $to = "bensafyrajae19@gmail.com";
        $subject = "Nouvelle préinscription - " . $formation;
        $message_body = "Nouvelle préinscription :\n\n";
        $message_body .= "Nom : " . $nom . "\n";
        $message_body .= "Email : " . $email . "\n";
        $message_body .= "Téléphone : " . $telephone . "\n";
        $message_body .= "Niveau : " . $niveau . "\n";
        $message_body .= "Formation : " . $formation . "\n";
        $message_body .= "Message : " . $message;

        mail($to, $subject, $message_body);
        
        // Redirection vers la page de confirmation
        redirect('/pages/merci.php');
    }
}

$page = 'preinscription';
include '../includes/header.php';
?>

<!-- Formulaire de préinscription -->
<div class="container">
    <div class="form-container">
        <h2>Formulaire de préinscription</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST" class="preinscription-form">
            <!-- Champs du formulaire -->
        </form>
    </div>
</div>

<?php include '../includes/footer.php'; ?> 