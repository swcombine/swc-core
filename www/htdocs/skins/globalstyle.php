<?php
require_once 'path.php';
MasterTemplate::setup('CSS File', false);
MasterTemplate::minimal();
MasterTemplate::notHtml('text/css');
MasterTemplate::allowBrowserCache(24 * 60 * 60);

//Get the current skin
$skins = explode(',', cstr_SKIN_COLOURS_CLEAN);
$skin = param('skin', cstr_DEFAULT_SKIN_COLOUR);
if(!in_array($skin, $skins)){
    $skin = cstr_DEFAULT_SKIN_COLOUR;
}

function cssGenerateBorders($colour){
    //Will echo out either bevels or no bevels Border CSS
    if($_GET['bevel'] == '1'): ?>
        border-top: 1px solid <?php echo $colour?>;
        border-right: 2px solid #000000;
        border-bottom: 2px solid #000000;
        border-left: 1px solid <?php echo $colour?>;
    <?php else: ?>
        border: 1px solid <?php echo $colour?>;
    <?php endif;
}

function cssGenerateSize($size) {
    $size += 1;

    //echos out the size with regards to Large Fonts
    if(isset($_GET['bigtext']) && $_GET['bigtext'] == 1){
        $size += 1;
    }
    return $size;
}

$fonts = array(0 => 'Lucida Grande, Lucida Sans, Lucida Sans Unicode, Verdana, sans-serif',
               1 => 'Verdana, Arial, Helvetica, sans-serif');
$fontStyle = intparam('fontStyle', 1, array_keys($fonts));
$font = $fonts[$fontStyle];
?>

/* Generalisations */
a:link,a:active,a:visited,.link { text-decoration: none; color: <?php echo $css['afont1']?>; cursor: pointer; }
a:hover,.link:hover {  text-decoration: none; color: <?php echo $css['afont2']?>; cursor: pointer; }
a img { border: 0px solid black; }

html, body {
    background-color: <?php echo $css['background1']?>;
    padding: 0px;
    margin: 0px;

    font-family: <?php echo $font; ?>;
    line-height: 1.3;
    font-size: <?php echo cssGenerateSize(11);?>px;
    color: <?php echo $css['afont1'];?>;

    height: 100%;
}

input
{
    border: 1px solid <?php echo $css['border2']?>;
    background: <?php echo $css['background8']?>;

    color: <?php echo $css['afont2']?>;
    font-size: <?php echo cssGenerateSize(11);?>px;
    font-family: <?php echo $font; ?>;
}

textfield
{
    border: 1px solid <?php echo $css['border2']?>;
    background: <?php echo $css['background8']?>;

    color: <?php echo $css['afont2']?>;
    font-size: <?php echo cssGenerateSize(11);?>px;
    font-family: <?php echo $font; ?>;
}

textarea
{
    border: 1px solid <?php echo $css['border2']?>;
    background: <?php echo $css['background8']?>;

    color: <?php echo $css['afont2']?>;
    font-size: <?php echo cssGenerateSize(11);?>px;
    font-family: <?php echo $font; ?>;
}

select
{
    border: 1px solid <?php echo $css['border2']?>;
    background: <?php echo $css['background8']?>;

    color: <?php echo $css['afont2']?>;
    font-size: <?php echo cssGenerateSize(11);?>px;
    font-family: <?php echo $font; ?>;
}

radio
{
    background: #000000;
    border: 1px solid #000000;
}

label {
    cursor: pointer;
}

/* Allows pre monospacing with decent line breaks */
pre {
    white-space: pre-wrap;
}

/* Fixes up inconsistencies between browsers caused by other CSS in here */
h1 { font-size: 22px; }
h2 { font-size: 17px; }
h3 { font-size: 13px; }
h4 { font-size: 11px; }
h5 { font-size: 9px; }
h6 { font-size: 7px; }


/* Header Stuff */

.header_spacer
{
    width: 772px;
    height:1px;
}

.header_spacer_minwidth
{
    min-width: 772px;
}

/* Up the Very top */
div.header_topmenu
{
    width: 100%;
    position: relative;
    height: 18px;
    background-image:url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin?>/menus/topmenu_bg.jpg);
    background-position: top;
    background-repeat: repeat;
}
div.header_topmenu ul
{
    list-style: none;
    padding: 0px;
    margin: 0px;
    height: 18px;
    top: 0px;
    float: right;
    position: relative;
}
div.header_topmenu ul li
{
    position: relative;
    width: 75px;
    height: 18px;
    border-left: 2px solid <?php echo $css['border1']?>;
    float: left;
    text-align:center;
    padding-top: 0px;
}

/* Fix for IE: Must have :link:active:visited etc */
div.header_topmenu ul li a:link,div.header_topmenu ul li a:active,div.header_topmenu ul li a:visited
{
    font-family: <?php echo $font; ?>;
    color: <?php echo $css['topbarfont1']?>;
    /*font-variant: small-caps;*/
    position: relative;
    bottom: 1px;
}
div.header_topmenu ul li a:hover
{
    font-family: <?php echo $font; ?>;
    color: <?php echo $css['topbarfont2']?>;
    /*font-variant: small-caps;*/
}

