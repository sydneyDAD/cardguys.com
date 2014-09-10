<?
		include_once ('../config.php');     
	    if ($_GET['module'] == 'product'){
			include_once ('../class/class_category_pro.php');
	        $cat = new category_pro;
		}
		else{
			include_once ('../class/class_category_news.php');
	        $cat = new category_news;
		}
		echo $cat->select(intval($_GET['cha']),intval($_GET['cat']));
?>