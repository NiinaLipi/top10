<?php
// Luodaan region-dropdown menu funktio
function createRegionDropdown(){
    // Luodaan tietokantayhteys
    require_once('inc/db.php'); // Ota db.php-tiedosto käyttöön tässä tiedostossa
    $conn = createDbConnection(); // <- tietokantayhteyden funktio
    // Muodostetaan SQL-lause
    $sql = 'SELECT DISTINCT region FROM aliases;';
    // Ajetaan SQL-lause kantaan
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    // Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
    // Avataan select-elementti
    $html = '<select name="region">';
    // Loopataan vatauksena saadut rivit
    foreach($rows as $row){
        $html .=  '<option>' . $row['region'] . '</option>';
    }
    // Suljetaan select-elementti
    $html .= '</select>';
    // Palautetaan html kutsujalle
    return $html;
};