/* With the Nice Images of Planets */
div.header_header
{
    height: 99px;
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin?>/top_bg.gif);
    background-repeat: repeat;
}
div.header_header div#headerleft
{
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin?>/top_logo.jpg);
    float: left;
    width: 282px;
    height: 99px;
}
div.header_header div#headerright
{
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin?>/top_planet.jpg);
    float: left;
    width: 490px;
    height: 99px;
    float: right;
}


/* Below the Header Images, the Bar that holds Events, Clock, logout.. etc */
div.header_alertcontainer
{
    overflow: hidden;
    width: 100%;
    background-color:<?php echo $css['background2']?>;
    padding: 0px;
    margin: 0px;
    position:relative;
    border-top: 1px solid <?php echo $css['border2']?>;
    border-bottom: 1px solid <?php echo $css['border2']?>;
    max-height: 67px;
}

div.header_alertbarevents /* Centre Section of Alert Bar */
{
    padding: 2px;
    height: 100%;
    
}

div.header_alertbarevents img{ /* Event Icons */
    border-left: 2px solid <?php echo $css['background8']?>;
    border-right: 2px solid <?php echo $css['background8']?>;
}

div.header_alertbarevents #headerrightbookend{
    border-left: 0px none <?php echo $css['background8']?>;
    border-right: 0px none <?php echo $css['background8']?>;
}

div.header_alertbarevents div table tr td{
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin?>/main_status_rightgrad.gif);
    background-position: 0px 1px;
    background-repeat: no-repeat;
    padding: 0px 0px 0px 20px;
    height: 21px;
}

div.header_alertbarcounter /* Left Section of Alert Bar */
{
    width: 285px;
    height: 100%;
    background-color: <?php echo $css['background2']?>;
    float: left;
}

div.header_alertbarcounter #clock{float: right; width: 160px; height: 28px; border-right: 1px solid <?php echo $css['border2']?>}
div.header_alertbarcounter #counter{font-family: <?php echo $font; ?>; font-size: 9px; color: <?php echo $css['alertfont2']?>; float: right; text-align:left; width: 120px; padding: 2px 3px 3px 0px; margin: 0px 0px 0px 0px; }

/* Clock: 1/ Used for Displaying 'Day','Year','Time' Headers 2/ Used for displaying the DYT Values 3/ Left of the Clock 4/ Right of the Clock */
.header_clock1{font-size: 9px;	color: <?php echo $css['alertfont1']?>;	background-color: <?php echo $css['background3']?>; padding: 0px;}
.header_clock2{font-size: 9px;	color: <?php echo $css['alertfont2']?>;	background-color: <?php echo $css['background3']?>;	padding: 0px;}
.header_clock3{background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin?>/main_status_rightgrad.gif); width: 15px; height: 20px; background-position: right; background-repeat:repeat-y; padding: 3px 0px 0px 0px; }
.header_clock4{background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin?>/main_status_leftgrad.gif); width: 15px; height: 20px; background-position: left; background-repeat:repeat-y;}

div.header_alertbarlogout /* Right Section of Alert Bar */
{
    width: 167px;
    height: inherit;
    max-height: none;
    background-color: <?php echo $css['background2']?>;
    float: right;
    border-left: 1px solid <?php echo $css['border2']?>;
    
}
div.header_alertbarlogout #alertbartable{ padding:0px;	margin:0px;	}
div.header_alertbarlogout #alertbarloggedin{ font-size: 9px; width: 132px;	color: <?php echo $css['alertfont1']?>; background-color: <?php echo $css['background4']?>; padding: 0px;}
div.header_alertbarlogout #alertbarhandle{ word-wrap: break-word; width: 132px; max-width: 132px;  font-size: 9px;	color: <?php echo $css['alertfont2']?>; background-color: <?php echo $css['background5']?>; padding: 0px;}


/* End Header Stuff */
/* Start Generic Font Stuff... */

.title
{
    font-size: <?php echo cssGenerateSize(12);?>px;
    color: <?php echo $css['alertfont1']?>;
    font-weight: bold;
    text-decoration: underline;
}

.small
{
       font-size: <?php echo cssGenerateSize(10);?>px;
}

.clickable {
    cursor: pointer;
}

/* Old School Replacements */

.tableborder
{
    font-size: <?php echo cssGenerateSize(11);?>px;
    color: <?php echo $css['afont1']?>;
}
.tablecell
{
    <?php cssGenerateBorders($css['border2']); ?>

    font-size: <?php echo cssGenerateSize(11);?>px;
    background: <?php echo $css['background2']?>;
    color: <?php echo $css['afont1']?>;
}
.tableSection {
    font-weight: bold;
}

.tableSectionHeader {
    font-weight: bold;
    color: #FFFFFF;
}
tr.tablecell td
{
    <?php cssGenerateBorders($css['border2']); ?>

    font-size: <?php echo cssGenerateSize(11);?>px;
    color: <?php echo $css['afont1']?>;
}
.tableheader
{
    <?php cssGenerateBorders($css['border2']); ?>

    font-size: <?php echo cssGenerateSize(11);?>px;
    background: <?php echo $css['background7']?>;
    color: <?php echo $css['alertfont1']?>;
}

tr.tableheader td
{
    <?php cssGenerateBorders($css['background3']); ?>
}

.pagetitle
{
    font-size: <?php echo cssGenerateSize(13);?>px;
    color: <?php echo $css['alertfont1']?>;
}

