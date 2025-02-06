<?php
require_once "config.php";

// Set proper headers for CSV download with current date
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=notes_' . date('Y-m-d') . '.csv');

// Create output stream
$output = fopen('php://output', 'w');

// Add UTF-8 BOM for Excel compatibility
fwrite($output, "\xEF\xBB\xBF");

// Define French headers
$headers = [
    'ID Étudiant',
    'Nom',
    'Prénom',
    'Note',
    'Matière',
    'Semestre'
];

// Write headers
fputcsv($output, $headers, ';');

try {
    // Enhanced SQL query with better joins and ordering
    $sql = "SELECT 
                e.IDEt, 
                e.Nom, 
                e.Prenom, 
                n.Note, 
                m.Matiere, 
                m.Semestre
            FROM 
                etudiant e
            INNER JOIN 
                note n ON e.IDEt = n.IDEt
            INNER JOIN
                matiere m ON n.RefMat = m.RefMat
            ORDER BY 
                e.Nom, 
                e.Prenom, 
                m.Semestre, 
                m.Matiere";

    if ($result = mysqli_query($link, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $csvRow = [
                $row['IDEt'],
                $row['Nom'],
                $row['Prenom'],
                number_format($row['Note'], 2, ',', ''), // Format note with 2 decimals
                $row['Matiere'],
                $row['Semestre']
            ];
            
            // Ensure proper encoding
            array_walk($csvRow, function(&$str) {
                $str = mb_convert_encoding($str, 'UTF-8', 'auto');
            });
            
            fputcsv($output, $csvRow, ';');
        }
        mysqli_free_result($result);
    } else {
        throw new Exception("Erreur lors de l'exécution de la requête : " . mysqli_error($link));
    }
} catch (Exception $e) {
    // Log error
    error_log($e->getMessage());
    
    // Clear output buffer
    ob_clean();
    
    // Send error response
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Une erreur est survenue lors de l\'exportation des notes.'
    ]);
}

// Clean up
mysqli_close($link);
fclose($output);
exit;
?>