<? if ( !defined('INCLUDED') ) { die("Access Denied"); } ?>
<form method="get" action="">
	<input type="hidden" name="module" value="<?=$category_news->module?>"/>
	<input type="hidden" name="view" value="list"/>
	<?=$channel_news->select($_GET['cha'])?>
	<input type="submit" value="Filter"/>
</form>