.tablehighlight
{
    <?php cssGenerateBorders($css['border2']); ?>

    font-size: <?php echo cssGenerateSize(11);?>px;
    background: <?php echo $css['background1']?>;
    color: <?php echo $css['alertfont1']?>;
}
tr.tablehighlight td
{
    <?php cssGenerateBorders($css['background1']); ?>

    font-size: <?php echo cssGenerateSize(11);?>px;
    color: <?php echo $css['alertfont1']?>;
}

.lowlight
{
    color: <?php echo $css['afont2']?>;
}

/* Forum Stuff */
.forumPost a:link, .forumPost a:active, .forumPost a:visited {
    text-decoration: underline; cursor: pointer;
}

.forumSelected
{
    font-weight: bold;
    color: #FFFF00;
    text-decoration: none
}
.threadName
{
    font-weight: bold;
    font-size: <?php echo cssGenerateSize(12);?>px;
    color: <?php echo $css['alertfont1']?>;
}
.threadDescription
{
    font-size: <?php echo cssGenerateSize(10);?>px;
    color: <?php echo $css['afont1']?>;
}
.forumName
{
    font-weight: bold;
    font-size: <?php echo cssGenerateSize(12);?>px;
    color: <?php echo $css['alertfont1']?>;
}
.forumDescription
{
    font-size: <?php echo cssGenerateSize(10);?>px;
    color: <?php echo $css['afont1']?>;
}
.warning {
    font-weight:bold;
    font-size: <?php echo cssGenerateSize(11);?>px;
    color: #FF0000;
}

/* Old Menu Stuff [Check still used?] */
.lateralmenu
{
    <?php cssGenerateBorders($css['border2']); ?>
    background: <?php echo $css['background2']?>;

    font-weight: bold;
    color: <?php echo $css['alertfont1']?>;
}
.menuheader
{
    <?php cssGenerateBorders($css['border2']); ?>

    font-size: <?php echo cssGenerateSize(11);?>px;
    background: <?php echo $css['background7']?>;
    color: <?php echo $css['alertfont1']?>;
}
.menucell
{
    <?php cssGenerateBorders($css['border2']); ?>

    font-size: <?php echo cssGenerateSize(11);?>px;
    background: <?php echo $css['background2']?>;
    color: <?php echo $css['afont1']?>;
}

.highlight {
    font-size: <?php echo cssGenerateSize(11);?>px;
    background: transparent;
    color: <?php echo $css['afont1']?>;
}
.highlightHover {
    cursor: default;
    font-size: <?php echo cssGenerateSize(11);?>px;
    background: <?php echo $css['background6']?>;
    color: <?php echo $css['hfont1']?>;
}
.highlightHoverDark {
    cursor: default;
    font-size: <?php echo cssGenerateSize(11);?>px;
    background: <?php echo $css['background7']?>;
}

/* Stuff merged from menu.php */
div.rightmenuheader {
    padding-bottom: 10px;
}
.rightmenuheader .header{
    width: 100%;
    padding-top: 30px;
    text-align:center;
    position:relative;
    border: 1px;
    background-repeat:repeat;
    font-weight: bold;
    font-size: <?php echo cssGenerateSize(13);?>px;
    color: #ffffff;
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin?>/menus/bg_menuTopic.gif);
}
.rightmenuheader .header span{
    position:absolute;
    left:30px;
    top: 20%;
}
.rightmenuitem
{
    width: 100%;
    margin: 0px -2px 0px 0px;
    height: 18px;
    text-align: left;
    position:relative;
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin?>/menus/bg_menuItem.gif);
    background-repeat:repeat;
    vertical-align:middle;
    font-size: <?php echo cssGenerateSize(10);?>px;
}


/* CSS for Sim News */
.simnews_body a {
    text-decoration: underline;
}

.simnews_header {
    position: relative;
    height: 30px;
    width: 100%;

    background-repeat:repeat;
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin?>/menus/bg_menuTopic.gif);

    margin-top: 1px;
}

.simnews_header .simnews_title {
    float: left;
    text-indent: 20px;
    padding-top: 5px;

    background-repeat: no-repeat;
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin?>/menus/bg_menuTopic_start.png);

    color: #ffffff;
    font-size: 10pt;
    font-weight: bold;
    letter-spacing: 0.05em;
    text-align: left;
}

.simnews_header .simnews_subtitle {
    float: right;
    margin-top: 8px;
    margin-right: 10px;

    color: #cccccc;
    font-size: 8pt;
    text-align: right;
    letter-spacing: 0.1em;
}

.menutablel
{
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin?>/menus/bg_menuItem_low.gif);
    font-size:  <?php echo cssGenerateSize(10);?>px;
    color: #ffffff;
}

.menutabler
{
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin?>/menus/bg_menuItem_lower.gif);
    font-size: <?php echo cssGenerateSize(10);?>px;
    color: #ffffff;
}

.InvBackground {
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin?>/menus/bg_menuItem_low.gif);
    background-repeat: repeat-x;
}

/* Light Menu Stuff */
ul.menu{
    padding: 0px;
    margin: 0px;
    list-style: none;
}

ul.menu li{
    height: 18px;
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin?>/menus/bg_menuItem.gif);
    border-bottom: 1px solid #042807;
    position:relative;
}

