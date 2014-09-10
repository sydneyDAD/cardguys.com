<?php
if ( !defined('INCLUDED') ) { die("Access Denied"); } ?>
<form method="get" action="">
	<input type="hidden" name="module" value="<?=$contact->module?>" />
	<input type="hidden" name="view" value="list" />
	<select name="status">
		<option value="">Status</option>
		<option value="1" <? if (intval($_GET['status'])== '1') echo 'selected'; ?>>Readed</option>
		<option value="0" <? if ($_GET['status']== '0') echo 'selected'; ?>>UnRead</option>
	</select>
	<input type="submit" value="Filter"/>
</form>