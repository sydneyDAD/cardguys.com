<?
	include_once ('class/class_xmlfeed.php');
	$xmlfeed = new xmlfeed;
    include_once ('class/class_cards_type.php');
	$cards_type = new cards_type;
    include_once ('class/class_credit_cards.php');
	$credit_cards = new credit_cards;
    include_once ('class/class_cards_issuer.php');
	$cards_issuer = new cards_issuer;
    include_once ('class/class_cards_quality.php');
	$cards_quality = new cards_quality;
    include_once ('class/class_cards_int.php');
	$cards_int = new cards_int;
    
    include_once ('class/class_cards_bank.php');
	$cards_bank = new cards_bank;
	
	include_once ('class/class_cards_report.php');
	$cards_report = new cards_report;
	
    include_once('class/class_block.php');
    $block = new block;
    include_once ('class/class_user.php');
    $user = new user;

    include_once ('class/class_category_blog.php');
    include_once ('class/class_comment_blog.php');
    $category_blog = new category_blog;	
$comment_blog = new comment_blog;
include_once ('class/class_blog.php');
$blogs = new blog;
include_once ('class/class_support.php');
$support = new support;
include_once('class/class_news.php');
$news = new news;
include_once ('class/class_channel_pro.php');
$channel_pro = new channel_pro;
include_once ('class/class_category_pro.php');
$category_pro = new category_pro;
include_once ('class/class_channel_news.php');
$channel_news = new channel_news;
include_once ('class/class_category_news.php');
$category_news = new category_news;
include_once ('class/class_product.php');
$product = new product;
include_once('includes/class_template.php');
$template = new template;
include_once('class/class_menu.php');
$menu = new menu;
include_once ('class/class_order.php');
$order = new order;
include_once ('class/class_advertise.php');
$advertise = new advertise;
include_once ('class/class_contact.php');
$contact = new contact;
if ($module == 'faq'){
include_once ('class/class_faq.php');
$faq = new faq;
}
if ($module == 'glossary'){
include_once ('class/class_glossary.php');
$glossary = new glossary;
}

if ($module == 'product'){
include_once ('class/class_comment_pro.php');
$com_pro = new comment_pro;
}
// include lang?gage
$file_lang = $config ->get_lang();
if (is_file('language/'.$file_lang.'.php')){
	include_once('language/'.$file_lang.'.php');
	include_once('language/product'.$file_lang.'.php');
	include_once('language/order'.$file_lang.'.php');
}
//	include_once('language/search'.$config->get_lang().'.php');

	$row_config = $config->detail();
        
	//(int)$row_config['blog_stat'];
	if(strtolower(trim($module))=="blog" && !(int)$row_config['blog_stat']){ header("location:./");exit;}
    $test_type = $_SERVER['REQUEST_URI'];
    $test_type2=strtolower($modul['xid']);
    $module2=strtolower($module);
    
       if($test_type2 =='issuer')
       { 
            $meta = $cards_bank->detail2('title,keyword,destination,assign_banner',intval($_GET['issuer']));
            $_SESSION['title'] = $meta['title'];
            $_SESSION['keyword'] = $meta['keyword'];
            $_SESSION['destination'] = $meta['destination'];
            $_SESSION['assign_banner'] = $meta['assign_banner'];
           
        }elseif($test_type2=='type')
       { 
            $meta = $cards_type->detail2('title,keyword,destination,assign_banner',intval($_GET['type']));
            $_SESSION['title'] = $meta['title'];
            $_SESSION['keyword'] = $meta['keyword'];
            $_SESSION['destination'] = $meta['destination'];
            $_SESSION['assign_banner'] = $meta['assign_banner'];
            
        }
        elseif($test_type2=='quality')
       { 
            $meta = $cards_quality->detail2('title,keyword,destination,assign_banner',intval($_GET['quality']));
            $_SESSION['title'] = $meta['title'];
            $_SESSION['keyword'] = $meta['keyword'];
            $_SESSION['destination'] = $meta['destination'];
            $_SESSION['assign_banner'] = $meta['assign_banner'];
            
        }
        elseif($test_type2=='int')
       { 
            $meta = $cards_quality->detail2('title,keyword,destination,assign_banner',intval($_GET['int']));
            $_SESSION['title'] = $meta['title'];
            $_SESSION['keyword'] = $meta['keyword'];
            $_SESSION['destination'] = $meta['destination'];
            $_SESSION['assign_banner'] = $meta['assign_banner'];
           
        }
        elseif($module2=='blog')
       { 
            $meta = $blogs->detail();
            if($meta)
            {
                $_SESSION['title'] = $meta['title'];
                $_SESSION['keyword'] = $meta['keyword'];
                $_SESSION['destination'] = $meta['meta'];
            }
            else
            {
                $_SESSION['title']= 'Credit Card City - Blog';
                $_SESSION['keyword'] = $row_config['metakey'];
                $_SESSION['destination'] = $row_config['metades'];
            }
        }
         elseif($module2=='faq')
       { 
            $meta = $faq->detail();
            if($meta)
            {
                $_SESSION['title'] = $meta['title'];
                $_SESSION['keyword'] = $meta['keyword'];
                $_SESSION['destination'] = $meta['meta'];
            }
            else
            {
                $_SESSION['title']= 'Credit Card City - FAQ';
                $_SESSION['keyword'] = $row_config['metakey'];
                $_SESSION['destination'] = $row_config['metades'];
            }
        }
           elseif($module2=='sitemap')
           {
           $_SESSION['title']= 'Credit Card City - Sitemap';
                $_SESSION['keyword'] = $row_config['metakey'];
                $_SESSION['destination'] = $row_config['metades'];
           
           }
       else
        {
            $_SESSION['title'] = $row_config['metakey'];
            $_SESSION['keyword'] = $row_config['metakey'];
            $_SESSION['destination'] = $row_config['metades'];
            $_SESSION['assign_banner'] = '';
           
        }
	$config->hit_counter()
?>