ul.menu li span,ul.menu li a{
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin?>/menus/bullet_menuItem.gif);
    background-repeat: no-repeat;
    background-position: -2px -1px;
    padding: 0px 0px 0px 9px;
    position:relative;
    left: 6px;
    top:3px;
    font-size:<?php echo cssGenerateSize(10);?>px;
}
ul.menu li ul{
    position:absolute;
    right: 100%;
    width: 100%;
    top:0px;

    display: none;

    padding: 0px 0px 0px 0px;
    margin: 0px 0px 0px 0px;

    list-style: none;
    border-right:1px solid <?php echo $css['menu1']?>;
    border-left:1px solid <?php echo $css['menu1']?>;
    border-bottom:1px solid <?php echo $css['menu1']?>;
    z-index:5000;
}

ul.menu li ul li{
    padding: 0px;
    margin: 0px;
    width: 100%;
    z-index:5000;
}

ul.menu li ul li a, ul.menu li ul li span{
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin?>/menus/bullet_menuItem.gif);
    background-repeat: no-repeat;
    background-position: -2px -1px;
    padding: 0px 0px 0px 9px;
    position:relative;
    left: 6px;
    top:3px;
    font-size:<?php echo cssGenerateSize(10);?>px;
    z-index:5000;
}

ul.menu li:hover ul, ul.menu li.over ul{
    display: block;
    cursor: pointer;
    z-index:5000;
}

/* Dark Stuff */
ul.menudark{
    padding: 0px;
    margin: 0px;
    list-style: none;
}

ul.menudark li{
    height: 18px;
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin?>/menus/bg_menuItem_low.gif);
    border-bottom: 1px solid #042807;
    position:relative;
}

ul.menudark li span,ul.menudark li a{
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin?>/menus/bullet_menuItem.gif);
    background-repeat: no-repeat;
    background-position: -2px -1px;
    padding: 0px 0px 0px 9px;
    position:relative;
    left: 6px;
    top:3px;
    font-size: <?php echo cssGenerateSize(10);?>px;
}
ul.menudark li ul{
    padding: 0px;
    margin: 0px;
    width: 100%;
    z-index:5000;
}

ul.menudark li:hover ul, ul.menudark li.over ul{
    display: block;
    cursor: pointer;
    z-index:5000;
}


/* Forum specific CSS */

/* Sourced from defusion.org.uk, slightly modified to suit our needs. All credit and whatnot is entirely theirs */

blockquote {
    margin: 1em 0;
    padding: 0;
    position: relative;
    text-indent: 2em;
    padding-top: 10px;
    padding-bottom: 10px;
    border-top: 1px solid #FFFFFF;
    border-bottom: 1px solid #FFFFFF;
    margin-left: 25px;
    margin-right: 25px;
}

.bqstart, .bqend { font-size: 300%; }

/* apply IE specific rules first */
.bqstart {
    text-indent: 0;
    margin: -0.6em 0 -2em 0;
    float: left;
    position: relative; /* relative positioning to stop from disappearing in IE when the blockquote has a background color - probably peek-a-boo or something */
}

blockquote > .bqstart {
    /* add extra non-ie rules */
    position: absolute;
    top: -0.2em;
    left: 0;
    /* remove IE specific rules */
    float: none;
    margin: 0;
    padding-top: 10px;
}

.bqend {
    position: absolute;
    margin-top: -0.6em;
    right: 0;
    text-indent: 0;
    margin-right: 25px;
}

blockquote > .bqend {
    margin-top: -0.2em;
}

.quotePerson {
    font-size: smaller;
    font-weight: bold;
    margin: 15px!important;
    padding: 0;
}

/* MISC */
.border1 {
    border: 1px solid <?php echo $css['border1']?>;
}

.border2 {
    border: 1px solid <?php echo $css['border2']?>;
}

.border3 {
    border: 1px solid <?php echo $css['border3']; ?>;
}

font.border3
{
    font-weight: bold;
    color: <?php echo $css['border3']; ?>;
    border: 0px ;
}

.background {
    background-color: <?php echo $css['background8']?>;
}
.background-body {
    background-color: <?php echo $css['background1'];?>;
}
.background-alert {
    background-color: <?php echo $css['background2'];?>;
}
.background-clock {
    background-color: <?php echo $css['background3'];?>;
}
.background-logout {
    background-color: <?php echo $css['background4'];?>;
}
.background-logout-dark {
    background-color: <?php echo $css['background5'];?>;
}
.background-hover {
    background-color: <?php echo $css['background6'];?>;
}
.background-menu {
    background-color: <?php echo $css['background7'];?>;
}
.background-menu-dark {
    background-color: <?php echo $css['background8'];?>;
}
.background-highlight {
    background-color: <?php echo $css['tocbackground'];?>;
}

/* Inline Inventory Editing */
.inlineEditing, .textInlineEdit {
    cursor: pointer;
}

/* RULES STYLES */
/* Rules Menu */
.rulesMenu_category {
    font-size: 16px;
    color: #FFFFFF;
    font-weight: bold;
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin; ?>/menus/bg_menuItem_low.gif);
}

.rulesMenu_section {
    font-size: 10px;
    color: <?php echo $css['afontrulesmenu']; ?>;
    font-weight: bold;
}

.rulesMenu_subPagesEdge {
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/skins/<?php echo $skin; ?>/menus/main_submenu_left.gif);
    background-position: top right;
    background-repeat: no-repeat;
}

.rulesMenu_active {
    color: <?php echo $css['afontrulesmenuactive']; ?>;
}

