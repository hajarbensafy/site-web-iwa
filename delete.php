<?php
require_once "config.php";

if (isset($_GET['IDEt'])) {
    $IDEt = mysqli_real_escape_string($link, $_GET['IDEt']);

    // Vérifier si l'étudiant existe avant de supprimer
    $check = mysqli_query($link, "SELECT * FROM etudiant WHERE IDEt = '$IDEt'");
    if (mysqli_num_rows($check) > 0) {
        $stmt = $link->prepare("DELETE FROM etudiant WHERE IDEt = ?");
        $stmt->bind_param("i", $IDEt);

        if ($stmt->execute()) {
            header("Location: etudiants.php?message=delete_success");
            exit();
        } else {
            echo "Erreur lors de la suppression : " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Étudiant non trouvé.";
    }
}
?>