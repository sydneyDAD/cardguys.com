<?php



if ($country=='CA'){
    //echo "canada";
    $db_name = 'oscar497_cardguys_usa';
 }
 else{
    //echo "USA";
   $db_name = 'oscar497_cardguys_usa'; 
    
 }


$sitelink = 'http://cardguys.com/';
$db_host = 'localhost';
//$db_username = 'oscar497_cguys';
//$db_password = 'l+uPfa+aQZ(U';
$db_username = 'oscar497_root';
$db_password = 'dad123';
$db_name = $db_name;
$module = "";


//define(SONVT,'');
// connect database
include_once('includes/class_database.php');
$db = new database;
$db->connect($db_host, $db_username, $db_password, $db_name);
//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////					
include_once ('includes/functions.php');
include_once ('includes/class_security.php');
$security = new security;
$security->logout();
include_once('class/class_config.php');
$config = new config;
include_once('class/class_cards_bank.php');
$cards_bank = new cards_bank;

////////////////////////////////////////////////////////
$view = 'list';

include_once ('seosearch.php');

if (isset($_GET['module'])):
    $module = clear($_GET['module']);
    $matchx = preg_match("/faq\/(.*)/i", $module, $found_faq);
    $match_con = preg_match("/contact\/(.*)/i", $module, $found_mod);
    if (isset($found_mod[1]) && $found_mod[1]) {
        $module = "contact";
        $view = $found_mod[1];
    }
endif;


if (!empty($found_faq)) {
    $module = clear('faq');
}
//if($found_faq[0]):
//	$module = clear('faq');
//endif;


$oldmod = $module;
$id = 0;
$type = "";
$modul = seourl_loopup($module);
$module = (isset($module)) ? $module : "";
$myxid = "";
if (is_array($modul)) {
    $_GET['module'] = $module = $modul['name'];
    if (isset($modul['xid'])) {
        switch ($modul['xid']) {
            case "issuer":
            case "type":
            case "id":
            case "quality":
            case "int":
            case "report":

                $myxid = $_GET[$modul['xid']] = $$modul['xid'] = (int) $modul[$modul['xid']];
                break;
        }
    }
} else {
    $module = $modul;
}
$matchcase = 0;
$matchx = preg_match("/msie\s([1-9]*)/i", $_SERVER['HTTP_USER_AGENT'], $oldbrow);
if ($matchx && isset($oldbrow[1]) && $oldbrow[1] < 8) {
    $matchcase = 1;
}
if (isset($_GET['id'])) {
    if (intval($_GET['id']) > 0 || (int) $id > 0)
        $view = 'detail';
}

if (isset($_GET['id'])) {
    if (isset($_GET['view'])) {
        $view = clear($_GET['view']);
    }
}
include_once('includes/class_page.php');
$page = new page;
?>