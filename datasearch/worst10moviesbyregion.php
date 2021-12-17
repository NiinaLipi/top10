<?php
// Muodosta tietokantayhteys
require_once('../inc/db.php'); // Ota db.php-tiedosto käyttöön tässä tiedostossa
// Lue region get-parametri muuttujaan
$region = $_GET['region'];
$conn = createDbConnection(); // Kutsutaan db.php-tiedostossa olevaa createDbConnection()-funktiota, joka avaa tietokantayhteden
// Muodosta SQL-lause muuttujaan. Käytetään apuna tietokantaan tehtyä proseduuria Tässä vaiheessa tätä ei vielä ajeta kantaan.
$sql = "CALL GetTop10WorstMoviesByCountry('" . $region . "');";
// Tehdään tarkistukset + ajetaan kysely kantaan
$prepare = $conn->prepare($sql);
$prepare->execute();
// Tallenna vastaus muuttujaan
$rows = $prepare->fetchAll();
// Tulostetaan sivun otsikko
$html = '<h1>Here are the TOP 10 worst rated movies in ' . $region . ' region</h1>';
// Avaa ul-elementti
$html .= '<ul>';
// Looppaa tietokannasta saadut rivit läpi
foreach($rows as $row) {
    $html .= '<li>' . $row['primary_title'] . '</li>';
}
// Suljetaan ul-elementti + tulostetaan sivu näkyviin
$html .= '</ul>';
echo $html;