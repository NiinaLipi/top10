<?php

require_once('inc/db.php');
require_once('inc/utilities.php');

$html = "<h2>Search for TOP 10 best ot worst rated movies by region</h2>";
$html .= '<form action="GET">';
// Region dropdown
$html .= createRegionDropdown();

$path = 'datasearch';
    if ($handle = opendir($path)) {
        while (false !== ($file = readdir($handle))) {
            if ('.' === $file) continue;
            if ('..' === $file) continue;

            $html .= '<div><input type="submit" value="' . basename($file, ".php") . '" formaction="' . $path . "/" . $file . '"></div>';
        }
        closedir($handle);
    }
$html .= '</form>';
echo($html);