.rulesMenu_page {
    font-size: 10px;
    color: <?php echo $css['afontrulesmenu']; ?>;
    font-weight: bold;
    padding-left: 20px;
}

a.rules_link {
    text-decoration: underline;
}


/* The Levels (ie: 1/, 1.1/ etc) */
.rules_sectionHeader {
    font-weight: bold;
    font-size: 14px;
    text-decoration: underline;
    color: #FFFFFF;
    margin-bottom: 5px;
}

.rules_level1Header {
    font-size: 11px;
    font-weight: bold;
    color: #FFFFFF;
    padding-top: 20px;
    padding-bottom: 20px;
    padding-left: 10px;
}

.rules_level1 {
    padding-bottom: 20px;
    padding-left: 20px;
}

.rules_level2Header {
    color: #FFFFFF;
    font-size: 10px;
    font-weight: bold;
    padding-bottom: 15px;
    padding-left: 30px;
}

.rules_level2 {
    padding-bottom: 20px;
    padding-left: 40px;
}

.rules_level3Header {
    color: #FFFFFF;
    font-size: 10px;
    font-weight: bold;
    text-decoration: underline;
    padding-bottom: 5px;
    padding-left: 50px;
}

.rules_level3 {
    padding-bottom: 20px;
    padding-left: 60px;
}

.rules_level4Header {
    color: #FFFFFF;
    font-size: 10px;
    font-weight: bold;
    text-decoration: underline;
    padding-bottom: 5px;
    padding-left: 70px;
}

.rules_level4 {
    padding-bottom: 20px;
    padding-left: 80px;
}


.rules_tooltip {
    cursor: pointer;
    margin-bottom: 0px;
    text-decoration: underline;
}



/* Table of Contents */
.rules_toc_box {
    width: 300px;
    border: 1px solid <?php echo $css['tocborder']; ?>;
    background-color: <?php echo $css['tocbackground']; ?>;
    padding: 4px;
    margin-left: 5px;
    margin-right: 10px;
}

.rules_toc {
    margin-left: -20px;
}

.rules_toc, .rules_toc li ul {
    list-style-type: none;
}

li.rules_toc_item {
    padding-top: 5px;
}

.rules_toc_list {
    padding-bottom: 5px;
}



/* Fancy Boxes */
<?php
require_once 'server21/classes/rulesClass.inc';
$intCount = count($arrFunkyBoxes);
for($i = 0; $i < $intCount; $i++):
    $arrBox = $arrFunkyBoxes[$i];
    ?>

.rules_box_<?php echo $arrBox['strName']?> {
    position: relative;
    margin: 10px 20px 10px 20px;
    color: #FFFFFF;
    text-align: left;
    padding: 7px 0px 10px 15px;
    display: table-cell;
}

.rules_box_<?php echo $arrBox['strName']?>_style {
    border: 1px solid #<?php echo $arrBox['strColour']?>;
    background: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/semitrans/<?php echo $arrBox['strBackgroundColour']?>_50.png);

    display: block;
    padding: 5px 10px 5px 10px;
    margin-top: 5px;
}

<?php endfor; ?>

/* CSS for checklists */
.checklist {
    list-style: none;
    overflow: auto;
    cursor: pointer;
}
.checklist, .checklist li { margin-left: 0px; margin-top: 1px; margin-bottom: 1px; padding: 0px; }
.checklist :hover { background: #777777; color: #ffffff; }


/* Checklist 3 */
.cl {
    color: #a05a04;
}
.cl .alt { background: #f8f6ed; }
.cl label { padding: 0.2em 0.2em 0.2em 25px; }
.cl label:hover, .cl label.hover { background: #EFE9D4; color: #a05a04; }


/* Inventory Menu */
#listinventory-personal, #listinventory-faction {
    padding: 2px 1px 1px 1px;
    margin: 0px -2px 0px 0px;
}
#listinventory-personal .menucell, #listinventory-faction .menucell {
    position: relative;
    padding: 1px 1px 1px 1px;
}
#listinventory-personal .menucell a, #listinventory-faction .menucell a {
    border: 1px none #FFFFFF;
}
#listinventory-personal .menucell a img, #listinventory-faction .menucell a img {
    width: 30px;
    height: 30px;
    border: 1px none #FFFFFF;
}
#listinventory-personal .menucell .InvMenuAmount, #listinventory-faction .menucell .InvMenuAmount {
    position: absolute;
    top: 17px;
    left: 31px;
    width: 77%;
}
#listinventory-personal .menucell .InvMenuLink, #listinventory-faction .menucell .InvMenuLink {
    position: absolute;
    top: 2px;
    left: 31px;
    width: 77%;
}

/* CSS for the Menu Swapper */
.menuswapper {
    padding: 0px;
    margin: 0px;
    font: 9px white;
    list-style-type: none;
    text-align: center;
    border: 0px;
}

.menuswapper li {
    display: inline;
    margin: 0px;
    background: none;
    border: 0px;
}

.menuswapper li a {
    text-decoration: none;
    padding: 0px;
    margin-right: 3px;
    background: none;
    border: 0px;
}

.menucontentarea {
    border: 0px;
    width: 150px;
    margin: 0px;
    padding: 0px;
}


