<?php

require_once('../inc/db.php');

$region = $_GET['region'];
$conn = createDbConnection();

$sql = "CALL GetTop10MovieBeCountry('" . $region . "');";

$prepare = $conn->prepare($sql);
$prepare->execute();

$rows = $prepare->fetchAll();

$html = '<h1>Here are the TOP 10 best rated movies in ' . $region . ' region</h1>';
$html .= '<ul>';

foreach($rows as $row) {
    $html .= '<li>' . $row['primary_title'] . '</li>';
}

$html .= '</ul>';
echo $html;