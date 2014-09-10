<? if ( !defined('INCLUDED') ) { die("Access Denied");}
include_once('../includes/class_template.php');
$template = new template;
include_once('../includes/class_upload.php');
include_once('../fckeditor/fckeditor.php');

include_once ('../class/class_category_blog.php');
 $category_blog = new category_blog;
    include_once ('../class/class_blog.php');
$blog = new blog;
    include_once ('../class/class_comment_blog.php');
    $comment_blog = new comment_blog;

if ($module == 'product' || $module == 'channel_pro' || $module == 'category_pro'){
    include_once ('../class/class_product.php');
    include_once ('../class/class_category_pro.php');
    include_once ('../class/class_channel_pro.php');
    $channel_pro = new channel_pro;
	$category_pro = new category_pro;
    $product = new product;
}
if ($module == 'news' || $module == 'channel_news' || $module == 'category_news'){
	include_once ('../class/class_category_news.php');
    include_once ('../class/class_channel_news.php');
    include_once ('../class/class_news.php');  
    $category_news = new category_news;
    $channel_news = new channel_news;  
    $news = new news;
    include_once ('../class/class_credit_cards.php');
	$credit_cards = new credit_cards;
}
if ($module == ''){
	include_once ('../class/class_contact.php');
    $contact = new contact;
    include_once ('../class/class_order.php');
    $order = new order;
    include_once ('../class/class_faq.php');
    $faq = new faq;
   	include_once ('../class/class_xmlfeed.php');
	$xmlfeed = new xmlfeed;
}
switch ($module){
case 'user':
    include_once ('../class/class_user.php');
    $user = new user;
    break;
case 'menu':
    include_once ('../class/class_menu.php');
    $menu = new menu;
    break;
case 'contact':
    include_once ('../class/class_contact.php');
    $contact = new contact;
    break;
case 'faq':
    include_once ('../class/class_faq.php');
    $faq = new faq;
    break;
case 'glossary':
    include_once ('../class/class_glossary.php');
    $glossary= new glossary;
    break;
case 'advertise':
    include_once ('../class/class_advertise.php');
    $advertise = new advertise;
    break;
case 'product':
    include_once ('../class/class_comment_pro.php');
    $com_pro = new comment_pro;
    break;
case 'order':
	include_once ('../class/class_product.php');
    include_once ('../class/class_order.php');
	$product = new product;
	$order = new order;
    break;
case 'block':
	include_once ('../class/class_block.php');
	$block = new block;
    break;
case 'support':
	include_once ('../class/class_support.php');
	$support = new support;
    break;

case 'cards':
	include_once ('../class/class_xmlfeed.php');
	$xmlfeed = new xmlfeed;
    include_once ('../class/class_cards_type.php');
	$cards_type = new cards_type;
    include_once ('../class/class_credit_cards.php');
	$credit_cards = new credit_cards;
    include_once ('../class/class_cards_bank.php');
	$cards_bank = new cards_bank;
    include_once ('../class/class_cards_issuer.php');
	$cards_issuer = new cards_issuer;
    include_once ('../class/class_cards_quality.php');
	$cards_quality = new cards_quality;
    include_once ('../class/class_cards_int.php');
	$cards_int = new cards_int;
    include_once ('../class/class_advertise.php');
	$advertise = new advertise;
    include_once ('../class/class_news.php');  
    $news = new news;
    include_once ('../class/class_cards_report.php');
	$cards_report = new cards_report;
    break;
}

///////////////////////////////////////////////
	// x? lý khi chuy?n status ho?c special //
	if ($_GET['changestatus'])
	echo '<script language="javascript">history.go(-1)</script>';
/////////// FORM TRONG ADMIN//////////////////
include_once('../includes/class_temp_admin.php');
$temp = new admin_temp;
include_once('../includes/class_checkform.php');
$check = new checkform;
?>