/* Auto-completer CSS */
ul.ui-autocomplete {
  position:absolute;
  width:150px;
  background-color: #CCCCCC;
  border:1px solid #888;
  margin:0px;
  padding:0px;
  color: <?php echo $css['afont2']; ?>;
  list-style-type:none;
}

ul.ui-autocomplete li.ui-menu-item a.ui-state-hover {
    background-color: <?php echo $css['background6']; ?>;
    display:block;
}

ul.ui-autocomplete li.ui-menu-item a {
  	display:block;
  	padding:2px;
  	padding-bottom: 4px;
}

ul.ui-autocomplete li {
  list-style-type:none;
  display:block;
  margin:0;
  cursor:pointer;
  background-color: <?php echo $css['background7']; ?>;
}

/* Button Styles */
input.chunky_button {
    padding: 3px;
}

/* Horizontal Colour Bar Styles */
div.bar_cont {
    background-color: #111111;
    position: relative;
    overflow: hidden;
    border: 1px solid #333333;
}

div.bar_bg {
    position: absolute;
    top: 0px;
    left: 0px;
}

div.bar_fg {
    position: absolute;
    left: 0px;
    text-align: center;
    width: 100%;
    color: #FFFFFF;
    font-family: "Courier New";
    cursor: default;
}

.hidden {
    display: none;
}

/* Flash messages for position2 */
div.flash-msg {
    width: 80%;
    color: #C2C2A4;
    border: 1px solid;
    margin: 10px auto;
    padding: 5px 5px 5px 5px;
    font-size: 110%;
}
div.flash-msg img {
    float: right;
    cursor: pointer;
}
div.flash-green {
    color: #4F8A10;
    border-color: #4F8A10;
    background-color: #DFF2BF;
}
div.flash-green a {
    color: #4F8A10;
    text-decoration: underline;
    font-weight: bold;
}
div.flash-blue {
    color: #00529B;
    border-color: #00529B;
    background-color: #BDE5F8;
}
div.flash-blue a {
    color: #00529B;
    text-decoration: underline;
    font-weight: bold;
}
div.flash-red {
    color: #D8000C;
    border-color: #D8000C;
    background-color: #FFBABA;
}
div.flash-red a {
    color: #D8000C;
    text-decoration: underline;
    font-weight: bold;
}

/* Room Maps */
.roommap {
    background-color: black;
    position: relative;
    left: 0px;
    top: 0px;
}
.room {
    position: absolute;
    height: 50px;
    width: 50px;
}
.roommain {
    position: absolute;
    top: 2px;
    left: 2px;
    width: 46px;
    height: 46px;
}
.roomimg {
    position: absolute;
    top: 2px;
    left: 2px;
    width: 46px;
    height: 46px;
}
.roomoverlay {
    position: absolute;
    top: 2px;
    left: 2px;
    width: 46px;
    height: 46px;
    z-index: 400;
    background-color: #2385f4;
    opacity:0.4;
    filter: alpha(opacity=40);
}
.roomoverlayup {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 12px;
    height: 12px;
    z-index: 400;
    background-color: #2385f4;
    opacity:0.4;
    filter: alpha(opacity=40);
}
.roomoverlaydown {
    position: absolute;
    bottom: 0px;
    right: 0px;
    width: 12px;
    height: 12px;
    z-index: 400;
    background-color: #2385f4;
    opacity:0.4;
    filter: alpha(opacity=40);
}

/* HP Status colours */
.hp_status {
    font-weight: bold;
}
.hp_dead {
    color: #FFFFFF;
}
.hp_unconscious {
    color: #C0C0C0;
}
.hp_unharmed {
    color: #33FF00;
}
.hp_slightly_wounded {
    color: #CCFF00;
}
.hp_wounded {
    color: #FF9900;
}
.hp_badly_wounded {
    color: #FF0000;
}

/* Cockpit */
/* Is the row at the very top of the cockpit, which contains the location, etc and entity */
.cockpitTop {
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/client/cockpit/top-bg.png);
    width: 100%;
    height: 104px;
    padding: 0px 0px 0px 0px;
    margin: 0px 0px 0px 0px;
}

.cockpitTop .cockpitRow .cockpitContent {
    padding-top: 10px;
}

/* Is the map on the left in the middle */
.cockpitLeftMap {
    position: relative;
    background-color: black;
}

/* Is the row to the middle which contains the hull, shields, etc status */
.cockpitMiddleStatus {

}

.cockpitMiddleStatusLeft {
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/client/cockpit/middle-side.png);
    background-repeat: repeat-y;
    background-position: top left;
}

.cockpitMiddleStatusCenter {
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/client/cockpit/middle-top-center.png);
    background-repeat: repeat-x;
    background-position: top;
}

.cockpitMiddleStatusRight {
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/client/cockpit/middle-side.png);
    background-repeat: repeat-y;
    background-position: top right;
}

.cockpitMiddleStatusBottom {
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/client/cockpit/middle-bottom-center.png);
}

/* Progress bars, as displayed in the cockpit */
.cockpitBar {
    height: 18px;
    width: 85%;
    position: relative;
    overflow: hidden;
}

.cockpitBar .cockpitBarInner {
    position: absolute;
    top: 0px;
    left: 0px;
    height: 18px;
}

.cockpitBar .cockpitBarText {
    position: absolute;
    top: 2.5px;
    left: 0px;
    text-align: center;
    width: 100%;
    color: #FFFFFF;
    font: 'Courier New';
    font-size: 10px;
    height: 18px;
    cursor: default;
}

