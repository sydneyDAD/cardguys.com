<form method="GET" action="">
	<input type="hidden" name="module" value="<?=$menu->module?>"/>
	<input type="hidden" name="view" value="list"/>
	<input  type="checkbox" name="home" <? if($_GET['home']=='on') echo "checked" ?> />&nbsp;&nbsp; Home &nbsp;&nbsp;&nbsp;
    <input  type="checkbox" name="bookmark" <? if($_GET['bookmark']=='on') echo "checked" ?> />&nbsp;&nbsp; Bookmark &nbsp;&nbsp;&nbsp;&nbsp;
    
	<input type="submit" value="Hide/Show" />
</form>
<?php
    $_SESSION['home'] = $_GET['home'];
    $_SESSION['bookmark'] = $_GET['bookmark'];
?>