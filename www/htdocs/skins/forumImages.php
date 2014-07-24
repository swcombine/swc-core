<body
	style="background-color: #000000; font-family: Verdana; font-size: 12px; color: #FFFFFF;">

<?php
require_once 'path.php';

$arrImageNames = array('addreply', 'markallread', 'markread', 'newthread', 'newtopic', 'read', 'showall', 'shownew', 'new', 'newclosed', 'newsticky', 'old', 'oldclosed', 'oldsticky');
$arrColours = explode(',', cstr_SKIN_COLOURS);

$intCount = count($arrColours);
for($i = 0; $i < $intCount; $i++) {
    $strDBClean = str_replace(' ', '', $arrColours[$i]);
    $strDBClean = strtolower($strDBClean);

    echo '<strong>'.$arrColours[$i].'</strong><br />';
    $intCountImages = count($arrImageNames);
    for($x=0; $x<$intCountImages; $x++) {
        echo '<img src="'.DARKNESS_IMAGES_PATHWEB.'/skins/'.$strDBClean.'/forum/'.$arrImageNames[$x].'.gif" /> ';
    }

    echo '<br /><br />';
}
?>