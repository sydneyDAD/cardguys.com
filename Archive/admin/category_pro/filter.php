<? if ( !defined('INCLUDED') ) { die("Access Denied"); } ?>
<form method="get" action="">
	<input type="hidden" name="module" value="<?=$category_pro->module?>"/>
	<input type="hidden" name="view" value="list"/>
	<?=$channel_pro->select($_GET['cha'])?>
	<input type="submit" value="Lọc"/>
</form>