/* The Action bar that sits ontop of and below the cockpit iframe */
.cockpitActionBar {
    background-image: url(<?php echo DARKNESS_IMAGES_PATHWEB; ?>/client/cockpit/actions-middle.png);
    width: 100%;
}

.cockpitActionBar tr td form {

}

.cockpitActionBar tr td form input {
    top: -10px;
}

/* Equipment and Party Screens */
.selected_box {
    border: 1px solid blue;
}
.drop_ground {
    width: 330px;
    height: 55px;
    display: block;
    margin: 3px;
}
.drop_ground div {
    height: 50px;
    width: 50px;
    float: left;
    margin-top: 2px;
    margin-left: 20px;
}
.item_box_wrap {
	display: inline-block;
	vertical-align: top;
}
.item_box {
    width: 330px;
    min-height: 100px;
    display: inline-block;
    margin: 1px;
	padding-bottom: 5px;
	margin-bottom: 5px;
}
.item_box .check_wrap {
	height: 55px;
	width: 20px;
	text-align: center;
	line-height: 55px;
	float: left;
	padding: 0px;
}
.item_box .image_wrap {
	height: 55px;
	width: 50px;
	padding: 0px;
	padding-top: 5px;
	margin: 0px;
	float: left;
}
.item_box .desc_wrap {
	margin-left: 75px;
	padding: 0px;
	padding-top: 5px;
	padding-bottom: 5px;
	min-height: 50px;
}
.item_box .action_wrap {
	margin-left: 75px;
}

.partyable_box {
    width: 310px;
    min-height: 65px;
    position: relative;
    display: inline-block;
}

.recycleable_box {
    width: 350px;
    height: 70px;
    position: relative;
    display: inline-block;
}

.partybox {
    clear: both;
    float: right;
    border: 1px solid #333333;
    width: 312px;
    margin-bottom: 5px;
}
.medicaltargetbox {
    width: 410px;
    height: 110px;
    position: relative;
    display: inline-block;
}
.halfavatar_subimage {
    width: 15px;
    height: 15px;
    position: absolute;
    bottom: 0px;
    right: 0px;
    opacity: 0.6;
    cursor: pointer;
}

/* NPC Fitouts */
.fitoutbox {
    width: 175px;
    height: 250px;
    display: inline-block;
    margin-right: 5px;
    margin-bottom: 5px;
}
#npcfitout .assigned_item_type:hover {
    text-decoration: underline;
    cursor: pointer;
}

/* Menus */
.horizontal-menu {
    padding: 5px 5px 5px 5px;
    margin-bottom: 5px;
    text-align: center;
}

/* "Pretty" buttons */
input[type=submit], input[type=reset], input[type=button] {
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    border: medium none;

    display: inline-block;
    color: #FFFFFF !important;
    font-family: <?php $font; ?>;
    font-weight: bold;
    letter-spacing: 1px;
    cursor: pointer;
    margin: 2px;

    -moz-box-shadow: 0 1px 3px rgba(200,200,200,0.5);
    -webkit-box-shadow: 0 1px 3px rgba(200,200,200,0.5);
    text-shadow: 0 -1px 1px rgba(200,200,200,0.25);
    border-bottom: 1px solid rgba(0,0,0,0.25);

    font-size: 11px;
    padding: 2px 11px;
}

/* Bite me, Internet Explorer */
input[type=submit]:hover, input[type=reset]:hover, input[type=button]:hover {
    background: <?php echo $css['background7']?>;
    -moz-box-shadow: 0 1px 3px rgba(200,200,200,0.75);
    -webkit-box-shadow: 0 1px 3px rgba(200,200,200,0.75);
}

/* New Tiger Stripe Table Style */
table.tiger_stripes {
    font-size: <?php echo cssGenerateSize(11);?>px;
    color: <?php echo $css['afont1']?>;
}

table.tiger_stripes tr.tiger_stripes_header,
td.tiger_stripes div.tiger_stripes_header,
ul.tiger_stripes li.tiger_stripes_header, {
    background-color: <?php echo $css['background1']?>;
    color: red !important;
}

table.tiger_stripes th {
    font-weight: bold;
    text-align: center;
    padding: 5px;
}

table.tiger_stripes th a {
    text-decoration: underline;
}

table.tiger_stripes td {
    <?php cssGenerateBorders($css['border2']); ?>
    padding: 3px;
}

table.tiger_stripes tr:not(.tiger_stripes_header):not(.no_tiger_stripes):nth-child(odd) {
    background-color: <?php echo $css['background1']?>;
}

table.tiger_stripes tr:not(.tiger_stripes_header):not(.no_tiger_stripes):nth-child(even) {
    background-color: <?php echo $css['background2']?>;
}

td.tiger_stripes div:not(.tiger_stripes_header):not(.no_tiger_stripes):nth-child(odd),
ul.tiger_stripes li:not(.tiger_stripes_header):not(.no_tiger_stripes):nth-child(odd) {
	background-color: <?php echo $css['background1']?>;
}
td.tiger_stripes div:not(.tiger_stripes_header):not(.no_tiger_stripes):nth-child(even),
ul.tiger_stripes li:not(.tiger_stripes_header):not(.no_tiger_stripes):nth-child(even) {
	background-color: <?php echo $css['background2']?>;
}

