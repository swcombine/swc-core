<body
	style="background-color: #000000; font-family: Verdana; font-size: 12px; color: #FFFFFF;">

<?php
require_once 'path.php';

$arrStyle = array('colored', 'solid', 'noblink');
$arrImageNames = array('admin', 'admin_lit', 'combat','combat_lit','faction', 'faction_lit', 'general', 'general_lit', 'gnews', 'gnews_lit', 'inventory', 'inventory_lit', 'join', 'join_lit', 'message', 'message_lit', 'room', 'room_lit', 'snews', 'snews_lit');
$arrColours = explode(',', cstr_SKIN_COLOURS);

$intCount = count($arrColours);
for($i = 0; $i < $intCount; $i++) {
    $strDBClean = str_replace(' ', '', $arrColours[$i]);
    $strDBClean = strtolower($strDBClean);

    echo '<strong>'.$arrColours[$i].'</strong><br />';
    $intCountStyle = count($arrStyle);
    for($y=0; $y<$intCountStyle; $y++){
        echo '<strong>'.$arrStyle[$y].'</strong><br />';
        $intCountImages = count($arrImageNames);
        for($x=0; $x<$intCountImages; $x++) {
             
             
            echo '<img src="'.DARKNESS_IMAGES_PATHWEB.'/skins/'.$strDBClean.'/notifiers/'.$arrStyle[$y].'/main_status_ico_'.$arrImageNames[$x].'.gif" /> ';
        }
        echo '<br />';
    }

    echo '<br /><br />';
}
?>