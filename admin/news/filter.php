<?php
if ( !defined('INCLUDED') ) { die("Access Denied"); } ?>
<form method="GET" action="">
	<input type="hidden" name="module" value="<?=$news->module?>"/>
	<input type="hidden" name="view" value="list"/>
	<select name="special">
		<option value="">Type</option>
		<option value="1" <? if (intval($_GET['special'])== 1) echo 'selected'; ?>>Special</option>
		<option value="0" <? if ($_GET['special']== '0') echo 'selected'; ?>>Normal</option>
	</select>
	<?=$channel_news->select($_GET['cha'],'onchange = "dochange(\''.$news->module.'\',this.value)"')?>
	<font id="cities"></font>
	Name: <input type="text" name="name" size="25" value=""/>
	ID: <input type="text" name="id" size="15" value=""/>
	<input type="submit" value="Filter"/>
</form>

<script language="javascript">
	window.onLoad=dochange('<?=$news->module?>','<?=$_GET['cha']?>','<?=$_GET['cat']?>'); 
	function filter_static(s){
		document.window;
	}
</script>