table.tiger_stripes tr:not(.tiger_stripes_header):not(.no_tiger_stripes):hover td,
ul.tiger_stripes li:not(.tiger_stripes_header):not(.no_tiger_stripes):hover {
    cursor: default;
    background-color: <?php echo $css['background9']?>;
    color: <?php echo $css['alertfont1']?>;
}

table.tiger_stripes tr:not(.tiger_stripes_header):not(.no_tiger_stripes):hover td a:hover,
ul.tiger_stripes li:not(.tiger_stripes_header):not(.no_tiger_stripes):hover a:hover {
    color: <?php echo $css['alertfont1']?>;
}


/* Place for manual definitions of our style
    colours for use in JavaScriptland */
.background1 {
    background-color: <?php echo $css['background1']?>;
}

.background2 {
    background-color: <?php echo $css['background2']?>;
}

.background9 {
    background-color: <?php echo $css['background9']?> !important;
}

.border2 {
    <?php cssGenerateBorders($css['border2']); ?>
}

/* New CSS Table Display Layout */
#layout-main {
	display: table;
	width: 100%;
	border-collapse: collapse;
}

#layout-header {
	display: table-row;
	height: 150px;
}

#layout-middle {
	display: table;
	width: 100%;
	height: 100%;
	border-collapse: collapse;
}

#layout-content {
	display: table-cell;
}

#layout-right {
	display: table-cell;
	width: 150px;
	padding-left: 3px;
}

#layout-footer {
	display: table-row;
	height: 20px;
}

#layout-middle div.content-header-bar {
	<?php cssGenerateBorders($css['border2']); ?>
    font-size: <?php echo cssGenerateSize(11);?>px;
    background: <?php echo $css['background7']?>;
    color: <?php echo $css['alertfont1']?>;
    font-weight: bold;
    margin-bottom: 3px;
}

	#layout-middle div.content-header-bar h3 {
		margin: 3px;
	}

#layout-middle div.content-cell {
	padding: 2px;
	<?php cssGenerateBorders($css['border2']); ?>
    font-size: <?php echo cssGenerateSize(11);?>px;
    background: <?php echo $css['background2']?>;
    color: <?php echo $css['afont1']?>;
}

input[type="text"],
input[type="file"],
select,
textarea {
    -moz-border-bottom-colors: none;
    -moz-border-image: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-radius: 4px 4px 4px 4px;
    border-style: solid;
    border-width: 1px;
    border: small solid;
    padding: 5px 8px;
}

/* Flashers Panel (News, DMs, Events, etc) */
.flasher-dms img {
	position: absolute;
	z-index: 1;
}

.flasher-dms span {
	position: absolute;
	z-index: 2;
	font-weight: bold;
	font-size: 9px;
	padding-left: 9px;
	padding-top: 4px;
}

.ajax_spinner {
	width: 16px;
	height: 16px;
}

.ajax_checkbox_spinner {
	width: 13px;
	height: 13px;
	margin-left: 3px;
	margin-top: 3px;
	margin-right: 4px;
}

.thumbs-up,
.thumbs-down {
	background: url('http://images.swcombine.net/client/icons/ratings_sprite.png') 0 0 no-repeat;
	width: 20px;
	height: 24px;
	text-indent: -9999px;
	display: inline-block;
}


.thumbs-up {
	background-position: 0 0;
}

.thumbs-down {
	background-position: -25px 0;
}

.thumbs-up.selected,
.thumbs-up:hover {
	background-position: 0 -25px;
}

.thumbs-down.selected,
.thumbs-down:hover {
	background-position: -25px -25px;
}

a.button {
	background: url('http://images.swcombine.net/client/sprites/button_sprite.png') right -64px no-repeat;
	display: inline-block;
	font-size: 14px;
	height: 55px;
	margin-right: 6px;
	padding-right: 18px;
}

a.button .button-right {
	background: url('http://images.swcombine.net/client/sprites/button_sprite.png') no-repeat;
    display: block;
    line-height: 16px;
	padding: 19px 0 19px 20px;
}

.attacker {
	cursor: pointer;
}
.attacker img {
	margin: 1px 1px 1px 1px;
}
.clicked img {
	margin: 0px 0px 0px 0px;
    border: 1px solid blue;
}


/* CSS for WS Documentation Tables */
table.ws_styles {
	border-collapse: collapse;
	border: 1px solid #fff;
}

table.ws_styles th {
	background-color: #1F8175;
	font-size: <?php echo cssGenerateSize(13);?>px
}

table.ws_styles td {
	padding: 5px 10px;
	border: 1px solid #fff;
}

table.ws_styles tr:nth-child(odd) {
	background: #1F5C81;
}

.ws_styles.rules_box_important > h3 {
	font-weight: bold;
	font-color: #F00;
}


/* Generic Table for Layout */
.swc-table {
	display: table;
	border-collapse: separate;
	border-spacing: 4px;
}
.swc-table-row {
	display: table-row;
}
.swc-table-cell {
	display: table-cell;
	padding: 3px;
}
.swc-table-header {
	display: table-cell;
	font-weight: bold;
	padding: 5px;
	text-align: center;
    font-size: <?php echo cssGenerateSize(11);?>px;
    background: <?php echo $css['background7']?>;
    color: <?php echo $css['alertfont1']?>;
}
