<?php
require_once "config.php";

$where_conditions = [];
$params = [];
$param_types = "";

if (!empty($_GET['jour'])) {
    $where_conditions[] = "e.jour = ?";
    $params[] = $_GET['jour'];
    $param_types .= "s";
}

if (!empty($_GET['search'])) {
    $where_conditions[] = "(e.nomMat LIKE ? OR ens.Nom LIKE ? OR ens.Prenom LIKE ?)";
    $params[] = "%" . $_GET['search'] . "%";
    $params[] = "%" . $_GET['search'] . "%";
    $params[] = "%" . $_GET['search'] . "%";
    $param_types .= "sss";
}

$sql = "SELECT e.jour, e.heure_debut, e.heure_fin, e.nomMat, 
               CONCAT(ens.Nom, ' ', ens.Prenom) as enseignant
        FROM emplois_du_temps e
        LEFT JOIN enseignant ens ON e.RefEn = ens.RefEn";

if (!empty($where_conditions)) {
    $sql .= " WHERE " . implode(" AND ", $where_conditions);
}

$sql .= " ORDER BY FIELD(jour, 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'), heure_debut";

if ($stmt = mysqli_prepare($link, $sql)) {
    if (!empty($params)) {
        mysqli_stmt_bind_param($stmt, $param_types, ...$params);
    }
    
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        
        if (mysqli_num_rows($result) > 0) {
            $currentDay = '';
            while ($row = mysqli_fetch_array($result)) {
                $dayClass = $currentDay !== $row['jour'] ? 'border-t border-green-100' : '';
                $currentDay = $row['jour'];
                
                echo '<tr class="hover:bg-green-50/50 transition-colors animate-fade-in ' . $dayClass . '">';
                echo '<td class="px-6 py-4 whitespace-nowrap">';
                echo '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-gradient-to-r from-green-100 to-emerald-100 text-green-800">' . 
                     htmlspecialchars($row['jour']) . '</span>';
                echo '</td>';
                echo '<td class="px-6 py-4 text-sm font-medium text-gray-900">' . 
                     htmlspecialchars($row['nomMat']) . 
                     '<div class="text-xs text-green-600 mt-1">' . 
                     htmlspecialchars($row['enseignant']) . '</div></td>';
                echo '<td class="px-6 py-4 text-sm text-green-700">' . htmlspecialchars($row['heure_debut']) . '</td>';
                echo '<td class="px-6 py-4 text-sm text-green-700">' . htmlspecialchars($row['heure_fin']) . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="4" class="px-6 py-4 text-sm text-green-600 text-center bg-green-50">Aucun emploi du temps trouvé.</td></tr>';
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($link);
?>