<?php
// Luodaan tietokantayhteys
function createDbConnection(){
    try{
        $dbcon = new PDO('mysql:host=localhost;dbname=imdb', 'root', '');
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        // Error viesti, jos tietokantayhteys epäonnistuu
        echo $e->getMessage();
    }
    return $dbcon;
}
