<?php
require_once "config.php";

// Set proper headers for CSV download
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=etudiants_' . date('Y-m-d') . '.csv');

// Create output stream
$output = fopen('php://output', 'w');

// Add UTF-8 BOM for Excel compatibility
fwrite($output, "\xEF\xBB\xBF");

// Define CSV headers with French labels
$headers = [
    'ID Étudiant',
    'Nom',
    'Prénom',
    'Téléphone',
    'Email',
    'Filière'
];

// Write headers
fputcsv($output, $headers, ';');

try {
    // Prepare and execute the query with error handling
    $sql = "SELECT 
                e.IDEt,
                e.Nom,
                e.Prenom,
                e.Tel,
                e.Email,
                f.NomFil
            FROM etudiant e
            LEFT JOIN filiere f ON e.RefFil = f.RefFil
            ORDER BY e.Nom, e.Prenom";
            
    if ($result = mysqli_query($link, $sql)) {
        // Write data rows
        while ($row = mysqli_fetch_assoc($result)) {
            $csvRow = [
                $row['IDEt'],
                $row['Nom'],
                $row['Prenom'],
                $row['Tel'],
                $row['Email'],
                $row['NomFil'] ?? $row['RefFil'] // Use filière name if available, otherwise use RefFil
            ];
            
            // Convert to proper encoding and write to CSV
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
    // Log error (in a production environment, use proper logging)
    error_log($e->getMessage());
    
    // Clear output buffer
    ob_clean();
    
    // Send error response
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Une erreur est survenue lors de l\'exportation des données.'
    ]);
}

// Close database connection
mysqli_close($link);

// Close the output stream
fclose($output);
exit;
?>