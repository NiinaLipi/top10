<?php

function createRegionDropdown(){
    require_once('inc/db.php');
    $conn = createDbConnection();

    $sql = 'SELECT DISTINCT region FROM aliases;';

    $prepare = $conn->prepare($sql);
    $prepare->execute();

    $rows = $prepare->fetchAll();

    $html = '<select name="region">';

    foreach($rows as $row){
        $html .=  '<option>' . $row['region'] . '</option>';
    }

    $html .= '</select>';
    return $html;
};