<body
	style="background-color: #000000; font-family: Verdana; font-size: 12px; color: #FFFFFF;">

<?php
require_once 'path.php';

$arrColours = explode(',', cstr_SKIN_COLOURS);
$intCount = count($arrColours);
for($i = 0; $i < $intCount; $i++) {
    $strDBClean = str_replace(' ', '', $arrColours[$i]);
    $strDBClean = strtolower($strDBClean);

    echo '<strong>'.$arrColours[$i].'</strong><br />';
    echo '<img src="'.DARKNESS_IMAGES_PATHWEB.'/skins/'.$strDBClean.'/top_logo.jpg" />';
    echo '<img src="'.DARKNESS_IMAGES_PATHWEB.'/skins/'.$strDBClean.'/top_bg.gif" />';
    echo '<img src="'.DARKNESS_IMAGES_PATHWEB.'/skins/'.$strDBClean.'/top_planet.jpg" />';

    echo '<br /><br />';
}
?>